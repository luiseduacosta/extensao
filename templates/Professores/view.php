<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Professor $professor
 */
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $professor->id], ['class' => 'nav-link text-secondary']) ?>
            <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $professor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professor->id), 'class' => 'nav-link text-secondary']) ?>
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
                    <td><?= $professor->siape === null ? '' : $this->Number->format($professor->siape) ?></td>
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
                    <th><?= __('Curriculo lattes') ?></th>
                    <td><?= h($professor->curriculolattes) ?></td>
                </tr>
                <tr>
                    <th><?= __('Atualização Lattes') ?></th>
                    <td><?= h($professor->atualizacaolattes) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data de ingresso') ?></th>
                    <td><?= h($professor->dataingresso) ?></td>
                </tr>
                <tr>
                    <th><?= __('Departamento') ?></th>
                    <td><?= h($professor->departamento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Motivo de egresso') ?></th>
                    <td><?= h($professor->motivoegresso) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data de egresso') ?></th>
                    <td><?= h($professor->dataegresso) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($professor->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Usuário Id') ?></th>
                    <td><?= $professor->user_id === null ? '' : $this->Number->format($professor->user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estagiários Count') ?></th>
                    <td><?= $professor->estagiario_count === null ? '' : $this->Number->format($professor->estagiario_count) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Observações') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($professor->observacoes)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Atividades de extensão') ?></h4>
                <?php if (!empty($professor->essextensoes)) : ?>
                    <div>
                        <table class="table table-hover table-striped table-responsive">
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Titulo') ?></th>
                                <th><?= __('Professor') ?></th>
                                <th><?= __('Tae') ?></th>
                                <th><?= __('Segmento') ?></th>
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
                                    <td><?= h($extensoes->segmento_id) ?></td>
                                    <td><?= h($extensoes->nome) ?></td>
                                    <td><?= h($extensoes->datacongregacao) ?></td>
                                    <td><?= h($extensoes->situacaopr5_id) ?></td>
                                    <td><?= h($extensoes->versao) ?></td>
                                    <td><?= h($extensoes->observacoes) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('Ver'), ['controller' => 'Essextensoes', 'action' => 'view', $extensoes->id], ['class' => 'text-secondary']) ?>
                                        <?= $this->Html->link(__('Editar'), ['controller' => 'Essextensoes', 'action' => 'edit', $extensoes->id], ['class' => 'text-secondary']) ?>
                                        <?= $this->Form->postLink(__('Excluir'), ['controller' => 'Essextensoes', 'action' => 'delete', $extensoes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $extensoes->id)], ['class' => 'text-secondary']) ?>
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
