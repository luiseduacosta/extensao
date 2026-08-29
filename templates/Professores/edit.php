<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Professor $professor
 */
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?=
            $this->Form->postLink(
                    __('Excluir'),
                    ['action' => 'delete', $professor->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $professor->id), 'class' => 'nav-link text-success']
            )
            ?>
            <?= $this->Html->link(__('Listar'), ['action' => 'index'], ['class' => 'nav-link text-success']) ?>
        </div>
    </aside>
</div>

<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <?= $this->element('templates'); ?>
            <?= $this->Form->create($professor) ?>
            <fieldset>
                <legend><?= __('Editar') ?></legend>
                <?php
                echo $this->Form->control('nome');
                echo $this->Form->control('cpf', ['label' => ['text' => 'CPF']]);
                echo $this->Form->control('siape');
                echo $this->Form->control('cress', ['label' => ['text' => 'Cress']]);
                echo $this->Form->control('regiao', ['label' => ['text' => 'Região']]);
                echo $this->Form->control('codigo_telefone', ['label' => ['text' => 'Código Telefone']]);
                echo $this->Form->control('telefone');
                echo $this->Form->control('codigo_celular', ['label' => ['text' => 'Código Celular']]);
                echo $this->Form->control('celular');
                echo $this->Form->control('email');
                echo $this->Form->control('curriculolattes', ['label' => ['text' => 'Curriculo Lattes']]);
                echo $this->Form->control('atualizacaolattes', ['label' => ['text' => 'Atualização Lattes'], 'empty' => true]);
                echo $this->Form->control('dataingresso', ['label' => ['text' => 'Data de ingresso'], 'empty' => true]);
                echo $this->Form->control('departamento', ['label' => ['text' => 'Departamento']]);
                echo $this->Form->control('dataegresso', ['empty' => true]);
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
