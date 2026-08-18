<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Informacao $informacao
 */
?>
<div class="informacoes view content">
    <div class="row g-4">
        <div class="col-12">
            <div class="card shadow-sm h-100">
                <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <?= $this->Html->link(
                            '<span class="material-icons align-middle" style="font-size:18px;vertical-align:middle;">arrow_back</span> ' . __('Listar informações'),
                            ['action' => 'index'],
                            ['class' => 'btn btn-outline-secondary btn-sm', 'escape' => false]
                        ) ?>
                        <span class="text-muted small">
                            <strong><?= __('Id') ?>:</strong> <?= $this->Number->format($informacao->id) ?>
                        </span>
                        <span class="text-muted small">
                            <strong><?= __('Data') ?>:</strong> <?= h($informacao->date ?? ($informacao->data ?? '')) ?>
                        </span>
                    </div>
                    <?php if ($this->request->is('admin')): ?>
                        <div class="d-flex flex-wrap gap-2">
                            <?= $this->Html->link(
                                '<span class="material-icons align-middle" style="font-size:18px;vertical-align:middle;">add</span> ' . __('Nova informação'),
                                ['action' => 'add'],
                                ['class' => 'btn btn-success btn-sm', 'escape' => false]
                            ) ?>
                            <?= $this->Html->link(
                                '<span class="material-icons align-middle" style="font-size:18px;vertical-align:middle;">edit</span> ' . __('Editar'),
                                ['action' => 'edit', $informacao->id],
                                ['class' => 'btn btn-outline-primary btn-sm', 'escape' => false]
                            ) ?>
                            <?= $this->Form->postLink(
                                '<span class="material-icons align-middle" style="font-size:18px;vertical-align:middle;">delete</span> ' . __('Excluir'),
                                ['action' => 'delete', $informacao->id],
                                [
                                    'confirm' => __('Are you sure you want to delete # {0}?', $informacao->id),
                                    'class' => 'btn btn-outline-danger btn-sm',
                                    'escape' => false,
                                ]
                            ) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <h1 class="card-title h2 mb-4"><?= h($informacao->cabecalho) ?></h1>

                    <div class="card-text corpo-informacao mb-4 fs-5 lh-base">
                        <?= $this->Text->autoParagraph(h($informacao->corpo)) ?>
                    </div>

                    <?php if (!empty($informacao->pe)): ?>
                        <hr class="my-4">
                        <div class="card-text pe-informacao text-muted small">
                            <strong><?= __('Rodapé') ?>:</strong><br>
                            <?= $this->Text->autoParagraph(h($informacao->pe)) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="card-footer bg-transparent text-muted small d-flex justify-content-between flex-wrap gap-2">
                    <span>
                        <strong><?= __('Criado em') ?>:</strong>
                        <?= h($informacao->created ?? '') ?>
                    </span>
                    <span>
                        <strong><?= __('Atualizado em') ?>:</strong>
                        <?= h($informacao->modified ?? '') ?>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
