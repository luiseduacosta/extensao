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
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Listar informações'), ['action' => 'index'], ['class' => 'nav-link text-secondary']) ?>
        </div>
    </aside>
</div>
<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <?= $this->element('templates'); ?>
            <?= $this->Form->create($informacao) ?>
            <fieldset>
                <legend><?= __('Nova informação') ?></legend>
                <?php
                echo $this->Form->control('cabecalho', ['label' => ['text' => 'Título']]);
                echo $this->Form->control('corpo', ['label' => ['text' => 'Corpo']]);
                echo $this->Form->control('date', ['type' => 'hidden']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success position-static']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
