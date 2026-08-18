<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Eusers Controller
 *
 * @property \App\Model\Table\EusersTable $Eusers
 * @method \App\Model\Entity\Euser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EusersController extends AppController
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login', 'add']);
    }

    public function login()
    {

        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            // redirect to /articles after login success
            $categoria_id = $this->request->getAttribute('identity')->categoria;
            if ($categoria_id == 1):
                $this->getRequest()->getSession()->write('categoria_id', $categoria_id);
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Essextensoes',
                    'action' => 'index',
                ]);
            elseif ($categoria_id == 2):
                $this->getRequest()->getSession()->write('categoria_id', $categoria_id);
                $this->getRequest()->getSession()->write('registro', $this->request->getAttribute('identity')->registro);
                if ($this->request->getAttribute('identity')->estudante_id):
                    $redirect = $this->request->getQuery('redirect', [
                        'controller' => 'Estudantes',
                        'action' => 'view',
                        $this->request->getAttribute('identity')->estudante_id
                    ]);
                else:
                    // pr($this->request->getAttribute('identity')->registro);
                    // die('registro');
                    $redirect = $this->request->getQuery('redirect', [
                        'controller' => 'Estudantes',
                        'action' => 'add?registro=' .
                        $this->request->getAttribute('identity')->registro .
                        '&email=' . $this->request->getAttribute('identity')->email
                    ]);
                endif;
            else:
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Essextensoes',
                    'action' => 'index',
                ]);
            endif;
            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Eusers', 'action' => 'login']);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Eusers->find()->contain(['Estudantes']);
        $eusers = $this->paginate($query);

        $this->set(compact('eusers'));
    }

    /**
     * View method
     *
     * @param string|null $id Euser id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $euser = $this->Eusers->get($id, contain: []);

        $this->set(compact('euser'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $euser = $this->Eusers->newEmptyEntity();

        if ($this->request->is('post')) {
            // pr($this->request->getData());
            // die();
            $euser = $this->Eusers->patchEntity($euser, $this->request->getData());
            // pr($euser);
            // die();
            if ($this->Eusers->save($euser)) {
                $this->Flash->success(__('Usuário cadastrado!'));

                return $this->redirect(['controller' => 'estudantes', 'action' => 'add?registro=' . $euser->registro]);
            }
            $this->Flash->error(__('Não foi possível realizar o cadastro. Tente novamente.'));
        }
        $this->set(compact('euser'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Euser id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $euser = $this->Eusers->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $euser = $this->Eusers->patchEntity($euser, $this->request->getData());
            if ($this->Eusers->save($euser)) {
                $this->Flash->success(__('The euser has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The euser could not be saved. Please, try again.'));
        }
        $this->set(compact('euser'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Euser id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $euser = $this->Eusers->get($id);
        if ($this->Eusers->delete($euser)) {
            $this->Flash->success(__('The euser has been deleted.'));
        } else {
            $this->Flash->error(__('The euser could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}