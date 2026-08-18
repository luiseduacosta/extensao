<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Universidade $universidade
 */
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?=
            $this->Form->postLink(
                    __('Excluir'),
                    ['action' => 'delete', $universidade->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $universidade->id), 'class' => 'nav-link']
            )
            ?>
            <?= $this->Html->link(__('Listar'), ['action' => 'index'], ['class' => 'nav-link']) ?>
        </div>
    </aside>
</div>
<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <?= $this->element('templates'); ?>
            <?= $this->Form->create($universidade) ?>
            <fieldset>
                <legend><?= __('Editar Universidade') ?></legend>
                <?php
                echo $this->Form->control('universidade');
                echo $this->Form->control('observacoes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success position-static']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
