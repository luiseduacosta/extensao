<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tae $tae
 */
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?=
            $this->Form->postLink(
                    __('Excluir'),
                    ['action' => 'delete', $tae->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $tae->id), 'class' => 'nav-link']
            )
            ?>
            <?= $this->Html->link(__('List Taes'), ['action' => 'index'], ['class' => 'nav-link']) ?>
        </div>
    </aside>
</div>
<div class='row'>
    <div class="container justify-content-left">
        <div class="col-auto">
            <?= $this->element('templates'); ?> 
            <?= $this->Form->create($tae) ?>
            <fieldset>
                <legend><?= __('Editar Tae') ?></legend>
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
