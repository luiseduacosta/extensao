<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Informacao[]|\Cake\Collection\CollectionInterface $informacoes
 */
?>
<div class="informacoes index content">
    <?= $this->Html->link(__('Nova informação'), ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
    <h3><?= __('Informações da Coordenação de Extensão') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>
                        <?= $this->Paginator->sort('id', 'Id') ?>
                        <?= $this->Paginator->sort('cabecalho', 'Título') ?>
                        <?= $this->Paginator->sort('corpo', 'Corpo') ?>
                        <?= $this->Paginator->sort('date', 'Data') ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($informacoes as $informacao): ?>
                    <tr>
                        <td>
                            <?= $this->Number->format($informacao->id) ?><br>
                            <?= $this->Html->link(h($informacao->cabecalho), ['action' => 'view', $informacao->id]) ?><br>
                            <?= h($informacao->corpo) ?>
                            <?= h($informacao->date) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
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
