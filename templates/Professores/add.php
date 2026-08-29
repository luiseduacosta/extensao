<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Professor $professor
 */
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Listar professores'), ['action' => 'index'], ['class' => 'nav-link text-secondary']) ?>
        </div>
    </aside>
</div>
<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <?= $this->element('templates'); ?>
            <?= $this->Form->create($professor) ?>
            <fieldset>
                <legend><?= __('Inserir professor') ?></legend>
                <?php
                echo $this->Form->control('nome', ['label' => ['text' => 'Nome']]);
                echo $this->Form->control('cpf', ['label' => ['text' => 'CPF']]);
                echo $this->Form->control('siape', ['label' => ['text' => 'Siape']]);
                echo $this->Form->control('cress', ['label' => ['text' => 'Cress']]);
                echo $this->Form->control('regiao', ['label' => ['text' => 'Região']]);
                echo $this->Form->control('codigo_telefone', ['label' => ['text' => 'Código Telefone']]);
                echo $this->Form->control('telefone');
                echo $this->Form->control('codigo_celular', ['label' => ['text' => 'Código Celular']]);
                echo $this->Form->control('celular');
                echo $this->Form->control('email');
                echo $this->Form->control('curriculolattes', ['label' => ['text' => 'Currículo lattes']]);
                echo $this->Form->control('atualizacaolattes', ['label' => ['text' => 'Atualização lattes'], 'empty' => true]);
                echo $this->Form->control('dataingresso', ['label' => ['text' => 'Data de ingresso'], 'empty' => true]);
                echo $this->Form->control('departamento', ['label' => ['text' => 'Departamento']]);
                echo $this->Form->control('dataegresso', ['label' => ['text' => 'Data de egresso'], 'empty' => true]);
                echo $this->Form->control('motivoegresso', ['label' => ['text' => 'Motivo de egresso']]);
                echo $this->Form->control('status', ['label' => ['text' => 'Status']]);
                echo $this->Form->control('user_id', ['label' => ['text' => 'Usuário Id']]);
                echo $this->Form->control('observacoes', ['label' => ['text' => 'Observações']]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success position-static']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
