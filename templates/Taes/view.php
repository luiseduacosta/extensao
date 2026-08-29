<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tae $tae
 */
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Editar Tae'), ['action' => 'edit', $tae->id], ['class' => 'nav-link']) ?>
            <?= $this->Form->postLink(__('Excluir Tae'), ['action' => 'delete', $tae->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tae->id), 'class' => 'nav-link']) ?>
            <?= $this->Html->link(__('Listar Taes'), ['action' => 'index'], ['class' => 'nav-link']) ?>
            <?= $this->Html->link(__('Inserir Tae'), ['action' => 'add'], ['class' => 'nav-link']) ?>
        </div>
    </aside>
    <div class="container justify-content-left">
        <div class="col-auto">
            <h3><?= h($tae->nome) ?></h3>
            <table class='table table-responsive table-hover'>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($tae->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($tae->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Siape') ?></th>
                    <td><?= $this->Number->format($tae->siape) ?></td>
                </tr>
            </table>

            <div class="related">
                <h4><?= __('Atividades de extensão') ?></h4>
                <?php if (!empty($tae->extensoes)) : ?>
                    <div class="table-responsive">
                        <table class="table table-responsive table-hover">
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Titulo') ?></th>
                                <th><?= __('Professor') ?></th>
                                <th><?= __('Tae') ?></th>
                                <th><?= __('Segmento') ?></th>
                                <th><?= __('Segmento Id') ?></th>
                                <th><?= __('Nome') ?></th>
                                <th><?= __('Data congregação') ?></th>
                                <th><?= __('Situação PR5') ?></th>
                                <th><?= __('Versão') ?></th>
                                <th><?= __('Observações') ?></th>
                                <th class="actions"><?= __('Ações') ?></th>
                            </tr>
                            <?php foreach ($tae->extensoes as $extensoes) : ?>
                                <tr>
                                    <td><?= h($extensoes->id) ?></td>
                                    <td><?= h($extensoes->titulo) ?></td>
                                    <td><?= h($extensoes->docente_id) ?></td>
                                    <td><?= h($extensoes->tae_id) ?></td>
                                    <td><?= h($extensoes->segmento) ?></td>
                                    <td><?= h($extensoes->segmento_id) ?></td>
                                    <td><?= h($extensoes->nome) ?></td>
                                    <td><?= h($extensoes->datacongregacao) ?></td>
                                    <td><?= h($extensoes->situacaopr5_id) ?></td>
                                    <td><?= h($extensoes->versao) ?></td>
                                    <td><?= h($extensoes->observacoes) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('Ver'), ['controller' => 'Extensoes', 'action' => 'view', $extensoes->id]) ?>
                                        <?= $this->Html->link(__('Editar'), ['controller' => 'Extensoes', 'action' => 'edit', $extensoes->id]) ?>
                                        <?= $this->Form->postLink(__('Excluir'), ['controller' => 'Extensoes', 'action' => 'delete', $extensoes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $extensoes->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
