<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Extensionista[]|\Cake\Collection\CollectionInterface $extensionistas
 */
$user = $this->request->getAttribute('identity');
if (!isset($user)):
    echo "Usuário não logado" . "<br>";
    header("Location:" . $this->Url->build(['controller' => 'Eusers', 'action' => 'login']));
    die();
endif;
?>
<div class="container">
    <?= $this->Html->link(__('Inserir extensionista em extensão'), ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
    <h3><?= __('Extensionistas') ?></h3>
    <div class="table-responsive">
        <table class="table table-responsive table-hover">
            <thead class="thead-light">
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('Estudantes.nome', ['Estudantes']) ?></th>
                    <th><?= $this->Paginator->sort('Extensoes.titulo', ['Extensão']) ?></th>
                    <th><?= $this->Paginator->sort('cargahoraria', ['Carga horária']) ?></th>
                    <th><?= $this->Paginator->sort('ano', ['Ano']) ?></th>
                    <th class="actions"><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($extensionistas as $extensionista): ?>
                    <tr>
                        <td><?= $this->Number->format($extensionista->id) ?></td>
                        <td><?= $extensionista->has('estudante') ? $this->Html->link($extensionista->estudante->nome, ['controller' => 'Estudantes', 'action' => 'view', $extensionista->estudante->id]) : '' ?></td>
                        <td><?= $extensionista->has('extensao') ? $this->Html->link($extensionista->extensao->titulo, ['controller' => 'Extensoes', 'action' => 'view', $extensionista->extensao->id]) : '' ?></td>
                        <td><?= h($extensionista->cargahoraria) ?></td>
                        <td><?= h($extensionista->ano) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Ver'), ['action' => 'view', $extensionista->id]) ?>
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $extensionista->id]) ?>
                            <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $extensionista->id], ['confirm' => __('Are you sure you want to delete # {0}?', $extensionista->id)]) ?>
                        </td>
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
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total'), ['class' => 'nav-link']) ?></p>
    </div>
</div>
