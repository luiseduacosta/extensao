<?php
/**
 * @var \App\View\AppView $this
 * @var \App\ Model\Entity\Extensionista $extensionista
 */
// pr($extensionista);
// die();
// $passedArgs = $this->request->getParam('pass');
// pr($passedArgs);
?>

<div class="container">
    <?php if ($this->request->getAttribute('identity')->categoria == 2): ?>
        <?= $this->Html->link(__('Inserir ação de extensão'), ['action' => 'add?estudante=' . $this->request->getAttribute('identity')->estudante_id], ['class' => 'btn btn-success float-right']) ?>
    <?php elseif ($this->request->getAttribute('identity')->categoria == 1): ?>
        <?= $this->Html->link(__('Inserir ação de extensão'), ['action' => 'add?estudante=' . $id], ['class' => 'btn btn-success float-right']) ?>
    <?php endif; ?>
</div>

<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Listar'), ['action' => 'index'], ['class' => 'nav-link']) ?>
            <?= $this->Html->link(__('Estudante'), ['controller' => 'estudantes', 'action' => 'view', $this->getRequest()->getQuery('estudante')], ['class' => 'nav-link']) ?>
        </div>
    </aside>
</div>

<div class='row'>
    <div class="container justify-content-left">
        <div class="col-auto">
            <table aria-describedby="Extensionistas" class="table table-hover table-responsive table-striped">
                <tr>
                    <th><?= $this->Paginator->sort('Extensionistas.id', 'Id') ?></th>
                    <th><?= $this->Paginator->sort('Estudantes.nome', 'Estudante') ?></th>
                    <th><?= $this->Paginator->sort('Extensoes.titulo', 'Extensão') ?></th>
                    <th><?= $this->Paginator->sort('Extensionistas.cargahoraria', 'Carga horária') ?></th>
                    <th><?= $this->Paginator->sort('Extensionistas.ano', 'Ano') ?></th>
                </tr>
                <?php foreach ($extensionista as $c_extensionista): ?>
                    <?php // pr($c_extensionista) ?>
                    <td><?= $this->Number->format($c_extensionista->id, ['pattern' => '####']) ?></td>
                    <td><?= $c_extensionista->has('estudante') && !empty($c_extensionista->estudante->nome) ? $this->Html->link($c_extensionista->estudante->nome, ['controller' => 'Estudantes', 'action' => 'view', $c_extensionista->estudante->id]) : ($c_extensionista->has('estudante') ? h($c_extensionista->estudante->nome ?? '') : '') ?></td>
                    <td><?= $c_extensionista->has('extensao') && !empty($c_extensionista->extensao->titulo) ? $this->Html->link($c_extensionista->extensao->titulo, ['controller' => 'Extensoes', 'action' => 'view', $c_extensionista->extensao->id]) : ($c_extensionista->has('extensao') ? h($c_extensionista->extensao->titulo ?? '') : '') ?></td>
                    <td><?= h($c_extensionista->cargahoraria ?? '') ?></td>
                    <td><?= h($c_extensionista->ano ?? '') ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
