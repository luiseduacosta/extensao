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
        $query = $this->Estudantes->find()
                ->where(['concat("20", substring(Estudantes.registro, -8, 2)) >' => '2019']);
        
        $this->paginate = [
            'order' => ['nome' => 'asc'],
        ];
        $estudantes = $this->paginate($query);

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
        if ($registro):
            $query_estudante = $this->Estudantes->find();
            $query_estudante->where(['Estudantes.registro' => $registro]);
            $estudante_reg = $query_estudante->first();
            if ($estudante_reg && isset($estudante_reg->registro)):
                $this->fetchTable('Eusers');
                $userQuery = $this->Eusers->find();
                $userQuery->where(['Eusers.registro' => $registro]);
                $userEntity = $userQuery->first();
                if ($userEntity):
                    $usuario = $userEntity->toArray();
                    if (empty($usuario['estudante_id'])):
                        $usuario['estudante_id'] = $estudante_reg->id;
                        $usuario = $this->Eusers->patchEntity($userEntity, $usuario);
                        if ($this->Eusers->save($usuario)):
                            return $this->redirect(['action' => 'view', $usuario['estudante_id']]);
                        else:
                            $this->Flash->error(__('Não foi possível atualizar o Estudante com o Usuário.'));
                        endif;
                    endif;
                else:
                    $this->Flash->error(__('Usuário não cadastrado.'));
                endif;
            else:
                $registro = null;
                $this->set('registro', $registro);
            endif;
        endif;

        $estudante = $this->Estudantes->newEmptyEntity();
        if ($this->request->is('post')) {
            $estudante = $this->Estudantes->patchEntity($estudante, $this->request->getData());
            if ($this->Estudantes->save($estudante)) {
                $this->Flash->success(__('Estudante cadastrado.'));

                $this->fetchTable('Eusers');
                $query_user = $this->Eusers->find();
                $query_user->where(['Eusers.registro' => $estudante->registro]);
                $userEntity = $query_user->first();
                if ($userEntity):
                    $usuario = $userEntity->toArray();
                    $usuario['estudante_id'] = $estudante->id;
                    $usuario = $this->Eusers->patchEntity($userEntity, $usuario);
                    if ($this->Eusers->save($usuario)):
                        return $this->redirect(['action' => 'view', $usuario['estudante_id']]);
                    else:
                        $this->Flash->error(__('Não foi possível atualizar o Usuário com o Estudante.'));
                    endif;
                else:
                    $this->Flash->error(__('Não foi possível localizar o Usuário para vincular ao Estudante.'));
                endif;
            } else {
                $this->Flash->error(__('Não foi possível completar o cadastro. Tente novamente.'));
            }
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
