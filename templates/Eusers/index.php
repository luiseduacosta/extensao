<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Euser[]|\Cake\Collection\CollectionInterface $eusers
 */
$user = $this->request->getAttribute('identity');
if (!isset($user)):
    echo "Usuário não logado" . "<br>";
    header("Location:" . $this->Url->build(['controller' => 'Eusers', 'action' => 'login']));
    die();
endif;
?>

<div class="container">
    <?= $this->Html->link(__('Nuevo usuário'), ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
    <h3><?= __('Usuários') ?></h3>
    <div class="table-responsive">
        <table class="table table-responsive table-hover">
            <thead class='thead-light'>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'Id') ?></th>
                    <th><?= $this->Paginator->sort('registro', 'Registro') ?></th>
                    <th><?= $this->Paginator->sort('email', 'E-mail') ?></th>
                    <th><?= $this->Paginator->sort('estudante->nome', 'Estudante') ?></th>
                    <th><?= $this->Paginator->sort('created', 'Criado') ?></th>
                    <th><?= $this->Paginator->sort('modified', 'Modificado') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($eusers as $euser): ?>
                    <tr>
                        <td><?= $this->Number->format($euser->id, ['pattern' => '#####']) ?></td>
                        <td><?= $this->Number->format($euser->registro, ['pattern' => '#########']) ?></td>
                        <td><?= $this->Html->link(h($euser->email), ['action' => 'view', $euser->id]) ?></td>
                        <td><?= $this->Html->link(h($euser->estudante->nome), ['controller' => 'estudantes', 'action' => 'view', $euser->estudante->id]) ?></td>
                        <td><?= h($euser->created) ?></td>
                        <td><?= h($euser->modified) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element('templates'); ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
