<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
$cakeDescription = 'Coordenação de extensão da ESS/UFRJ';
?>
<!DOCTYPE html>
<html lang='pt-br'>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css('bootstrap.min'); ?>
    <?= $this->Html->script(['jquery-3.6.0', 'popper.min', 'bootstrap.min', 'bootstrap.bundle.min']); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarPrincipal">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarPrincipal'>

            <ul class="navbar-nav mr-auto">
                <li class="nav-item ative">
                    <?= $this->Html->link($this->Html->image('minerva_transparente.png', ['height' => '30', 'width' => '30']), ['controller' => 'extensoes', 'action' => 'index'], ['class' => 'navbar-brand', 'escape' => FALSE]); ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Extensão na ESS', ['controller' => 'essextensoes', 'action' => 'index'], ['class' => 'nav-link']); ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Informações de vagas', ['controller' => 'informacoes', 'action' => 'index'], ['class' => 'nav-link']); ?>
                </li>

                <?php if (isset($this->request->getAttribute('identity')->email)): ?>
                    <?php $user = $this->request->getAttribute('identity'); ?>
                    <?php // pr($user); ?>
                <?php endif; ?>

                <?php if (isset($user) && $user->categoria == '1'): ?>
                    <li class="nav-item">
                        <?= $this->Html->link('Universidades', ['controller' => 'universidades', 'action' => 'index'], ['class' => 'nav-link']); ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Docentes', ['controller' => 'docentes', 'action' => 'index'], ['class' => 'nav-link']); ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Técnicos', ['controller' => 'taes', 'action' => 'index'], ['class' => 'nav-link']); ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Estudantes', ['controller' => 'estudantes', 'action' => 'index'], ['class' => 'nav-link']); ?>
                    </li>
                <?php endif; ?>
                <?php if (isset($user) && ($user->categoria == '2' || $user->categoria == '1')): ?>
                    <li class="nav-item">
                        <?= $this->Html->link('Extensionistas', ['controller' => 'extensionistas', 'action' => 'index'], ['class' => 'nav-link']); ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('Atividades de Extensão', ['controller' => 'extensoes', 'action' => 'index'], ['class' => 'nav-link']); ?>
                    </li>
                <?php endif; ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <?php if (isset($this->request->getAttribute('identity')->email)): ?>
                        <?php $user = $this->request->getAttribute('identity')->email; ?>
                    <?php endif; ?>
                    <?php if (isset($user) && !empty($user)): ?>
                        <?= $this->Html->link($this->Html->tag('span', 'Sair', ['class' => 'material-symbols-outlined']), ['controller' => 'eusers', 'action' => 'logout'], ['class' => 'nav-link', 'escape' => FALSE]); ?>
                    <?php else: ?>
                        <?= $this->Html->link($this->Html->tag('span', 'Entrar', ['class' => 'material-symbols-outlined']), ['controller' => 'eusers', 'action' => 'login'], ['class' => 'nav-link', 'escape' => FALSE]); ?>
                    <?php endif; ?>

                </li>
            </ul>
        </div>
        </div>
    </nav>

    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>

</html>