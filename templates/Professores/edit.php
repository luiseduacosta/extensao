<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Professor $professor
 */
$departamentos = [
    'Fundamentos' => 'Fundamentos',
    'Métodos e técnicas' => 'Métodos e técnicas',
    'Política Social' => 'Política Social',
    'Outros' => 'Outros',
];
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light col-12 mb-3">
        <div class="collapse navbar-collapse">
            <?= $this->Form->postLink(
                __('Excluir'),
                ['action' => 'delete', $professor->id],
                ['confirm' => __('Tem certeza que deseja excluir # {0}?', $professor->id), 'class' => 'nav-link text-danger']
            ) ?>
            <?= $this->Html->link(__('Listar'), ['action' => 'index'], ['class' => 'nav-link text-secondary']) ?>
        </div>
    </aside>
</div>

<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <?= $this->element('templates'); ?>
            <?= $this->Form->create($professor) ?>
            <fieldset>
                <legend><?= __('Editar Professor') ?></legend>
                <?php
                echo $this->Form->control('nome', ['label' => ['text' => 'Nome']]);
                echo $this->Form->control('cpf', ['label' => ['text' => 'CPF']]);
                echo $this->Form->control('siape', ['label' => ['text' => 'Siape']]);
                echo $this->Form->control('cress', ['label' => ['text' => 'CRESS']]);
                echo $this->Form->control('regiao', ['label' => ['text' => 'Região']]);
                echo $this->Form->control('codigo_telefone', ['label' => ['text' => 'Código Telefone']]);
                echo $this->Form->control('telefone', ['label' => ['text' => 'Telefone']]);
                echo $this->Form->control('codigo_celular', ['label' => ['text' => 'Código Celular']]);
                echo $this->Form->control('celular', ['label' => ['text' => 'Celular']]);
                echo $this->Form->control('email', ['label' => ['text' => 'E-mail']]);
                echo $this->Form->control('curriculolattes', ['label' => ['text' => 'Currículo Lattes']]);
                echo $this->Form->control('atualizacaolattes', ['label' => ['text' => 'Atualização do Lattes'], 'type' => 'date', 'empty' => true]);
                echo $this->Form->control('dataingresso', ['label' => ['text' => 'Data de Ingresso'], 'type' => 'date', 'empty' => true]);
                echo $this->Form->control('tipocargo', [
                    'label' => ['text' => 'Tipo de Cargo'],
                    'options' => [
                        'efetivo' => 'Efetivo',
                        'substituto' => 'Substituto',
                        'temporario' => 'Temporário',
                        'visitante' => 'Visitante',
                    ],
                    'empty' => '-- Selecione --',
                ]);
                echo $this->Form->control('departamento', [
                    'label' => ['text' => 'Departamento'],
                    'options' => $departamentos,
                    'empty' => '-- Selecione --',
                ]);
                echo $this->Form->control('dataegresso', ['label' => ['text' => 'Data de Egresso'], 'type' => 'date', 'empty' => true]);
                echo $this->Form->control('motivoegresso', ['label' => ['text' => 'Motivo de Egresso']]);
                echo $this->Form->control('status', [
                    'label' => ['text' => 'Situação'],
                    'type' => 'select',
                    'options' => [
                        'ativo' => 'Ativo',
                        'aposentado' => 'Aposentado',
                        'inativo' => 'Inativo',
                    ],
                ]);
                echo $this->Form->control('user_id', ['label' => ['text' => 'Usuário Id']]);
                echo $this->Form->control('observacoes', [
                    'label' => ['text' => 'Observações'],
                    'type' => 'textarea',
                    'rows' => 4,
                ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-success position-static']) ?>
            <?= $this->Html->link(__('Cancelar'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
