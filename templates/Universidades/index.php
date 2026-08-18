<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Universidade[]|\Cake\Collection\CollectionInterface $universidades
 */
?>
<div class="conteiner">
    <?= $this->Html->link(__('Cadastra Universidade'), ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
    <h3><?= __('Universidades') ?></h3>
    <div class="table-responsive">
        <table class="table table-hover table-responsive">
            <thead class="table-light">
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('universidade') ?></th>
                    <th><?= $this->Paginator->sort('observacoes', 'Observações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($universidades as $universidade): ?>
                <tr>
                    <td><?= $this->Number->format($universidade->id) ?></td>
                    <td><?= $this->Html->link($universidade->universidade, ['controller' => 'universidades', 'action' => 'view', $universidade->id]) ?></td>
                    <td><?= h($universidade->observacoes) ?></td>
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
