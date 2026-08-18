<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Extensao[]|\Cake\Collection\CollectionInterface $extensoes
 */
$user = $this->request->getAttribute('identity');
if (!isset($user)):
// echo "Usuário não logado" . "<br>";
// header("Location:" . $this->Url->build(['controller' => 'Eusers', 'action' => 'login']));
// die();
endif;
?>
<div class="container">
    <?php if (isset($user) && $user->categoria == 1): ?>
        <?= $this->Html->link(__('Inserir extensao da ESS'), ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
    <?php endif; ?>
    <h3><?= __('Atividades de extensão da ESS/UFRJ') ?></h3>
    <div class="table-responsive">
        <table class="table table-responsive table-hover">
            <thead class="thead-light">
                <tr>
                    <th><?= $this->Paginator->sort('Essextensoes.id', ['Id']) ?></th>
                    <th><?= $this->Paginator->sort('Essextensoes.titulo', ['Título']) ?></th>
                    <?php if (isset($user) && $user->categoria == 1): ?>
                        <th><?= $this->Paginator->sort('Docentes.nome', ['Docente']) ?></th>
                        <th><?= $this->Paginator->sort('Taes.nome', ['Tae']) ?></th>
                        <th><?= $this->Paginator->sort('Essextensoes.segmento', ['Segmento']) ?></th>
                        <th><?= $this->Paginator->sort('Essextensoes.segmento_id', ['Seg. Id']) ?></th>
                    <?php endif; ?>
                    <th><?= $this->Paginator->sort('Essextensoes.nome', ['Coordenador(a)']) ?></th>
                    <?php if (isset($user) && $user->categoria == 1): ?>
                        <th><?= $this->Paginator->sort('Essextensoes.datacongregacao', ['Data congregação']) ?></th>
                        <th><?= $this->Paginator->sort('Situacaopr5.situacao', ['Situação PR5']) ?></th>
                        <th><?= $this->Paginator->sort('Essextensoes.versao', ['Versão']) ?></th>
                        <th><?= $this->Paginator->sort('Essextensoes.observacoes', ['Observações']) ?></th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($essextensoes as $extensao): ?>
                    <tr>
                        <td><?= $this->Number->format($extensao->id, ['pattern' => '#####']) ?></td>
                        <td><?= $this->Html->link($extensao->titulo, ['action' => 'view', $extensao->id]) ?></td>

                        <?php if (isset($user)): ?>
                            <?php if ($user->categoria == 1): ?>
                                <td><?= $extensao->has('docente') ? $this->Html->link($extensao->docente->nome, ['controller' => 'Docentes', 'action' => 'view', $extensao->docente->id]) : '' ?></td>
                                <td><?= $extensao->has('tae') ? $this->Html->link($extensao->tae->nome, ['controller' => 'Taes', 'action' => 'view', $extensao->tae->id]) : '' ?></td>
                                 <td><?= h($extensao->segmento) ?></td>
                                <td><?= $this->Number->format($extensao->segmento_id, ['pattern' => '##']) ?></td>
                            <?php endif; ?>
                        <?php endif; ?>

                        <td><?= h($extensao->nome) ?></td>

                        <?php if (isset($user)): ?>
                            <?php if ($user->categoria == 1): ?>
                                <td><?= h($extensao->datacongregacao) ?></td>
                                <td><?= $extensao->has('situacaopr5') ? $extensao->situacaopr5->situacao : NULL ?></td>
                                <td><?= $extensao->versao === null ? '' : $this->Number->format($extensao->versao) ?></td>
                                <td><?= h($extensao->observacoes) ?></td>
                            <?php endif; ?>
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
        <p><?= $this->Paginator->counter(__('Página {{page}} de {{pages}}, mostra {{current}} registros(s) de um total de {{count}}')) ?></p>
    </div>
</div>
