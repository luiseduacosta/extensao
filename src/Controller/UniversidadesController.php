<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Universidades Controller
 *
 * @property \App\Model\Table\UniversidadesTable $Universidades
 * @method \App\Model\Entity\Universidade[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UniversidadesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $universidades = $this->paginate($this->Universidades);

        $this->set(compact('universidades'));
    }

    /**
     * View method
     *
     * @param string|null $id Universidade id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $universidade = $this->Universidades->get($id, contain: ['Extensoes' =>  'Essextensoes']);

        $this->set(compact('universidade'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $universidade = $this->Universidades->newEmptyEntity();
        if ($this->request->is('post')) {
            $universidade = $this->Universidades->patchEntity($universidade, $this->request->getData());
            if ($this->Universidades->save($universidade)) {
                $this->Flash->success(__('The universidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The universidade could not be saved. Please, try again.'));
        }
        $this->set(compact('universidade'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Universidade id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $universidade = $this->Universidades->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $universidade = $this->Universidades->patchEntity($universidade, $this->request->getData());
            if ($this->Universidades->save($universidade)) {
                $this->Flash->success(__('The universidade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The universidade could not be saved. Please, try again.'));
        }
        $this->set(compact('universidade'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Universidade id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $universidade = $this->Universidades->get($id);
        if ($this->Universidades->delete($universidade)) {
            $this->Flash->success(__('The universidade has been deleted.'));
        } else {
            $this->Flash->error(__('The universidade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
