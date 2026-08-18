<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Informacao[]|\Cake\Collection\CollectionInterface $informacoes
 */
?>
<div class="informacoes index content">
    <?php if ($this->request->is('admin')): ?>
        <?= $this->Html->link(__('Nova informação'), ['action' => 'add'], ['class' => 'btn btn-success float-right mb-3']) ?>
    <?php endif; ?>
    <h3 class="mb-4"><?= __('Informações da Coordenação de Extensão') ?></h3>

    <div class="mb-3 small text-muted d-flex flex-wrap gap-3">
        <span><?= __('Ordenar por:') ?></span>
        <span><?= $this->Paginator->sort('id', 'Id') ?></span>
        <span><?= $this->Paginator->sort('cabecalho', 'Título') ?></span>
        <span><?= $this->Paginator->sort('corpo', 'Corpo') ?></span>
        <span><?= $this->Paginator->sort('date', 'Data') ?></span>
    </div>

    <?php if ($informacoes->isEmpty()): ?>
        <div class="alert alert-info"><?= __('Nenhuma informação encontrada.') ?></div>
    <?php else: ?>
        <div class="row">
            <?php foreach ($informacoes as $informacao): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $this->Html->link(h($informacao->cabecalho), ['action' => 'view', $informacao->id], ['class' => 'text-decoration-none']) ?>
                            </h5>
                            <div class="card-text text-muted small mb-3">
                                <?= $this->Number->format($informacao->id) ?>
                            </div>
                            <div class="card-text mb-2">
                                <?= $this->Text->autoParagraph(h($informacao->corpo)) ?>
                            </div>
                            <?php if (!empty($informacao->pe)): ?>
                                <div class="card-text mb-2">
                                    <?= h($informacao->pe) ?>
                                </div>
                            <?php endif; ?>
                            <div class="card-text text-muted small">
                                <strong><?= __('Data') ?>:</strong>
                                <?= h($informacao->date ?? ($informacao->data ?? '')) ?>
                            </div>
                        </div>
                        <?php if ($this->request->is('admin')): ?>
                            <div class="card-footer bg-transparent border-top-0 d-flex gap-2">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $informacao->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $informacao->id], ['class' => 'btn btn-outline-secondary btn-sm']) ?>
                                <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $informacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $informacao->id), 'class' => 'btn btn-outline-danger btn-sm']) ?>
                            </div>
                        <?php else: ?>
                            <div class="card-footer bg-transparent border-top-0">
                                <?= $this->Html->link(__('Ver detalhes'), ['action' => 'view', $informacao->id], ['class' => 'btn btn-outline-primary btn-sm']) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="paginator mt-5">
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
