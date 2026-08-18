<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Euser $euser
 */
$user = $this->request->getAttribute('identity');
if (isset($user)):
    ?>
    <div class="row">
        <aside class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <?= $this->Html->link(__('Listar'), ['action' => 'index'], ['class' => 'nav-link']) ?>
            </div>
        </aside>
    </div>

    <?php
endif;
?>
<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <?= $this->Form->create($euser) ?>
            <?= $this->element('templates'); ?>
            <fieldset>
                <legend><?= __('Adiciona usuário') ?></legend>
                <?php
                echo $this->Form->control('registro', ['label' => ['text' => 'DRE']]);
                echo $this->Form->control('email', ['label' => ['text' => 'E-mail']]);
                echo $this->Form->control('password', ['label' => ['text' => 'Senha']]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success position-static']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
