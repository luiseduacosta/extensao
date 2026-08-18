<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Informacao $informacao
 */
?>

<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/translations/pt.js"></script>

<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="col-auto">
            <?= $this->Form->postLink(
                __('Excluir'),
                ['action' => 'delete', $informacao->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $informacao->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Listar informações'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
</div>
<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <?= $this->element('templates'); ?>
            <?= $this->Form->create($informacao) ?>
            <fieldset>
                <legend><?= __('Editar informações') ?></legend>
                <?php
                    echo $this->Form->control('cabecalho', ['label' => ['text' => 'Título']]);
                    echo $this->Form->control('corpo', ['label' => ['text' => 'Corpo']]);
                    echo $this->Form->control('date', ['label' => ['text' => 'Data']]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success position-static']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
