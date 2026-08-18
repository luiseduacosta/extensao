<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Extensao $extensao
 * @var \Cake\Collection\CollectionInterface|string[] $essextensoes
 */
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Listar atividades de extensão'), ['action' => 'index'], ['class' => 'nav-link']) ?>
        </div>
    </aside>
</div>
<div class="row">
    <div class="container justify-content-left">
        <div class='col-auto'>
            <?= $this->element('templates'); ?>
            <?= $this->Form->create($extensao) ?>
            <fieldset>
                <legend><?= __('Inserir atividade de extensão') ?></legend>
                <?php
                echo $this->Form->control('titulo', ['type' => 'text', 'label' => ['text' => 'Título'], 'list' => 'listatitulos', 'placeholder' => 'Digite ou selecione uma atividade de extensão']);
                ?>
                <datalist id="listatitulos">
                    <?php
                    foreach ($extensoes as $c_titulo) {
                        echo "<option value='" . $c_titulo->titulo . "'>";
                    };
                    ?>
                </datalist>
                <?php
                echo $this->Form->control('coordenacao', ['label' => ['text' => 'Coordenador(a)'], 'list' => 'listacoordenadores', 'placeholder' => 'Digite ou selecione um(a) coordenador(a)']);
                ?>
                <datalist id="listacoordenadores">
                    <?php
                    foreach ($extensoes as $c_coordenador) {
                        echo "<option value='" . $c_coordenador->coordenacao . "'>";
                    };
                    ?>
                </datalist>

                <?php
                echo $this->Form->control('universidade_id', ['type' => 'select', 'label' => ['text' => 'Universidade da ação de extensão'], 'options' => $universidades, 'placeholder' => 'Selecione a universidade']);
                ?>
                
                <?php
                echo $this->Form->control('unidade', ['type' => 'text', 'label' => ['text' => 'Unidade'], 'list' => 'listaunidades', 'placeholder' => 'Digite ou selecione a unidade tanto se for da UFRJ como de outra instituição']);
                ?>
                <datalist id="listaunidades">
                    <?php
                    foreach ($extensoes as $c_extensao) {
                        echo "<option value='" . $c_extensao->unidade ."'>";
                    };
                    ?>
                </datalist>
                <?php
                echo $this->Form->control('essextensoes_id', ['label' => ['text' => 'Há vínculo com projeto de extensão da ESS? Selecione'], 'options' => $essextensoes, 'empty' => [null => 'Não'], 'placeholder' => 'Se houver vínculo com projeto de extensão da ESS, selecione aquí o projeto de extensão da ESS']);
                echo $this->Form->control('observacoes', ['label' => ['text' => 'Observações']]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success position-static']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
