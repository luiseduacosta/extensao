<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Professor[]|\Cake\Collection\CollectionInterface $professores
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
        <?= $this->Html->link(__('Inserir'), ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
    <?php endif; ?>
    <h3><?= __('Professores') ?></h3>
    <div class="row">
        <table class="table table-responsive table-hover">
            <thead class="thead-light">
                <tr>
                    <th><?= $this->Paginator->sort('id', "<span class=text-secondary>Id</span>", ['escape' => false]) ?></th>
                    <th><?= $this->Paginator->sort('nome', '<span class = text-secondary>Nome</span>', ['escape' => false]) ?></th>
                    <?php if ($user->categoria == 1): ?>
                        <th><?= $this->Paginator->sort('cpf', ['CPF']) ?></th>
                        <th><?= $this->Paginator->sort('siape', ['Siape']) ?></th>
                        <th><?= $this->Paginator->sort('cress', ['Cress']) ?></th>
                        <th><?= $this->Paginator->sort('regiao', ['Região']) ?></th>
                        <th><?= $this->Paginator->sort('codigo_telefone', ['Cód. Telefone']) ?></th>
                        <th><?= $this->Paginator->sort('telefone') ?></th>
                        <th><?= $this->Paginator->sort('codigo_celular', ['Cód. Celular']) ?></th>
                        <th><?= $this->Paginator->sort('celular') ?></th>
                        <th><?= $this->Paginator->sort('email') ?></th>
                        <th><?= $this->Paginator->sort('curriculolattes', ['Currículo lattes']) ?></th>
                        <th><?= $this->Paginator->sort('atualizacaolattes', ['Atualização lattes']) ?></th>
                        <th><?= $this->Paginator->sort('dataingresso', ['Data de ingresso']) ?></th>
                        <th><?= $this->Paginator->sort('status', ['Status']) ?></th>
                    <?php endif; ?>
                    <th><?= $this->Paginator->sort('departamento', ['Departamento']) ?></th>
                    <th><?= $this->Paginator->sort('dataegresso', ['Data de egresso']) ?></th>
                    <th><?= $this->Paginator->sort('motivoegresso', ['Motivo de egresso']) ?></th>
                    <?php if ($user->categoria == 1): ?>
                        <th class="actions"><?= __('Ações') ?></th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($professores as $professor): ?>
                    <tr>
                        <td><?= $this->Number->format($professor->id, ['pattern' => '#####']) ?></td>
                        <?php if ($user->categoria == 1): ?>
                            <td><?= $this->Html->link(h($professor->nome), ['action' => 'view', $professor->id], ['class' => 'text-secondary']) ?></td>
                        <?php else: ?>
                            <td><?= h($professor->nome) ?></td>
                        <?php endif; ?>
                        <?php if ($user->categoria == 1): ?>
                            <td><?= h($professor->cpf) ?></td>
                            <td><?= $professor->siape === null ? '' : $this->Number->format($professor->siape) ?></td>
                            <td><?= h($professor->cress) ?></td>
                            <td><?= h($professor->regiao) ?></td>
                            <td><?= h($professor->codigo_telefone) ?></td>
                            <td><?= h($professor->telefone) ?></td>
                            <td><?= h($professor->codigo_celular) ?></td>
                            <td><?= h($professor->celular) ?></td>
                            <td><?= h($professor->email) ?></td>
                            <td><?= h($professor->curriculolattes) ?></td>
                            <td><?= h($professor->atualizacaolattes) ?></td>
                            <td><?= h($professor->dataingresso) ?></td>
                            <td><?= h($professor->status) ?></td>
                        <?php endif; ?>
                        <td><?= h($professor->departamento) ?></td>
                        <td><?= h($professor->dataegresso) ?></td>
                        <td><?= h($professor->motivoegresso) ?></td>
                        <?php if ($user->categoria == 1): ?>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $professor->id]) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $professor->id]) ?>
                                <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $professor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professor->id)]) ?>
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
