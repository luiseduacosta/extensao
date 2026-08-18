<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Extensao $extensao
 * @var string[]|\Cake\Collection\CollectionInterface $essextensoes
 */
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?=
            $this->Form->postLink(
                    __('Excluir'),
                    ['action' => 'delete', $extensao->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $extensao->id), 'class' => 'nav-link']
            )
            ?>
            <?= $this->Html->link(__('Listar atividades de extensão'), ['action' => 'index'], ['class' => 'nav-link']) ?>
        </div>
    </aside>
</div>
<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <?= $this->element('templates'); ?>
            <?= $this->Form->create($extensao) ?>
            <fieldset>
                <legend><?= __('Editar') ?></legend>
                <?php
                echo $this->Form->control('titulo', ['label' => ['text' => 'Título']]);
                echo $this->Form->control('coordenacao', ['label' => ['text' => 'Coordenação']]);
                echo $this->Form->control('universidade_id', ['label' => ['text' => 'Universidade da ação de extensão'], 'options' => $universidades, 'empty' => true]);
                echo $this->Form->control('unidade', ['label' => ['text' => 'Unidade da universidade']]);
                echo $this->Form->control('essextensoes_id', ['label' => ['text' => 'Extensão da ESS'], 'options' => $essextensoes, 'empty' => true]);
                echo $this->Form->control('observacoes', ['label' => ['text' => 'Observações']]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success position-static']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
