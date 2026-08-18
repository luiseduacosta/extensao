<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Extensionista $extensionista
 * @var string[]|\Cake\Collection\CollectionInterface $alunosnovos
 * @var string[]|\Cake\Collection\CollectionInterface $extensoes
 */
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?=
            $this->Form->postLink(
                    __('Excluir'),
                    ['action' => 'delete', $extensionista->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $extensionista->id), 'class' => 'nav-link']
            )
            ?>
            <?= $this->Html->link(__('Listar extensionistas'), ['action' => 'index'], ['class' => 'nav-link']) ?>
        </div>
    </aside>
</div>

<div class='row'>
    <div class="container justify-content-left">
        <div class="col-auto">
            <?= $this->element('templates'); ?>
            <?= $this->Form->create($extensionista) ?>
            <fieldset>
                <legend><?= __('Editar extensionista') ?></legend>
                <?php
                echo $this->Form->control('estudante_id', ['label' => ['text' => 'Estudante'], 'options' => $estudantes]);
                echo $this->Form->control('extensao_id', ['label' => ['text' => 'Extensão'], 'options' => $extensoes]);
                echo $this->Form->control('cargahoraria', ['label' => ['text' => 'Carga horária']]);
                echo $this->Form->control('ano', ['label' => ['text' => 'Ano']]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success position-static']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
