<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Taes Controller
 *
 * @property \App\Model\Table\TaesTable $Taes
 * @method \App\Model\Entity\Tae[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TaesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate['order'] = ['nome' => 'asc'];
        $taes = $this->paginate($this->Taes);

        $this->set(compact('taes'));
    }

    /**
     * View method
     *
     * @param string|null $id Tae id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tae = $this->Taes->get($id, contain: ['Essextensoes']);

        $this->set(compact('tae'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tae = $this->Taes->newEmptyEntity();
        if ($this->request->is('post')) {
            $tae = $this->Taes->patchEntity($tae, $this->request->getData());
            if ($this->Taes->save($tae)) {
                $this->Flash->success(__('The tae has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tae could not be saved. Please, try again.'));
        }
        $this->set(compact('tae'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tae id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tae = $this->Taes->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tae = $this->Taes->patchEntity($tae, $this->request->getData());
            if ($this->Taes->save($tae)) {
                $this->Flash->success(__('The tae has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tae could not be saved. Please, try again.'));
        }
        $this->set(compact('tae'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tae id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tae = $this->Taes->get($id);
        if ($this->Taes->delete($tae)) {
            $this->Flash->success(__('The tae has been deleted.'));
        } else {
            $this->Flash->error(__('The tae could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
