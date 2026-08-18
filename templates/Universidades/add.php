<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Universidade $universidade
 */
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Listar Universidades'), ['action' => 'index'], ['class' => 'nav-link']) ?>
        </div>
    </aside>
</div>
<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <?= $this->element('templates'); ?>
            <?= $this->Form->create($universidade) ?>
            <fieldset>
                <legend><?= __('Cadastra Universidade') ?></legend>
                <?php
                echo $this->Form->control('universidade');
                echo $this->Form->control('observacoes', ['label' => ['text' => 'Observações']]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['class' => 'btn btn-success position-static']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
