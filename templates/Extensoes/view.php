<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Extensao $extensao
 */
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Listar'), ['action' => 'index'], ['class' => 'nav-link']) ?>
            <?= $this->Html->link(__('Inserir'), ['action' => 'add'], ['class' => 'nav-link']) ?>
            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $extensao->id], ['class' => 'nav-link']) ?>
            <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $extensao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $extensao->id), 'class' => 'nav-link']) ?>
        </div>
    </aside>
</div>

<div class="row">
    <div class="container justify-content-left">
        <div class='col-auto'>
            <h3><?= h($extensao->titulo) ?></h3>
            <table aria-describedby='Atividade de extensão' class='table table-responsive table-hover'>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($extensao->id, ['pattern' => '#####']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Título') ?></th>
                    <td><?= h($extensao->titulo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Coordenação') ?></th>
                    <td><?= h($extensao->coordenacao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Universidade') ?></th>
                    <td><?= h($extensao->universidade->universidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Unidade') ?></th>
                    <td><?= h($extensao->unidade) ?></td>
                </tr>
                <tr>
                    <th><?= __('Extensão da ESS') ?></th>
                    <td><?= $extensao->has('essextensao') ? $this->Html->link($extensao->essextensao->titulo, ['controller' => 'Essextensoes', 'action' => 'view', $extensao->essextensao->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Observações') ?></th>
                    <td><?= h($extensao->observacoes) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Extensionistas') ?></h4>
                <?php if (!empty($extensao->extensionistas)) : ?>
                    <div class="table-responsive">
                        <table aria-describedby='Extensionistas da atividade de extensão' class='table table-responsive table-hover'>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Estudante') ?></th>
                                <th><?= __('Carga horaria') ?></th>
                                <th><?= __('Ano') ?></th>
                            </tr>
                            <?php foreach ($extensao->extensionistas as $extensionistas) : ?>
                                <tr>
                                    <td><?= h($extensionistas->id) ?></td>
                                    <td><?= $this->Html->link($extensionistas->estudante->nome, ['controller' => 'Estudantes', 'action' => 'view', $extensionistas->estudante->id]) ?></td>
                                    <td><?= h($extensionistas->cargahoraria) ?></td>
                                    <td><?= h($extensionistas->ano) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
