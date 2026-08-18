<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Extensao $extensao
 * @var string[]|\Cake\Collection\CollectionInterface $docentes
 * @var string[]|\Cake\Collection\CollectionInterface $taes
 */
// pr($extensao);
// pr($situacaopr5s);
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Form->postLink(
                __('Excluir'),
                ['action' => 'delete', $extensao->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $extensao->id), 'class' => 'nav-link']
            ) ?>
            <?= $this->Html->link(__('Listar'), ['action' => 'index'], ['class' => 'nav-link']) ?>
        </div>
    </aside>
</div>
<div class='row'>
    <div class="container justify-content-left">
        <div class="col-auto">
        <?= $this->element('templates'); ?>
        <?= $this->Form->create($extensao) ?>
            <fieldset>
                <legend><?= __('Editar') ?></legend>
                <?php
                    echo $this->Form->control('titulo', ['type' => 'text', 'label' => ['text' => 'Título']]);
                    echo $this->Form->control('docente_id', ['options' => $docentes, 'empty' => true]);
                    echo $this->Form->control('tae_id', ['options' => $taes, 'empty' => true]);
                    echo $this->Form->control('segmento');
                    echo $this->Form->control('segmento_id');
                    echo $this->Form->control('nome');
                    echo $this->Form->control('datacongregacao', ['label' => ['text' => 'Data da congregação'], 'empty' => true]);
                    echo $this->Form->control('situacaopr5_id', ['label' => ['text' => 'Situação na PR5']]);
                    echo $this->Form->control('versao', ['label' => ['text' => 'Versão']]);
                    echo $this->Form->control('tipo', ['label' => ['text' => 'Modalidade'], 'placeholder' => 'Programa, projeto, curso ou evento']);
                    echo $this->Form->control('observacoes', ['type' => 'textarea', 'label' => ['text' => 'Observações']]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success position-static']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
