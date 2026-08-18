<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tae[]|\Cake\Collection\CollectionInterface $taes
 */
$user = $this->request->getAttribute('identity');
if (!isset($user)):
    echo "Usuário não logado" . "<br>";
    header("Location:" . $this->Url->build(['controller' => 'Eusers', 'action' => 'login']));
    die();
endif;
?>

<div class="container">
    <?php if ($user->categoria == 1): ?>
        <?= $this->Html->link(__('Inserir Tae'), ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
    <?php endif; ?>
    <h3><?= __('Taes') ?></h3>
    <div class="table-responsive">
        <table class="table table-responsive table-hover">
            <thead class="thead-light">
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <?php if ($user->categoria == 1): ?>
                        <th><?= $this->Paginator->sort('siape') ?></th>
                    <?php endif; ?>
                    <th><?= $this->Paginator->sort('nome') ?></th>
                    <?php if ($user->categoria == 1): ?>
                        <th class="actions"><?= __('Ações') ?></th>
                    <?php endif; ?>
            </thead>
            <tbody>
                <?php foreach ($taes as $tae): ?>
                    <tr>
                        <td><?= $this->Number->format($tae->id, ['pattern' => '####']) ?></td>
                        <?php if ($user->categoria == 1): ?>
                            <td><?= $this->Number->format($tae->siape, ['pattern' => '######']) ?></td>
                        <?php endif; ?>
                        <td><?= h($tae->nome) ?></td>
                        <?php if ($user->categoria == 1): ?>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $tae->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $tae->id]) ?>
                                <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $tae->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tae->id)]) ?>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->element('templates'); ?>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
            <?= $this->Paginator->prev('< ' . __('posterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('próximo') . ' >') ?>
            <?= $this->Paginator->last(__('último') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
