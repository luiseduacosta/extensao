<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Docente $docente
 */
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Listar docentes'), ['action' => 'index'], ['class' => 'nav-link text-secondary']) ?>
        </div>
    </aside>
</div>
<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <?= $this->element('templates'); ?>
            <?= $this->Form->create($docente) ?>
            <fieldset>
                <legend><?= __('Inserir docente') ?></legend>
                <?php
                echo $this->Form->control('nome', ['label' => ['text' => 'Nome']]);
                echo $this->Form->control('cpf', ['label' => ['text' => 'CPF']]);
                echo $this->Form->control('siape', ['label' => ['text' => 'Siape']]);
                echo $this->Form->control('datanascimento', ['label' => ['text' => 'Data de nascimento'], 'empty' => true]);
                echo $this->Form->control('localnascimento', ['label' => ['text' => 'Local de nascimento']]);
                echo $this->Form->control('sexo');
                echo $this->Form->control('ddd_telefone', ['label' => ['text' => 'DDD']]);
                echo $this->Form->control('telefone');
                echo $this->Form->control('ddd_celular', ['label' => ['text' => 'DDD']]);
                echo $this->Form->control('celular');
                echo $this->Form->control('email');
                echo $this->Form->control('homepage', ['label' => ['text' => 'Home Page']]);
                echo $this->Form->control('redesocial', ['label' => ['text' => 'Rede social']]);
                echo $this->Form->control('curriculolattes', ['label' => ['text' => 'Currículo lattes']]);
                echo $this->Form->control('atualizacaolattes', ['label' => ['text' => 'Atualização lattes'], 'empty' => true]);
                echo $this->Form->control('curriculosigma', ['label' => ['text' => 'Currículo Sigma']]);
                echo $this->Form->control('pesquisadordgp', ['label' => ['text' => 'Pesquisador DPG']]);
                echo $this->Form->control('formacaoprofissional', ['label' => ['text' => 'Formação profissional']]);
                echo $this->Form->control('universidadedegraduacao', ['label' => ['text' => 'Universidade de graduação']]);
                echo $this->Form->control('anoformacao', ['label' => ['text' => 'Ano de formação']]);
                echo $this->Form->control('mestradoarea', ['label' => ['text' => 'Área do mestrado']]);
                echo $this->Form->control('mestradouniversidade', ['label' => ['text' => 'Universidade de mestrado']]);
                echo $this->Form->control('mestradoanoconclusao', ['label' => ['text' => 'Conclussão do mestrado']]);
                echo $this->Form->control('doutoradoarea', ['label' => ['text' => 'Área de doutorado']]);
                echo $this->Form->control('doutoradouniversidade', ['label' => ['text' => 'Universidade de doutorado']]);
                echo $this->Form->control('doutoradoanoconclusao', ['label' => ['text' => 'Conclussão do doutorado']]);
                echo $this->Form->control('dataingresso', ['label' => ['text' => 'Data de ingresso'], 'empty' => true]);
                echo $this->Form->control('formaingresso', ['label' => ['text' => 'Forma de ingresso']]);
                echo $this->Form->control('tipocargo', ['label' => ['text' => 'Tipo de cargo']]);
                echo $this->Form->control('categoria', ['label' => ['text' => 'Categoria']]);
                echo $this->Form->control('regimetrabalho', ['label' => ['text' => 'Regime de trabalho']]);
                echo $this->Form->control('departamento', ['label' => ['text' => 'Departamento']]);
                echo $this->Form->control('dataegresso', ['label' => ['text' => 'Data de egresso'], 'empty' => true]);
                echo $this->Form->control('motivoegresso', ['label' => ['text' => 'Motivo de egresso']]);
                echo $this->Form->control('observacoes', ['label' => ['text' => 'Observações']]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success position-static']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
