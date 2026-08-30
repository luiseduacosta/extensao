<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

/**
 * Professores Controller
 *
 * @property \App\Model\Table\ProfessoresTable $Professores
 * @method \App\Model\Entity\Professor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProfessoresController extends AppController
{
    private const STATUS_LABELS = [
        'ativo' => 'Ativo',
        'aposentado' => 'Aposentado',
        'inativo' => 'Inativo',
    ];

    private const STATUS_ALIASES = [
        'ativo' => ['ativo', 'active', 'activo'],
        'aposentado' => ['aposentado', 'retired'],
        'inativo' => ['inativo', 'inactive', 'inactivo'],
    ];

    public function beforeFilter(EventInterface $event): void
    {
        parent::beforeFilter($event);
        if (isset($this->Authentication)) {
            $this->Authentication->addUnauthenticatedActions(['index', 'view']);
        }
    }

    public function index()
    {
        // Get filter parameters from query string
        $statusFilter = $this->request->getQuery('status');
        $departamentoFilter = $this->request->getQuery('departamento');

        // Get unique departamentos for dropdown
        $departamentos = $this->Professores->find()
            ->select(['departamento'])
            ->distinct(['departamento'])
            ->where(['departamento IS NOT' => null])
            ->orderBy(['departamento' => 'ASC'])
            ->toArray();

        $departamentosList = [];
        foreach ($departamentos as $departamento) {
            if (!empty($departamento->departamento)) {
                $departamentosList[$departamento->departamento] = $departamento->departamento;
            }
        }

        // Get unique status for dropdown
        $status = $this->Professores->find()
            ->select(['status'])
            ->distinct(['status'])
            ->where(['status IS NOT' => null])
            ->orderBy(['status' => 'ASC'])
            ->toArray();
        $statusList = [];
        foreach ($status as $statusItem) {
            $canonicalStatus = $this->canonicalStatus((string) $statusItem->status);
            $statusList[$canonicalStatus] = self::STATUS_LABELS[$canonicalStatus] ?? $canonicalStatus;
        }
        asort($statusList);

        // Build query
        $query = $this->Professores->find();

        // Apply status filter (normalize aliases to canonical status first)
        if ($statusFilter) {
            $canonical = $this->canonicalStatus($statusFilter);
            $aliases = self::STATUS_ALIASES[$canonical] ?? [$canonical];
            $query->where(['Professores.status IN' => $aliases]);
        }

        // Apply departamento filter
        if ($departamentoFilter) {
            $query->where(['Professores.departamento' => $departamentoFilter]);
        }

        $config = [
            'order' => ['nome' => 'ASC'],
            'sortableFields' => [
                'id',
                'nome',
                'cpf',
                'siape',
                'departamento',
                'status',
                'email',
                'estagiarios_count',
            ],
        ];

        $professores = $this->paginate($query, $config);

        $statusFilterLabel = $statusFilter ? (self::STATUS_LABELS[$this->canonicalStatus($statusFilter)] ?? $statusFilter) : null;

        $this->set(compact(
            'professores',
            'departamentosList',
            'statusList',
            'statusFilter',
            'statusFilterLabel',
            'departamentoFilter'
        ));
    }

    public function view($id = null)
    {
        $professor = $this->Professores->get($id, contain: ['Essextensoes']);

        $this->set(compact('professor'));
    }

    public function add()
    {
        $professor = $this->Professores->newEmptyEntity();
        $professor->status = 'ativo';

        if ($this->request->is('post')) {
            $professor = $this->Professores->patchEntity($professor, $this->request->getData());
            if ($this->Professores->save($professor)) {
                $this->Flash->success(__('O professor foi salvo com sucesso.'));

                return $this->redirect(['action' => 'view', $professor->id]);
            }
            $this->Flash->error(__('Não foi possível salvar o professor. Tente novamente.'));
        }
        $this->set(compact('professor'));
    }

    private function canonicalStatus(string $status): string
    {
        foreach (self::STATUS_ALIASES as $canonicalStatus => $aliases) {
            if (\in_array($status, $aliases, true)) {
                return $canonicalStatus;
            }
        }

        return $status;
    }

    public function edit($id = null)
    {
        $professor = $this->Professores->get($id, contain: []);
        $professor->status = $this->canonicalStatus((string) $professor->status);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $professor = $this->Professores->patchEntity($professor, $this->request->getData());
            if ($this->Professores->save($professor)) {
                $this->Flash->success(__('O professor foi atualizado com sucesso.'));

                return $this->redirect(['action' => 'view', $professor->id]);
            }
            $this->Flash->error(__('Não foi possível atualizar o professor. Tente novamente.'));
        }
        $this->set(compact('professor'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $professor = $this->Professores->get($id);
        if ($this->Professores->delete($professor)) {
            $this->Flash->success(__('O professor foi excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Não foi possível excluir o professor. Tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
