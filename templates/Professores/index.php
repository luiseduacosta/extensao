<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Professor[]|\Cake\Collection\CollectionInterface $professores
 * @var array $statusList
 * @var array $departamentosList
 * @var string|null $statusFilter
 * @var string|null $statusFilterLabel
 * @var string|null $departamentoFilter
 */
$user = $this->request->getAttribute('identity');
$isCategory1 = isset($user) && ($user->categoria ?? 0) == 1;

$statusLabels = [
    'ativo' => __('Ativo'),
    'active' => __('Ativo'),
    'activo' => __('Ativo'),
    'aposentado' => __('Aposentado'),
    'retired' => __('Aposentado'),
    'inativo' => __('Inativo'),
    'inactive' => __('Inativo'),
    'inactivo' => __('Inativo'),
];
?>
<div class="container">
    <div class="row align-items-center mb-3">
        <div class="col">
            <h3><?= __('Professores') ?></h3>
            <?php if ($statusFilter || $departamentoFilter): ?>
                <small class="text-muted">
                    <?= __('Filtros ativos:') ?>
                    <?php if ($statusFilter): ?>
                        <span class="badge bg-primary"><?= __('Status') ?>: <?= h($statusFilterLabel) ?></span>
                    <?php endif; ?>
                    <?php if ($departamentoFilter): ?>
                        <span class="badge bg-primary"><?= __('Departamento') ?>: <?= h($departamentoFilter) ?></span>
                    <?php endif; ?>
                </small>
            <?php endif; ?>
        </div>
        <?php if ($isCategory1): ?>
            <div class="col-auto">
                <?= $this->Html->link(__('Novo Professor'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Filters -->
    <div class="row mb-3">
        <div class="col-12">
            <?= $this->Form->create(null, ['type' => 'get', 'class' => 'row g-3 align-items-end']) ?>

            <!-- Status Filter -->
            <div class="col-auto">
                <?= $this->Form->control('status', [
                    'label' => __('Status'),
                    'options' => ['' => __('Todos')] + ($statusList ?? []),
                    'default' => $statusFilter,
                    'empty' => false
                ]) ?>
            </div>

            <!-- Departamento Filter -->
            <div class="col-auto">
                <?= $this->Form->control('departamento', [
                    'label' => __('Departamento'),
                    'options' => ['' => __('Todos')] + ($departamentosList ?? []),
                    'default' => $departamentoFilter,
                    'empty' => false
                ]) ?>
            </div>

            <!-- Filter Button -->
            <div class="col-auto">
                <?= $this->Form->button(__('Filtrar'), ['class' => 'btn btn-primary']) ?>
            </div>

            <!-- Clear Filters Button -->
            <?php if ($statusFilter || $departamentoFilter): ?>
                <div class="col-auto">
                    <?= $this->Html->link(
                        __('Limpar Filtros'),
                        ['action' => 'index'],
                        ['class' => 'btn btn-outline-secondary']
                    ) ?>
                </div>
            <?php endif; ?>

            <?= $this->Form->end() ?>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead class="thead-light">
                <tr>
                    <th><?= $this->Paginator->sort('id', __('Id')) ?></th>
                    <th><?= $this->Paginator->sort('nome', __('Nome')) ?></th>
                    <th><?= $this->Paginator->sort('siape', __('SIAPE')) ?></th>
                    <th><?= $this->Paginator->sort('departamento', __('Departamento')) ?></th>
                    <th><?= $this->Paginator->sort('status', __('Status')) ?></th>
                    <?php if ($isCategory1): ?>
                        <th><?= $this->Paginator->sort('cpf', __('CPF')) ?></th>
                        <th><?= $this->Paginator->sort('email', __('E-mail')) ?></th>
                        <th><?= $this->Paginator->sort('telefone', __('Telefone')) ?></th>
                        <th><?= $this->Paginator->sort('celular', __('Celular')) ?></th>
                    <?php endif; ?>
                    <th><?= $this->Paginator->sort('estagiarios_count', __('Estagiários')) ?></th>
                    <th><?= $this->Paginator->sort('dataegresso', __('Data de Egresso')) ?></th>
                    <th><?= $this->Paginator->sort('motivoegresso', __('Motivo de Egresso')) ?></th>
                    <?php if ($isCategory1): ?>
                        <th class="actions"><?= __('Ações') ?></th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($professores as $professor): ?>
                    <tr>
                        <td><?= $this->Number->format($professor->id) ?></td>
                        <td>
                            <?php if ($isCategory1): ?>
                                <?= $this->Html->link(h($professor->nome), ['action' => 'view', $professor->id], ['class' => 'text-secondary']) ?>
                            <?php else: ?>
                                <?= h($professor->nome) ?>
                            <?php endif; ?>
                        </td>
                        <td><?= h($professor->siape) ?></td>
                        <td><?= h($professor->departamento) ?></td>
                        <td><?= h($statusLabels[$professor->status] ?? $professor->status) ?></td>
                        <?php if ($isCategory1): ?>
                            <td><?= h($professor->cpf) ?></td>
                            <td><?= h($professor->email) ?></td>
                            <td><?= $professor->codigo_telefone ? '(' . h($professor->codigo_telefone) . ') ' . h($professor->telefone) : h($professor->telefone) ?></td>
                            <td><?= $professor->codigo_celular ? '(' . h($professor->codigo_celular) . ') ' . h($professor->celular) : h($professor->celular) ?></td>
                        <?php endif; ?>
                        <td><?= $professor->estagiarios_count ?? 0 ?></td>
                        <td><?= h($professor->dataegresso) ?></td>
                        <td><?= h($professor->motivoegresso) ?></td>
                        <?php if ($isCategory1): ?>
                            <td class="actions text-nowrap">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $professor->id], ['class' => 'btn btn-sm btn-info']) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $professor->id], ['class' => 'btn btn-sm btn-warning']) ?>
                                <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $professor->id], [
                                    'confirm' => __('Tem certeza que deseja excluir {0}?', $professor->nome),
                                    'class' => 'btn btn-sm btn-danger'
                                ]) ?>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element('templates'); ?>
    <div class="paginator mt-3">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de {{count}} total')) ?></p>
    </div>
</div>
