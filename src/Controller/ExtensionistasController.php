<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Extensionistas Controller
 *
 * @property \App\Model\Table\ExtensionistasTable $Extensionistas
 * @method \App\Model\Entity\Extensionista[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExtensionistasController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {

        if ($this->Authentication->getIdentity()) {
            if ($this->Authentication->getIdentity()->categoria == 2):
                // $this->Flash->error(__("Não autorizado"));
                return $this->redirect(['controller' => 'Extensionistas', 'action' => 'view?estudante=' . $this->Authentication->getIdentity()->estudante_id]);
            endif;
        }

        $this->paginate = [
            'contain' => ['Estudantes', 'Extensoes' => ['Essextensoes']],
        ];
        $this->paginate['order'] = ['Estudantes.nome' => 'asc'];
        $this->paginate['sortableFields'] = ['id', 'Extensoes.titulo', 'cargahoraria', 'ano', 'Estudantes.nome'];
        $extensionistas = $this->paginate($this->Extensionistas);

        $this->set(compact('extensionistas'));
    }

    /**
     * View method
     *
     * @param string|null $id Extensionista id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {

        if ($this->Authentication->getIdentity()):
            $user = $this->Authentication->getIdentity();
            if ($user->categoria == 2):
                if ($id):
                    $query = $this->Extensionistas->find();
                    $query->contain(['Estudantes', 'Extensoes']);
                    $query->where(['Extensionistas.id' => $id]);
                    $extensionista = $query->first(); // Só tem um extensionista
                    if ($user->registro != $extensionista->estudante->registro):
                        $this->Flash->error(__("Acesso denegado"));
                    endif;
                else:
                    $estudante_id = $this->request->getQuery('estudante');
                    if ($estudante_id):
                        $query = $this->Extensionistas->find();
                        $query->contain(['Estudantes', 'Extensoes']);
                        $query->where(['Extensionistas.estudante_id' => $estudante_id]);
                        $extensionista = $query->all(); // Cada estudante pode ter vários registros de extensionista
                        if (empty($extensionista)):
                            $this->Flash->error(__("Sem atividades de extensão registradas"));
                            return $this->redirect(['controller' => 'Extensionistas', 'action' => 'add?estudante=' . $estudante_id]);
                        endif;
                    endif;
                endif;
            elseif ($user->categoria == 1):
                if ($id):
                    $query = $this->Extensionistas->find();
                    $query->contain(['Estudantes', 'Extensoes']);
                    $query->where(['Extensionistas.id' => $id]);
                    $extensionista = $query->first();
                else:
                    $estudante_id = $this->request->getQuery('estudante');
                    if ($estudante_id):
                        $query = $this->Extensionistas->find();
                        $query->contain(['Estudantes', 'Extensoes']);
                        $query->where(['Extensionistas.estudante_id' => $estudante_id]);
                        $extensionista = $query->all();
                        if (empty($extensionista)):
                            $this->Flash->error(__("Sem atividades de extensão registradas"));
                            return $this->redirect(['controller' => 'Extensionistas', 'action' => 'add', $estudante_id]);
                        endif;
                    endif;
                endif;
                $this->set('id', isset($id) ? $id : $estudante_id);
            endif;
        endif;
        
        $this->set('extensionista', $this->paginate($query));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {

        $estudante_id = $this->request->getQuery('estudante');
        if ($estudante_id):
            $this->set('estudante_id', $estudante_id);
        endif;

        $extensionista = $this->Extensionistas->newEmptyEntity();
        if ($this->request->is('post')) {
            // pr($this->request->getData());
            // die();
            $extensionista = $this->Extensionistas->patchEntity($extensionista, $this->request->getData());
            if ($this->Extensionistas->save($extensionista)) {
                $this->Flash->success(__('Atividade de extensão inserida.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Atividade de extensão não foi inserida. Tente novamente.'));
        }
        $estudantes = $this->Extensionistas->Estudantes->find('list', ['order' => 'nome'])->all();
        $essextensoes = $this->Extensionistas->Essextensoes->find('list', ['order' => 'titulo'])->all();
        $extensoes = $this->Extensionistas->Extensoes->find('list', [
            'valueField' => function ($row) {
            return $row['coordenacao'] . ' - ' . $row['titulo'];
            }
        ]);
        $extensoes->all();
        $this->set(compact('extensionista', 'estudantes', 'extensoes', 'essextensoes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Extensionista id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $extensionista = $this->Extensionistas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $extensionista = $this->Extensionistas->patchEntity($extensionista, $this->request->getData());
            if ($this->Extensionistas->save($extensionista)) {
                $this->Flash->success(__('The extensionista has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The extensionista could not be saved. Please, try again.'));
        }
        $estudantes = $this->Extensionistas->Estudantes->find('list', ['limit' => 2000])->all();
        $extensoes = $this->Extensionistas->Essextensoes->find('list', ['limit' => 2000])->all();
                $extensoes = $this->Extensionistas->Extensoes->find('list', [
            'valueField' => function ($row) {
            return $row['coordenacao'] . ' - ' . $row['titulo'];
            }
        ]);
        $extensoes->all();
        
        $this->set(compact('extensionista', 'estudantes', 'extensoes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Extensionista id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $extensionista = $this->Extensionistas->get($id);
        if ($this->Extensionistas->delete($extensionista)) {
            $this->Flash->success(__('The extensionista has been deleted.'));
        } else {
            $this->Flash->error(__('The extensionista could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
