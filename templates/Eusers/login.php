<?php
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
?>

<div class="row">
    <div class='col-lg-6 order-lg-1 order-2'>
        <div class="col-auto">
            <?= $this->Html->link("Cadastramento", ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
            <?= $this->element('templates'); ?>
            <?= $this->Flash->render() ?>
            <h3>Login</h3>
            <?= $this->Form->create() ?>
            <fieldset>
                <legend><?= __('Digite seu email e senha') ?></legend>
                <?php $this->Form->setTemplates(['input' => '<div class="col-7"><input class="form-control" type="{{type}}" name="{{name}}" {{attrs}}/></div>']); ?>
                <?= $this->Form->control('email', ['required' => true]) ?>
                <?= $this->Form->control('password', ['label' => 'Senha', 'required' => true]) ?>
            </fieldset>
            <?= $this->Form->submit(__('Login', ['class' => 'btn btn-success position-static'])); ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <div class='col-lg-6 order-lg-2 order-1'>
        <p>
            <br />
            <br />
            Prezadas(os) usuárias(os),
            <br />
            <br />
            Este espaço é para registrar suas atividades de extensão curricular. Registre <strong>cada atividade realizada a cada semestre</strong>, mesmo quando continue no mesmo projeto de extensão por mais tempo.
            <br />
            <br />
            Para ingressar pela primeira vez no sistema faça primeiramente cadastramento. Clique no <mark style="background-color: green; color: white;">botão verde</mark> que diz "<mark style="background-color: green; color: white;">cadastramento</mark>" e preencha a informação solicitada: <strong>DRE</strong>, <strong>e-mail</strong> e <strong>senha</strong> e siga a orientações das telas que lhe serão apresentadas. Nas sucessivas vezes que ingresse no sistema somente precisará digitar seu <strong>e-mail</strong> e <strong>senha</strong>.
            <br />
            <br />

        <p style="text-align: right">Coordenação de Extensão</p>
    </div>
</div>