<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Professores Controller
 *
 * @property \App\Model\Table\ProfessoresTable $Professores
 * @method \App\Model\Entity\Professor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfessoresController extends AppController
{
    public function index()
    {
        $this->paginate['order'] = ['nome' => 'asc'];
        $professores = $this->paginate($this->Professores);

        $this->set(compact('professores'));
    }

    public function view($id = null)
    {
        $professor = $this->Professores->get($id, contain: ['Essextensoes']);

        $this->set(compact('professor'));
    }

    public function add()
    {
        $professor = $this->Professores->newEmptyEntity();
        if ($this->request->is('post')) {
            $professor = $this->Professores->patchEntity($professor, $this->request->getData());
            if ($this->Professores->save($professor)) {
                $this->Flash->success(__('The professor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The professor could not be saved. Please, try again.'));
        }
        $this->set(compact('professor'));
    }

    public function edit($id = null)
    {
        $professor = $this->Professores->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $professor = $this->Professores->patchEntity($professor, $this->request->getData());
            if ($this->Professores->save($professor)) {
                $this->Flash->success(__('The professor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The professor could not be saved. Please, try again.'));
        }
        $this->set(compact('professor'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $professor = $this->Professores->get($id);
        if ($this->Professores->delete($professor)) {
            $this->Flash->success(__('The professor has been deleted.'));
        } else {
            $this->Flash->error(__('The professor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
