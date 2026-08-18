<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Universidade $universidade
 */
// pr($universidade);
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $universidade->id], ['class' => 'nav-link']) ?>
            <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $universidade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $universidade->id), 'class' => 'nav-link']) ?>
            <?= $this->Html->link(__('Listar'), ['action' => 'index'], ['class' => 'nav-link']) ?>
            <?= $this->Html->link(__('Cadastrar'), ['action' => 'add'], ['class' => 'nav-link']) ?>
        </div>
    </aside>
</div>
<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <h3><?= h($universidade->universidade ?? '') ?></h3>
            <table aria-describedby='Universidades' class="table table-responsive table-hover">
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($universidade->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Universidade') ?></th>
                    <td><?= h($universidade->universidade ?? '') ?></td>
                </tr>
                <tr>
                    <th><?= __('Observações') ?></th>
                    <td><?= h($universidade->observacoes ?? '') ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Atividades de extensão') ?></h4>
                <?php if (!empty($universidade->extensoes)) : ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Titulo') ?></th>
                                <th><?= __('Coordenação') ?></th>
                                <th><?= __('Unidade') ?></th>
                                <th><?= __('Extensão da ESS') ?></th>
                            </tr>
                            <?php foreach ($universidade->extensoes as $extensoes) : ?>
                                <tr>
                                    <td><?= h($extensoes->id) ?></td>
                                    <td><?= $this->Html->link($extensoes->titulo ?? __('(sem título)'), ['controller' => 'extensoes', 'action' => 'view', $extensoes->id]) ?></td>
                                    <td><?= h($extensoes->coordenacao ?? '') ?></td>
                                    <td><?= h($extensoes->unidade ?? '') ?></td>
                                    <td><?= $extensoes->has('essextensao') ? h($extensoes->essextensao->titulo ?? '') : '' ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
