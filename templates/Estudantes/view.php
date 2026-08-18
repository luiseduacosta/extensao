<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estudante $estudante
 */
?>
<div class="container">
    <?php if ($this->request->getAttribute('identity')->categoria == 2): ?>
        <?= $this->Html->link(__('Cadastrar atividade de extensão'), ['controller' => 'extensionistas', 'action' => 'view?estudante=' . $this->request->getAttribute('identity')->estudante_id], ['class' => 'btn btn-success float-right']) ?>
    <?php elseif ($this->request->getAttribute('identity')->categoria == 1): ?>
        <?= $this->Html->link(__('Cadastrar atividade de extensão'), ['controller' => 'extensionistas', 'action' => 'view?estudante=' . $estudante->id], ['class' => 'btn btn-success float-right']) ?>
    <?php endif; ?>
</div>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class='collapse navbar-collapse'>
            <?php if ($this->request->getAttribute('identity')->categoria == 1): ?>
                <?= $this->Html->link(__('Listar estudantes'), ['action' => 'index'], ['class' => 'nav-link']) ?>
            <?php endif; ?>
            <?= $this->Html->link(__('Editar estudante'), ['action' => 'edit', $estudante->id], ['class' => 'nav-link']) ?>
            <?php if ($this->request->getAttribute('identity')->categoria == 1): ?>
                <?= $this->Html->link(__('Inserir estudante'), ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
            <?php endif; ?>
        </div>
    </aside>
</div>

<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <h3>
                <?= h($estudante->nome) ?>
            </h3>
            <table aria-describedby="Dados do estudante" class="table table-hover table-striped table-responsive">
                <caption>Dados do estudante</caption>
                <tr>
                    <th>
                        <?= __('Id') ?>
                    </th>
                    <td>
                        <?= $this->Number->format($estudante->id, ['pattern' => '#####']) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('Registro') ?>
                    </th>
                    <td>
                        <?= $this->Number->format($estudante->registro, ['pattern' => '#########']) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('Nome') ?>
                    </th>
                    <td>
                        <?= h($estudante->nome) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('Nascimento') ?>
                    </th>
                    <td>
                        <?= h($estudante->nascimento) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('CPF') ?>
                    </th>
                    <td>
                        <?= h($estudante->cpf) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('Identidade') ?>
                    </th>
                    <td>
                        <?= h($estudante->identidade) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('Orgão') ?>
                    </th>
                    <td>
                        <?= h($estudante->orgao) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('Ingresso') ?>
                    </th>
                    <td>
                        <?= h($estudante->ingresso) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('Turno') ?>
                    </th>
                    <td>
                        <?= h($estudante->turno) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('DDD') ?>
                    </th>
                    <td>
                        <?= $this->Number->format($estudante->codigo_telefone, ['pattern' => '###']) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('Telefone') ?>
                    </th>
                    <td>
                        <?= h($estudante->telefone) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('DDD') ?>
                    </th>
                    <td>
                        <?= $this->Number->format($estudante->codigo_celular, ['pattern' => '###']) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('Celular') ?>
                    </th>
                    <td>
                        <?= h($estudante->celular) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('E-mail') ?>
                    </th>
                    <td>
                        <?= h($estudante->email) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('CEP') ?>
                    </th>
                    <td>
                        <?= h($estudante->cep) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('Endereço') ?>
                    </th>
                    <td>
                        <?= h($estudante->endereco) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('Município') ?>
                    </th>
                    <td>
                        <?= h($estudante->municipio) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('Bairro') ?>
                    </th>
                    <td>
                        <?= h($estudante->bairro) ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <?= __('Observações') ?>
                    </th>
                    <td>
                        <?= h($estudante->observacoes) ?>
                    </td>
                </tr>
            </table>
            <div class="related">
                <h4>
                    <?= __('Atividades de extensão') ?>
                </h4>
                <?php if (!empty($estudante->extensionistas)): ?>
                    <table aria-describedby="Extensões realizadas ou em curso" class='table table-responsive table-hover'>
                        <tr>
                            <th>
                                <?= __('Id') ?>
                            </th>
                            <th>
                                <?= __('Extensão') ?>
                            </th>
                            <th>
                                <?= __('Carga horária') ?>
                            </th>
                            <th>
                                <?= __('Ano') ?>
                            </th>
                            <th class="actions">
                                <?= __('Ações') ?>
                            </th>
                        </tr>
                        <?php foreach ($estudante->extensionistas as $extensionistas): ?>
                            <tr>
                                <td>
                                    <?= h($extensionistas->id) ?>
                                </td>
                                <td>
                                    <?= $extensionistas->has('extensao') ? $this->Html->link($extensionistas->extensao->titulo, ['controller' => 'Extensoes', 'action' => 'view', $extensionistas->extensao->id]) : '' ?>
                                </td>
                                <td>
                                    <?= h($extensionistas->cargahoraria) ?>
                                </td>
                                <td>
                                    <?= h($extensionistas->ano) ?>
                                </td>
                                <td class="actions">
                                    <?= $this->Html->link(__('Ver'), ['controller' => 'Extensionistas', 'action' => 'view', $extensionistas->id]) ?>
                                    <?= $this->Html->link(__('Editar'), ['controller' => 'Extensionistas', 'action' => 'edit', $extensionistas->id]) ?>
                                    <?= $this->Form->postLink(__('Excluir'), ['controller' => 'Extensionistas', 'action' => 'delete', $extensionistas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $extensionistas->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>