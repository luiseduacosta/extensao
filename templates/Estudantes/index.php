<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estudante[]|\Cake\Collection\CollectionInterface $estudantes
 */
$user = $this->request->getAttribute('identity');
if (!isset($user)):
    echo "Usuário não logado" . "<br>";
    header("Location:" . $this->Url->build(['controller' => 'Eusers', 'action' => 'login']));
    die();
endif;
?>

<div class="row">
    <div class="container">
        <?= $this->Html->link(__('Inserir'), ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
        <h3>
            <?= __('Estudantes') ?>
        </h3>
        <div class="table-responsive">
            <table class="table table-responsive table-hover">
                <caption>Tabela estudantes</caption>
                <thead class="thead-light">
                    <tr>
                        <th>
                            <?= $this->Paginator->sort('id') ?>
                        </th>
                        <th>
                            <?= $this->Paginator->sort('registro', ['Registro']) ?>
                        </th>
                        <th>
                            <?= $this->Paginator->sort('nome', ['Nome']) ?>
                        </th>
                        <th>
                            <?= $this->Paginator->sort('nascimento', ['Nascimento']) ?>
                        </th>
                        <th>
                            <?= $this->Paginator->sort('cpf', ['CPF']) ?>
                        </th>
                        <th>
                            <?= $this->Paginator->sort('identidade', ['Identidade']) ?>
                        </th>
                        <th>
                            <?= $this->Paginator->sort('orgao', ['Orgão']) ?>
                        </th>
                        <th>
                            <?= $this->Paginator->sort('ingresso', ['Ingresso']) ?>
                        </th>
                        <th>
                            <?= $this->Paginator->sort('turno', ['Turno']) ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($estudantes as $estudante): ?>

                        <tr>
                            <td>
                                <?= $this->Number->format($estudante->id, ['pattern' => '#####']) ?>
                            </td>
                            <td>
                                <?= $this->Number->format($estudante->registro, ['pattern' => '#########']) ?>
                            </td>
                            <td>
                                <?= $this->Html->link(h($estudante->nome), ['action' => 'view', $estudante->id]) ?>
                            </td>
                            <td>
                                <?= h($estudante->nascimento) ?>
                            </td>
                            <td>
                                <?= h($estudante->cpf) ?>
                            </td>
                            <td>
                                <?= h($estudante->identidade) ?>
                            </td>
                            <td>
                                <?= h($estudante->orgao) ?>
                            </td>
                            <td>
                                <?= h($estudante->ingresso) ?>
                            </td>
                            <td>
                                <?= h($estudante->turno) ?>
                            </td>
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
            <p>
                <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
            </p>
        </div>
    </div>
</div>