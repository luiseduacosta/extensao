<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Extensao[]|\Cake\Collection\CollectionInterface $extensoes
 */
?>
<div class="container">
    <?= $this->Html->link(__('Cadastrar atividade de extensão'), ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
    <h3><?= __('Atividades de extensão curricular') ?></h3>
    <div class="table-responsive">
        <table class="table table-hover table-responsive">
            <thead class="table-light">
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('titulo', "Nome") ?></th>
                    <th><?= $this->Paginator->sort('coordenacao', 'Coordenação') ?></th>
                    <th><?= $this->Paginator->sort('unidade') ?></th>
                    <th><?= $this->Paginator->sort('essextensoes_id', "Extensão ESS") ?></th>
                    <th><?= $this->Paginator->sort('observacoes', 'Observações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($extensoes as $extensao): ?>
                    <tr>
                        <td><?= $this->Number->format($extensao->id) ?></td>
                        <td><?= $this->Html->link(h($extensao->titulo), ['action' => 'view', $extensao->id]) ?></td>
                        <td><?= h($extensao->coordenacao) ?></td>
                        <td><?= h($extensao->unidade) ?></td>
                        <td><?= $extensao->has('essextensao') ? $this->Html->link($extensao->essextensao->titulo, ['controller' => 'Essextensoes', 'action' => 'view', $extensao->essextensao->id]) : '' ?></td>
                        <td><?= h($extensao->observacoes) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element('templates'); ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
