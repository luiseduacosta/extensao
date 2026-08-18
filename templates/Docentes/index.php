<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Docente[]|\Cake\Collection\CollectionInterface $docentes
 */
$user = $this->request->getAttribute('identity');
if (!isset($user)):
    echo "Usuário não logado" . "<br>";
    header("Location:" . $this->Url->build(['controller' => 'Eusers', 'action' => 'login']));
    die();
endif;
?>
<div class="container">
    <?php if ($user->categoria == 1): ?>
        <?= $this->Html->link(__('Inserir'), ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
    <?php endif; ?>
    <h3><?= __('Docentes') ?></h3>
    <div class="row">
        <table class="table table-responsive table-hover">
            <thead class="thead-light">
                <tr>
                    <th><?= $this->Paginator->sort('id', "<span class=text-secondary>Id</span>", ['escape' => false]) ?></th>
                    <th><?= $this->Paginator->sort('nome', '<span class = text-secondary>Nome</span>', ['escape' => false]) ?></th>
                    <?php if ($user->categoria == 1): ?>
                        <th><?= $this->Paginator->sort('ddd_telefone', ['DDD']) ?></th>
                        <th><?= $this->Paginator->sort('telefone') ?></th>
                        <th><?= $this->Paginator->sort('ddd_celular', ['DDD']) ?></th>
                        <th><?= $this->Paginator->sort('celular') ?></th>
                        <th><?= $this->Paginator->sort('email') ?></th>
                        <th><?= $this->Paginator->sort('curriculolattes', ['Currículo lattes']) ?></th>
                        <th><?= $this->Paginator->sort('atualizacaolattes', ['Atualização lattes']) ?></th>
                        <th><?= $this->Paginator->sort('dataingresso', ['Data de ingresso']) ?></th>
                        <th><?= $this->Paginator->sort('formaingresso', ['Forma de ingresso']) ?></th>
                        <th><?= $this->Paginator->sort('tipocargo', ['Tipo de cargo']) ?></th>
                        <th><?= $this->Paginator->sort('categoria', ['Categoria']) ?></th>
                        <th><?= $this->Paginator->sort('regimetrabalho', ['Regime de trabalho']) ?></th>
                    <?php endif; ?>
                    <th><?= $this->Paginator->sort('departamento', ['Departamento']) ?></th>
                    <th><?= $this->Paginator->sort('dataegresso', ['Data de egresso']) ?></th>
                    <th><?= $this->Paginator->sort('motivoegresso', ['Motivo de egresso']) ?></th>
                    <?php if ($user->categoria == 1): ?>
                        <th class="actions"><?= __('Ações') ?></th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($docentes as $docente): ?>
                    <tr>
                        <td><?= $this->Number->format($docente->id, ['pattern' => '#####']) ?></td>
                        <?php if ($user->categoria == 1): ?>
                            <td><?= $this->Html->link(h($docente->nome ?? __('(sem nome)')), ['action' => 'view', $docente->id], ['class' => 'text-secondary']) ?></td>
                        <?php else: ?>
                            <td><?= h($docente->nome ?? '') ?></td>
                        <?php endif; ?>
                        <?php if ($user->categoria == 1): ?>
                            <td><?= h($docente->ddd_telefone) ?></td>
                            <td><?= h($docente->telefone) ?></td>
                            <td><?= h($docente->ddd_celular) ?></td>
                            <td><?= h($docente->celular) ?></td>
                            <td><?= h($docente->email) ?></td>
                            <td><?= h($docente->curriculolattes) ?></td>
                            <td><?= h($docente->atualizacaolattes) ?></td>
                            <td><?= h($docente->dataingresso) ?></td>
                            <td><?= h($docente->formaingresso) ?></td>
                            <td><?= h($docente->tipocargo) ?></td>
                            <td><?= h($docente->categoria) ?></td>
                            <td><?= h($docente->regimetrabalho) ?></td>
                        <?php endif; ?>
                        <td><?= h($docente->departamento) ?></td>
                        <td><?= h($docente->dataegresso) ?></td>
                        <td><?= h($docente->motivoegresso) ?></td>
                        <?php if ($user->categoria == 1): ?>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $docente->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $docente->id]) ?>
                                <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $docente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $docente->id)]) ?>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element('templates'); ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __('posterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
