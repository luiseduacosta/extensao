<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Essextensao $essextensao
 * @var \Cake\Collection\CollectionInterface|string[] $professores
 * @var \Cake\Collection\CollectionInterface|string[] $taes
 */
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Listar'), ['action' => 'index'], ['class' => 'nav-link']) ?>
        </div>
    </aside>
</div>
<div class='row'>
    <div class="container justify-content-left">
        <div class="col-auto">
            <?= $this->element('templates'); ?>
            <?= $this->Form->create($essextensao) ?>
            <fieldset>
                <legend><?= __('Inserir atividade de extensao da ESS') ?></legend>
                <?php
                echo $this->Form->control('titulo', ['label' => ['text' => 'Título', 'class' => 'col-3 control-label']]);
                echo $this->Form->control('docente_id', ['options' => $professores, 'empty' => 'Selecione um Professor ou um Tae']);
                echo $this->Form->control('tae_id', ['empty' => 'Selecione um Tae ou um Docente', 'options' => $taes]);
                echo $this->Form->control('datacongregacao', ['label' => ['text' => 'Aprovação na congregação', 'class' => 'col-3 control-label'], 'empty' => true]);
                echo $this->Form->control('situacaopr5_id', ['label' => ['text' => 'Situação na PR5', 'class' => 'col-3 control-label']]);
                echo $this->Form->control('tipo', ['label' => ['text' => 'Modalidade', 'class' => 'col-3 control-label'], 'placeholder' => 'Programa, projeto, curso ou evento']);
                echo $this->Form->control('versao', ['label' => ['text' => 'Versão', 'class' => 'col-3 control-label']]);
                echo $this->Form->control('observacoes', ['label' => ['text' => 'Observações', 'class' => 'col-3 control-label']]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success position-static']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
