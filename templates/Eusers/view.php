<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Euser $euser
 */
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $euser->id], ['class' => 'nav-link']) ?>
            <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $euser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $euser->id), 'class' => 'nav-link']) ?>
            <?= $this->Html->link(__('Listar'), ['action' => 'index'], ['class' => 'nav-link']) ?>
            <?= $this->Html->link(__('Novo'), ['action' => 'add'], ['class' => 'nav-link']) ?>
        </div>
    </aside>
</div>

<div class='row'>
    <div class="container justify-content-left">
        <div class="col-auto">
            <h3><?= h($euser->email) ?></h3>
            <table class='table table-hover table-striped table-responsive'>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($euser->id, ['pattern' => '#####']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Registro') ?></th>
                    <td><?= $this->Number->format($euser->registro, ['pattern' => '#########']) ?></td>
                </tr>
                <tr>
                    <th><?= __('E-mail') ?></th>
                    <td><?= h($euser->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Criado') ?></th>
                    <td><?= h($euser->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificado') ?></th>
                    <td><?= h($euser->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
