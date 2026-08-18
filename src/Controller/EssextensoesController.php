<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Extensoes Controller
 *
 * @property \App\Model\Table\ExtensoesTable $Extensoes
 * @method \App\Model\Entity\Extensao[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EssextensoesController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Docentes', 'Taes', 'Situacaopr5'],
        ];
        $this->paginate['order'] = ['Essextensoes.titulo' => 'asc'];
        $this->paginate['sortableFields'] = ['Essextensoes.id', 'Essextensoes.titulo', 'Docentes.nome', 'Taes.nome', 'Essextensoes.segmento', 'Essextensoes.nome', 'Essextensoes.datacongregacao', 'Situacaopr5.situacao', 'Essextensoes.versao'];
        $essextensoes = $this->paginate($this->Essextensoes);

        $this->set(compact('essextensoes'));
    }

    /**
     * View method
     *
     * @param string|null $id Extensao id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $extensao = $this->Essextensoes->get($id, [
            'contain' => ['Docentes', 'Taes', 'Extensionistas' => ['Estudantes'], 'Situacaopr5'],
        ]);
        $this->set(compact('extensao'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $essextensao = $this->Essextensoes->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            if ($data['docente_id']):
                $this->loadModel('Docentes');
                $nome = $this->Docentes->find();
                $nome->where(['Docentes.id' => $data['docente_id']]);
                $docente = $nome->first()->nome;
                $data['segmento'] = 'docente';
                $data['segmento_id'] = $data['docente_id'];
                $data['nome'] = $docente;
            elseif ($data['tae_id']):
                $this->loadModel('Taes');
                $nome = $this->Taes->find();
                $nome->where(['Taes.id' => $data['tae_id']]);
                $tae = $nome->first()->nome;
                $data['segmento'] = 'tae';
                $data['segmento_id'] = $data['tae_id'];
                $data['nome'] = $tae;
            endif;
            $essextensao = $this->Essextensoes->patchEntity($essextensao, $data);
            if ($this->Essextensoes->save($essextensao)) {
                $this->Flash->success(__('The extensao has been saved.'));

                return $this->redirect(['action' => 'view', $essextensao->id]);
            }
            $this->Flash->error(__('The extensao could not be saved. Please, try again.'));
        }
        $docentes = $this->Essextensoes->Docentes->find('list', ['limit' => 200])->all();
        $taes = $this->Essextensoes->Taes->find('list', ['limit' => 200])->all();
        // $segmentos = $this->Extensoes->Segmentos->find('list', ['limit' => 200])->all();
        $situacaopr5s = $this->Essextensoes->Situacaopr5->find('list', ['limit' => 200])->all();
        $this->set(compact('essextensao', 'docentes', 'taes', 'situacaopr5s'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Extensao id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $extensao = $this->Essextensoes->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $data = $this->request->getData();
            if ($data['docente_id']):
                $this->loadModel('Docentes');
                $nome = $this->Docentes->find();
                $nome->where(['Docentes.id' => $data['docente_id']]);
                $docente = $nome->first()->nome;
                $data['segmento'] = 'docente';
                $data['segmento_id'] = $data['docente_id'];
                $data['nome'] = $docente;
            elseif ($data['tae_id']):
                $this->loadModel('Taes');
                $nome = $this->Taes->find();
                $nome->where(['Taes.id' => $data['tae_id']]);
                $tae = $nome->first()->nome;
                $data['segmento'] = 'tae';
                $data['segmento_id'] = $data['tae_id'];
                $data['nome'] = $tae;
            endif;

            $extensao = $this->Essextensoes->patchEntity($extensao, $data);
            if ($this->Essextensoes->save($extensao)) {
                $this->Flash->success(__('The extensao has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The extensao could not be saved. Please, try again.'));
        }
        $docentes = $this->Essextensoes->Docentes->find('list', ['limit' => 250])->all();
        $taes = $this->Essextensoes->Taes->find('list', ['limit' => 200])->all();
        // $segmentos = $this->Essextensoes->Segmentos->find('list', ['limit' => 200])->all();
        $situacaopr5s = $this->Essextensoes->Situacaopr5->find('list', ['limit' => 5])->all();
        $this->set(compact('extensao', 'docentes', 'taes', 'situacaopr5s'));
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
        $extensao = $this->Essextensoes->get($id);
        if ($this->Essextensoes->delete($extensao)) {
            $this->Flash->success(__('The extensao has been deleted.'));
        } else {
            $this->Flash->error(__('The extensao could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
