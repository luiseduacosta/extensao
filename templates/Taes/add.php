<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tae $tae
 */
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Listar Taes'), ['action' => 'index'], ['class' => 'nav-link']) ?>
        </div>
    </aside>
    <div class="container justify-content-left">
        <div class="col-auto">
            <?= $this->element('templates'); ?>
            <?= $this->Form->create($tae) ?>
            <fieldset>
                <legend><?= __('Inserir Tae') ?></legend>
                <?php
                echo $this->Form->control('siape');
                echo $this->Form->control('nome');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success position-static']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
