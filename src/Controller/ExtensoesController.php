<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Extensoes Controller
 *
 * @property \App\Model\Table\ExtensoesTable $Extensoes
 * @method \App\Model\Entity\Extensao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExtensoesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $query = $this->Extensoes->find()->contain(['Essextensoes', 'Universidades']);
        $extensoes = $this->paginate($query);

        $this->set(compact('extensoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Extensao id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $extensao = $this->Extensoes->get($id, contain: ['Extensionistas' => 'Estudantes', 'Essextensoes', 'Universidades']);

        $this->set(compact('extensao'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {

        $extensoes = $this->Extensoes->find();
        $extensoes->select(['titulo']);
        $extensoes->orderBy(['titulo']);
        $extensoes->all();
        // pr($extensoes);
        // die();
        $universidades = $this->Extensoes->Universidades->find('list');
        $universidades->order(['universidade']);
        $universidades->all();
        // pr($universidades);
        // die();

        $extensao = $this->Extensoes->newEmptyEntity();

        if ($this->request->is('post')) {
            $extensao = $this->Extensoes->patchEntity($extensao, $this->request->getData());
            if ($this->Extensoes->save($extensao)) {
                $this->Flash->success(__('The extensao has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The extensao could not be saved. Please, try again.'));
        }
        $essextensoes = $this->Extensoes->Essextensoes->find('list', ['limit' => 200, 'order' => 'titulo'])->all();
        $this->set(compact('extensoes', 'universidades', 'extensao', 'essextensoes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Extensao id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $extensao = $this->Extensoes->get($id, contain: ['Essextensoes', 'Universidades']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $extensao = $this->Extensoes->patchEntity($extensao, $this->request->getData());
            if ($this->Extensoes->save($extensao)) {
                $this->Flash->success(__('The extensao has been saved.'));
                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The extensao could not be saved. Please, try again.'));
        }

        $essextensoes = $this->Extensoes->Essextensoes->find('list');
        $essextensoes->order(['titulo']);
        $essextensoes->all();

        $universidades = $this->Extensoes->Universidades->find('list');
        $universidades->order(['universidade']);
        $universidades->all();
        // pr($universidades);
        // die();

        $this->set(compact('extensao', 'essextensoes', 'universidades'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Extensao id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $extensao = $this->Extensoes->get($id);
        if ($this->Extensoes->delete($extensao)) {
            $this->Flash->success(__('The extensao has been deleted.'));
        } else {
            $this->Flash->error(__('The extensao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
