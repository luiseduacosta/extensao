<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Professor $professor
 */
$statusLabels = [
    'ativo' => __('Ativo'),
    'active' => __('Ativo'),
    'activo' => __('Ativo'),
    'aposentado' => __('Aposentado'),
    'retired' => __('Aposentado'),
    'inativo' => __('Inativo'),
    'inactive' => __('Inativo'),
    'inactivo' => __('Inativo'),
];
?>
<div class="row mb-3">
    <aside class="navbar navbar-expand-lg navbar-light bg-light col-12">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $professor->id], ['class' => 'nav-link text-secondary']) ?>
            <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $professor->id], ['confirm' => __('Tem certeza que deseja excluir # {0}?', $professor->id), 'class' => 'nav-link text-danger']) ?>
            <?= $this->Html->link(__('Listar'), ['action' => 'index'], ['class' => 'nav-link text-secondary']) ?>
            <?= $this->Html->link(__('Inserir'), ['action' => 'add'], ['class' => 'nav-link text-secondary']) ?>
        </div>
    </aside>
</div>
<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <h3><?= h($professor->nome) ?></h3>
            <table class="table table-hover table-striped table-responsive">
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($professor->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($professor->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('CPF') ?></th>
                    <td><?= h($professor->cpf) ?></td>
                </tr>
                <tr>
                    <th><?= __('Siape') ?></th>
                    <td><?= h($professor->siape) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cress') ?></th>
                    <td><?= h($professor->cress) ?></td>
                </tr>
                <tr>
                    <th><?= __('Região') ?></th>
                    <td><?= h($professor->regiao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Código Telefone') ?></th>
                    <td><?= h($professor->codigo_telefone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefone') ?></th>
                    <td><?= h($professor->telefone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Código Celular') ?></th>
                    <td><?= h($professor->codigo_celular) ?></td>
                </tr>
                <tr>
                    <th><?= __('Celular') ?></th>
                    <td><?= h($professor->celular) ?></td>
                </tr>
                <tr>
                    <th><?= __('E-mail') ?></th>
                    <td><?= h($professor->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Curriculo Lattes') ?></th>
                    <td><?= h($professor->curriculolattes) ?></td>
                </tr>
                <tr>
                    <th><?= __('Atualização Lattes') ?></th>
                    <td><?= h($professor->atualizacaolattes) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data de Ingresso') ?></th>
                    <td><?= h($professor->dataingresso) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipo de Cargo') ?></th>
                    <td><?= h($professor->tipocargo ?? '-') ?></td>
                </tr>
                <tr>
                    <th><?= __('Departamento') ?></th>
                    <td><?= h($professor->departamento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data de Egresso') ?></th>
                    <td><?= h($professor->dataegresso) ?></td>
                </tr>
                <tr>
                    <th><?= __('Motivo de Egresso') ?></th>
                    <td><?= h($professor->motivoegresso) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($statusLabels[$professor->status] ?? $professor->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Usuário Id') ?></th>
                    <td><?= $professor->user_id === null ? '' : $this->Number->format($professor->user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estagiários Count') ?></th>
                    <td><?= $professor->estagiarios_count === null ? '0' : $this->Number->format($professor->estagiarios_count) ?></td>
                </tr>
                <tr>
                    <th><?= __('Criado em') ?></th>
                    <td><?= h($professor->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modificado em') ?></th>
                    <td><?= h($professor->modified) ?></td>
                </tr>
            </table>
            <div class="text mb-4">
                <strong><?= __('Observações') ?></strong>
                <blockquote>
                    <?= $professor->observacoes ? $this->Text->autoParagraph(h($professor->observacoes)) : '-' ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Atividades de extensão') ?></h4>
                <?php if (!empty($professor->essextensoes)) : ?>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Titulo') ?></th>
                                <th><?= __('Professor') ?></th>
                                <th><?= __('Tae') ?></th>
                                <th><?= __('Segmento') ?></th>
                                <th><?= __('Nome') ?></th>
                                <th><?= __('Data congregação') ?></th>
                                <th><?= __('Situação na PR5') ?></th>
                                <th><?= __('Versão') ?></th>
                                <th><?= __('Observações') ?></th>
                                <th class="actions"><?= __('Ações') ?></th>
                            </tr>
                            <?php foreach ($professor->essextensoes as $extensoes) : ?>
                                <tr>
                                    <td><?= h($extensoes->id) ?></td>
                                    <td><?= h($extensoes->titulo) ?></td>
                                    <td><?= h($extensoes->docente_id) ?></td>
                                    <td><?= h($extensoes->tae_id) ?></td>
                                    <td><?= h($extensoes->segmento) ?></td>
                                    <td><?= h($extensoes->nome) ?></td>
                                    <td><?= h($extensoes->datacongregacao) ?></td>
                                    <td><?= h($extensoes->situacaopr5_id) ?></td>
                                    <td><?= h($extensoes->versao) ?></td>
                                    <td><?= h($extensoes->observacoes) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('Ver'), ['controller' => 'Essextensoes', 'action' => 'view', $extensoes->id], ['class' => 'btn btn-sm btn-info']) ?>
                                        <?= $this->Html->link(__('Editar'), ['controller' => 'Essextensoes', 'action' => 'edit', $extensoes->id], ['class' => 'btn btn-sm btn-warning']) ?>
                                        <?= $this->Form->postLink(__('Excluir'), ['controller' => 'Essextensoes', 'action' => 'delete', $extensoes->id], ['confirm' => __('Tem certeza que deseja excluir # {0}?', $extensoes->id), 'class' => 'btn btn-sm btn-danger']) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="text-muted"><?= __('Nenhuma atividade de extensão encontrada.') ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
