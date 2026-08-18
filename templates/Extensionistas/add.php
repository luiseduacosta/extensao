<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Extensionista $extensionista
 * @var \Cake\Collection\CollectionInterface|string[] $alunosnovos
 * @var \Cake\Collection\CollectionInterface|string[] $extensoes
 */

?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Listar Extensionistas'), ['action' => 'index'], ['class' => 'nav-link']) ?>
        </div>
    </aside>
</div>

<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <h4>Cadastre cada atividade de extensão realizada a cada semestre</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <?= $this->element('templates'); ?>
            <?= $this->Form->create($extensionista) ?>
            <fieldset>
                <legend><?= __('Inserir atividade de extensão') ?></legend>
                <?php
                if (isset($estudante_id)):
                    echo $this->Form->control('estudante_id', ['label' => ['class' => 'col-3 control-label'], 'value' => $estudante_id, 'readonly']);
                else:
                    echo $this->Form->control('estudante_id', ['label' => ['text' => 'Estudante', 'class' => 'col-3 control-label'], 'options' => $estudantes]);
                endif;
                echo $this->Form->control('extensoes_id', ['label' => ['text' => 'Atividade de Extensão', 'class' => 'btn btn-primary'], 'options' => $extensoes, 'empty' => 'Seleciona']);
                echo $this->Form->control('essextensoes_id', ['label' => ['text' => 'Se faz parte da extensão da ESS, selecione', 'class' => 'col-3 control-label'], 'options' => $essextensoes, 'empty' => [null => 'Não'], 'require' => false]);
                echo $this->Form->control('cargahoraria', ['label' => ['text' => 'Carga horária', 'class' => 'col-3 control-label']]);
                echo $this->Form->control('ano');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success position-static']) ?>
            <?= $this->Form->end() ?>
            <?= $this->Html->link('Cadastrar ação de extensão', ['controller' => 'extensoes', 'action' => 'add'], ['role' => 'button', 'class' => 'btn btn-primary']); ?>
        </div>
    </div>
</div>
