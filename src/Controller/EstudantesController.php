<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Alunosnovos Controller
 *
 * @property \App\Model\Table\EstudantesTable $Estudantes
 * @method \App\Model\Entity\Alunosnovo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EstudantesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {

        /* Estudantes somente podem ver seus próprios dados */
        if ($this->Authentication->getIdentity()) {
            if ($this->Authentication->getIdentity()->categoria == 2):
                // $this->Flash->error(__("Não autorizado"));
                return $this->redirect(['controller' => 'Estudantes', 'action' => 'view', $this->Authentication->getIdentity()->estudante_id]);
            endif;
        }
        $alunos = $this->Estudantes->find('all')
                ->where(['concat("20", substring(Estudantes.registro, -8, 2)) >' => '2019'])
                ->orderBy(['nome' => 'asc']);
        // pr($alunos->toArray());
        // die();
        $this->paginate['where'] = ['concat("20", substring(Estudantes.registro, -8, 2)) >' => '2019'];
        $this->paginate['order'] = ['nome' => 'asc'];
        $estudantes = $this->paginate($this->Estudantes);

        $this->set(compact('estudantes'));
    }

    /**
     * View method
     *
     * @param string|null $id Alunosnovo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {

        if (is_null($id)) {
            $this->Flash->error(__('Falta o Id para localizar o registro.'));
            return $this->redirect(['controller' => 'estudantes', 'action' => 'index']);
        }

        $estudante = $this->Estudantes->get($id, contain: ['Extensionistas' => 'Extensoes']);

        $this->set(compact('estudante'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null) {

        $registro = $this->request->getQuery('registro');
        // die($registro);
        if ($registro):
            $query_estudante = $this->Estudantes->find();
            $query_estudante->where(['Estudantes.registro' => $registro]);
            if (isset($query_estudante->first()->registro)):
                // echo 'Estudante já cadastrado' . '<br>';
                $this->loadModel('Eusers');
                $user = $this->Eusers->find();
                $user->where(['Eusers.registro' => $registro]);
                if ($user):
                    $usuario = $user->first()->toArray();
                else:
                    $this->Flash->error(__('Usuário não cadastrado.'));
                    echo "Usuário não cadastrado" . "<br>";
                endif;
                if (empty($usuario['estudante_id'])):
                    // echo "Sem estudante_id" . "<br>";
                    $usuario['estudante_id'] = $query_estudante->first()->id;
                    $usuario = $this->Eusers->patchEntity($user->first(), $usuario);
                    if ($this->Eusers->save($usuario)):
                        return $this->redirect(['action' => 'view', $usuario['estudante_id']]);
                    else:
                        $this->Flash->error(__('Não foi possível atualizar o Estudante com o Usuário.'));
                        die('Error');
                    endif;
                endif;
            else:
                // echo 'Não cadastrado. Envio o registro para o formulário' . "<br>";
                $registro = null;
                $this->set('registro', $registro);
            endif;
        endif;

        $estudante = $this->Estudantes->newEmptyEntity();
        if ($this->request->is('post')) {
            $estudante = $this->Estudantes->patchEntity($estudante, $this->request->getData());
            if ($this->Estudantes->save($estudante)) {
                $this->Flash->success(__('Estudante cadastrado.'));

                /* Inserir o id do estudante na tabela Eusers */
                $this->loadModel('Eusers');
                $query_user = $this->Eusers->find();
                $query_user->where(['Eusers.registro' => $estudante->registro]);
                $usuario = $query_user->first()->toArray();
                $usuario['estudante_id'] = $estudante->id;
                pr($user->first());
                $usuario = $this->Eusers->patchEntity($user->first(), $usuario);
                if ($this->Eusers->save($usuario)):
                    return $this->redirect(['action' => 'view', $usuario['estudante_id']]);
                else:
                    $this->Flash->error(__('Não foi possível atualizar o Usuário com o Estudante.'));
                    die('Error');
                endif;
            }
            $this->Flash->error(__('Não foi possível completar o cadastro. Tente novamente.'));
        }
        $this->set(compact('estudante'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Alunosnovo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {

        $user = $this->Authentication->getIdentity();

        $estudante = $this->Estudantes->get($id, contain: []);

        if ($user->categoria == 1):
        elseif ($user->categoria == 2):
            if ($user->registro != $estudante->registro):
                $this->Flash->error(__("Não autorizado"));
                return $this->redirect(['controller' => 'Extensoes', 'action' => 'index']);
            endif;
        endif;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $estudante = $this->Estudantes->patchEntity($estudante, $this->request->getData());
            if ($this->Estudantes->save($estudante)) {
                $this->Flash->success(__('Atualizado!'));

                return $this->redirect(['action' => 'view', $estudante->id]);
            }
            $this->Flash->error(__('Não foi possível atualizar. Tente novamente.'));
        }
        $this->set(compact('estudante'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Alunosnovo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $estudante = $this->Estudantes->get($id);
        if ($this->Estudantes->delete($estudante)) {
            $this->Flash->success(__('The estudante has been deleted.'));
        } else {
            $this->Flash->error(__('The estudante could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
