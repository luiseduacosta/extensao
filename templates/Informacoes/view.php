<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Informacao $informacao
 */
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Editar informações'), ['action' => 'edit', $informacao->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Excluir informação'), ['action' => 'delete', $informacao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $informacao->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Listar informações'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('Nova informação'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
</div>
<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <h3><?= h($informacao->cabecalho) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($informacao->id) ?></td>
                </tr>

                <tr>
                    <th><?= __('Título') ?></th>
                    <td><?= h($informacao->cabecalho) ?></td>
                </tr>

                <tr>
                    <th><strong><?= __('Corpo') ?></strong></th>
                    <td><blockquote>
                            <?= $this->Text->autoParagraph(h($informacao->corpo)); ?>
                        </blockquote>
                    </td>
                    </div>
                </tr>

                <tr>
                    <th><?= __('Data') ?></th>
                    <td><?= h($informacao->data) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
