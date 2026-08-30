<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Docente $docente
 */
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $docente->id], ['class' => 'nav-link text-secondary']) ?>
            <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $docente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $docente->id), 'class' => 'nav-link text-secondary']) ?>
            <?= $this->Html->link(__('Listar'), ['action' => 'index'], ['class' => 'nav-link text-secondary']) ?>
            <?= $this->Html->link(__('Inserir'), ['action' => 'add'], ['class' => 'nav-link text-secondary']) ?>
        </div>
    </aside>
</div>
<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <h3><?= h($docente->nome) ?></h3>
            <table class="table table-hover table-striped table-responsive">
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($docente->id) ?></td>
                </tr>                
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($docente->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sexo') ?></th>
                    <td><?= h($docente->sexo) ?></td>
                </tr>
                <tr>
                    <th><?= __('CPF') ?></th>
                    <td><?= h($docente->cpf) ?></td>
                </tr>
                <tr>
                    <th><?= __('Siape') ?></th>
                    <td><?= $docente->siape === null ? '' : $this->Number->format($docente->siape) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data de nascimento') ?></th>
                    <td><?= h($docente->datanascimento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Local de nascimento') ?></th>
                    <td><?= h($docente->localnascimento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Formação profissional') ?></th>
                    <td><?= h($docente->formacaoprofissional) ?></td>
                </tr>
                <tr>
                    <th><?= __('Universidade de graduação') ?></th>
                    <td><?= h($docente->universidadedegraduacao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ano de formação') ?></th>
                    <td><?= $docente->anoformacao === null ? '' : $this->Number->format($docente->anoformacao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mestrado area') ?></th>
                    <td><?= h($docente->mestradoarea) ?></td>
                </tr>
                <tr>
                    <th><?= __('Mestrado universidade') ?></th>
                    <td><?= h($docente->mestradouniversidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ano de conclusão mestrado') ?></th>
                    <td><?= $docente->mestradoanoconclusao === null ? '' : $this->Number->format($docente->mestradoanoconclusao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Doutorado area') ?></th>
                    <td><?= h($docente->doutoradoarea) ?></td>
                </tr>
                <tr>
                    <th><?= __('Doutorado universidade') ?></th>
                    <td><?= h($docente->doutoradouniversidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ano conclusão doutorado ') ?></th>
                    <td><?= $docente->doutoradoanoconclusao === null ? '' : $this->Number->format($docente->doutoradoanoconclusao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data de ingresso') ?></th>
                    <td><?= h($docente->dataingresso) ?></td>
                </tr>
                <tr>
                    <th><?= __('Forma de ingresso') ?></th>
                    <td><?= h($docente->formaingresso) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipo de cargo') ?></th>
                    <td><?= h($docente->tipocargo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Categoria') ?></th>
                    <td><?= h($docente->categoria) ?></td>
                </tr>
                <tr>
                    <th><?= __('Regime de trabalho') ?></th>
                    <td><?= h($docente->regimetrabalho) ?></td>
                </tr>
                <tr>
                    <th><?= __('Departamento') ?></th>
                    <td><?= h($docente->departamento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($docente->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estagiários (Quantidade)') ?></th>
                    <td><?= $docente->estagiarios_count !== null ? $this->Number->format($docente->estagiarios_count) : '0' ?></td>
                </tr>
                <tr>
                    <th><?= __('Atualização Lattes') ?></th>
                    <td><?= h($docente->atualizacaolattes) ?></td>
                </tr>
                <tr>
                    <th><?= __('DDD') ?></th>
                    <td><?= h($docente->ddd_telefone) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefone') ?></th>
                    <td><?= h($docente->telefone) ?></td>
                </tr>
                <tr>
                    <th><?= __('DDD') ?></th>
                    <td><?= h($docente->ddd_celular) ?></td>
                </tr>
                <tr>
                    <th><?= __('Celular') ?></th>
                    <td><?= h($docente->celular) ?></td>
                </tr>
                <tr>
                    <th><?= __('E-mail') ?></th>
                    <td><?= h($docente->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Home page') ?></th>
                    <td><?= h($docente->homepage) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rede social') ?></th>
                    <td><?= h($docente->redesocial) ?></td>
                </tr>
                <tr>
                    <th><?= __('Curriculo lattes') ?></th>
                    <td><?= h($docente->curriculolattes) ?></td>
                </tr>
                <tr>
                    <th><?= __('Curriculo sigma') ?></th>
                    <td><?= h($docente->curriculosigma) ?></td>
                </tr>
                <tr>
                    <th><?= __('Pesquisador Dgp') ?></th>
                    <td><?= h($docente->pesquisadordgp) ?></td>
                </tr>

                <tr>
                    <th><?= __('Motivo de egresso') ?></th>
                    <td><?= h($docente->motivoegresso) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data de egresso') ?></th>
                    <td><?= h($docente->dataegresso) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Observações') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($docente->observacoes)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Atividades de extensão') ?></h4>
                <?php if (!empty($docente->extensoes)) : ?>
                    <div>
                        <table class="table table-hover table-striped table-responsive">
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Titulo') ?></th>
                                <th><?= __('Docente') ?></th>
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
                            <?php foreach ($docente->extensoes as $extensoes) : ?>
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
                                        <?= $this->Html->link(__('Ver'), ['controller' => 'Extensoes', 'action' => 'view', $extensoes->id], ['class' => 'text-secondary']) ?>
                                        <?= $this->Html->link(__('Editar'), ['controller' => 'Extensoes', 'action' => 'edit', $extensoes->id], ['class' => 'text-secondary']) ?>
                                        <?= $this->Form->postLink(__('Excluir'), ['controller' => 'Extensoes', 'action' => 'delete', $extensoes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $extensoes->id)], ['class' => 'text-secondary']) ?>
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
