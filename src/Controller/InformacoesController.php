<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Informacoes Controller
 *
 * @property \App\Model\Table\InformacoesTable $Informacoes
 * @method \App\Model\Entity\Informacao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InformacoesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $informacoes = $this->paginate($this->Informacoes);

        $this->set(compact('informacoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Informacao id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $informacao = $this->Informacoes->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('informacao'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $informacao = $this->Informacoes->newEmptyEntity();
        if ($this->request->is('post')) {
            $informacao = $this->Informacoes->patchEntity($informacao, $this->request->getData());
            
            if ($this->Informacoes->save($informacao)) {
                $this->Flash->success(__('The informacao has been saved.'));

                return $this->redirect(['action' => 'view', $informacao->id]);
            }
            $this->Flash->error(__('The informacao could not be saved. Please, try again.'));
        }
        $this->set(compact('informacao'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Informacao id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $informacao = $this->Informacoes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $informacao = $this->Informacoes->patchEntity($informacao, $this->request->getData());
            if ($this->Informacoes->save($informacao)) {
                $this->Flash->success(__('The informacao has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The informacao could not be saved. Please, try again.'));
        }
        $this->set(compact('informacao'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Informacao id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $informacao = $this->Informacoes->get($id);
        if ($this->Informacoes->delete($informacao)) {
            $this->Flash->success(__('The informacao has been deleted.'));
        } else {
            $this->Flash->error(__('The informacao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
