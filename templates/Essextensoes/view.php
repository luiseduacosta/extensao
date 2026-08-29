<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Extensao $extensao
 */
// pr($extensao);
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Listar'), ['action' => 'index'], ['class' => 'nav-link']) ?>
            <?php
            $user = $this->request->getAttribute('identity');
            if (isset($user) && $user->categoria == 1):
                ?>
                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $extensao->id], ['class' => 'nav-link']) ?>
                <?= $this->Html->link(__('Inserir'), ['action' => 'add'], ['class' => 'nav-link']) ?>
                <?= $this->Form->postLink(__('Excluir'), ['action' => 'delete', $extensao->id], ['confirm' => __('Are you sure you want to delete # {0}?', $extensao->id), 'class' => 'nav-link']) ?>
                <?php
            endif;
            ?>
        </div>
    </aside>
</div>
<div>
    <div class="container justify-content-left">
        <div class="col-auto">
            <h3><?= h($extensao->titulo ?? __('(sem título)')) ?></h3>
            <table aria-describedby='Atividades de extensão' class='table table-responsive table-hover'>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($extensao->id, ['pattern' => '####']) ?></td>
                </tr>
                <tr>
                    <th><?= __('Título') ?></th>
                    <td><?= h($extensao->titulo ?? '') ?></td>
                </tr>
                <?php if (isset($user) && $user->categoria == 1): ?>
                    <tr>
                        <th><?= __('Professor') ?></th>
                        <?php
                        if (isset($user) && $user->categoria == 1):
                            ?>
                            <td><?= $extensao->has('professor') && !empty($extensao->professor->nome) ? $this->Html->link($extensao->professor->nome, ['controller' => 'Professores', 'action' => 'view', $extensao->professor->id]) : ($extensao->has('professor') ? h($extensao->professor->nome ?? '') : '') ?></td>
                            <?php
                        else:
                            ?>
                            <td><?= $extensao->has('professor') ? h($extensao->professor->nome ?? '') : '' ?></td>
                        <?php
                        endif;
                        ?>
                    </tr>
                    <tr>
                        <th><?= __('Tae') ?></th>
                        <?php
                        if (isset($user) && $user->categoria == 1):
                            ?>
                            <td><?= $extensao->has('tae') && !empty($extensao->tae->nome) ? $this->Html->link($extensao->tae->nome, ['controller' => 'Taes', 'action' => 'view', $extensao->tae->id]) : ($extensao->has('tae') ? h($extensao->tae->nome ?? '') : '') ?></td>
                            <?php
                        else:
                            ?>
                            <td><?= $extensao->has('tae') ? h($extensao->tae->nome ?? '') : '' ?></td>
                        <?php
                        endif;
                        ?>
                    </tr>
                    <tr>
                        <th><?= __('Segmento') ?></th>
                        <td><?= h($extensao->segmento) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Segmento Id') ?></th>
                        <td><?= $this->Number->format($extensao->segmento_id, ['pattern' => '##']) ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <th><?= __('Coordenador(a)') ?></th>
                    <td><?= h($extensao->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modalidade') ?></th>
                    <td><?= h($extensao->tipo) ?></td>
                </tr>

                <?php if (isset($user) && $user->categoria == 1): ?>
                    <tr>
                        <th><?= __('Data da congregação') ?></th>
                        <td><?= h($extensao->datacongregacao) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Situação na PR5') ?></th>
                        <td><?= $extensao->has('situacaopr5') ? $extensao->situacaopr5->situacao : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Versão') ?></th>
                        <td><?= $extensao->versao === null ? '' : $this->Number->format($extensao->versao) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Observações') ?></th>
                        <td><?= h($extensao->observacoes) ?></td>
                    </tr>
                <?php endif; ?>
            </table>
            <?php if (isset($user) && $user->categoria == 1): ?>
                <div class="related">
                    <h4><?= __('Extensionistas') ?></h4>
                    <?php if (!empty($extensao->extensionistas)) : ?>
                        <div class="table-responsive">
                            <table aria-describedby='Extensionistas da atividade de extensão' class='table table-responsive table-hover'>
                                <tr>
                                    <th><?= __('Id') ?></th>
                                    <th><?= __('Alunos') ?></th>
                                    <th><?= __('Extensão') ?></th>
                                    <?php
                                    if (isset($user)):
                                        ?>
                                        <th><?= __('Carga horária') ?></th>
                                        <th><?= __('Ano') ?></th>
                                        <?php
                                    endif;
                                    ?>
                                </tr>
                                <?php foreach ($extensao->extensionistas as $extensionistas) : ?>
                                    <?php // pr($extensionistas); ?>
                                    <tr>
                                        <td><?= h($extensionistas->id) ?></td>
                                        <?php
                                        if (isset($user)):
                                            ?>
                                            <td>
                                                <?php
                                                if ($extensionistas->has('estudante') && !empty($extensionistas->estudante->nome)):
                                                    echo $this->Html->link(
                                                        h($extensionistas->estudante->nome),
                                                        ['controller' => 'Extensionistas', 'action' => 'view', $extensionistas->id]
                                                    );
                                                else:
                                                    echo h($extensionistas->has('estudante') ? ($extensionistas->estudante->nome ?? '') : '');
                                                endif;
                                                ?>
                                            </td>
                                            <?php
                                        else:
                                            ?>
                                            <td><?= h($extensionistas->has('estudante') ? ($extensionistas->estudante->nome ?? '') : '') ?></td>
                                        <?php
                                        endif;
                                        ?>
                                        <td><?= h($extensionistas->has('essextensao') ? ($extensionistas->essextensao->titulo ?? '') : '') ?></td>
                                        <?php
                                        if (isset($user)):
                                            ?>
                                            <td><?= h($extensionistas->cargahoraria) ?></td>
                                            <td><?= h($extensionistas->ano) ?></td>
                                            <?php
                                        endif;
                                        ?>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
