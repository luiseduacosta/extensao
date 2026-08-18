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
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#estudante" role="tab" aria-controls="Estudante" aria-selected="true">Estudante</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#endereco" role="tab" aria-controls="Endereço" aria-selected="false">Endereço</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="tab-content">

        <div id="estudante" class="tab-pane container fade show active">
            <?= $this->Html->link(__('Inserir'), ['action' => 'add'], ['class' => 'btn btn-success float-right']) ?>
            <h3><?= __('Estudantes') ?></h3>
            <div class="table-responsive">
                <table class="table table-responsive table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('registro', ['Registro']) ?></th>
                            <th><?= $this->Paginator->sort('nome', ['Nome']) ?></th>
                            <th><?= $this->Paginator->sort('nascimento', ['Nascimento']) ?></th>
                            <th><?= $this->Paginator->sort('cpf', ['CPF']) ?></th>
                            <th><?= $this->Paginator->sort('identidade', ['Identidade']) ?></th>
                            <th><?= $this->Paginator->sort('orgao', ['Orgão']) ?></th>
                            <th><?= $this->Paginator->sort('ingresso', ['Ingresso']) ?></th>
                            <th><?= $this->Paginator->sort('turno', ['Turno']) ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($estudantes as $estudante): ?>
                            <tr>
                                <td><?= $this->Number->format($estudante->id, ['pattern' => '#####']) ?></td>
                                <td><?= $this->Number->format($estudante->registro, ['pattern' => '#########']) ?></td>
                                <td><?= $this->Html->link(h($estudante->nome), ['action' => 'view', $estudante->id]) ?></td>
                                <td><?= h($estudante->nascimento) ?></td>
                                <td><?= h($estudante->cpf) ?></td>
                                <td><?= h($estudante->identidade) ?></td>
                                <td><?= h($estudante->orgao) ?></td>
                                <td><?= h($estudante->ingresso) ?></td>
                                <td><?= h($estudante->turno) ?></td>
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
                <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
            </div>
        </div>

        <div id="endereco" class="tab-pane container fade">
            <h3><?= __('Estudantes') ?></h3>
            <div class="table-responsive">
                <table class="table table-responsive table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th><?= $this->Paginator->sort('telefone') ?></th>
                            <th><?= $this->Paginator->sort('celular') ?></th>
                            <th><?= $this->Paginator->sort('email', ['E-mail']) ?></th>
                            <th><?= $this->Paginator->sort('cep', ['CEP']) ?></th>
                            <th><?= $this->Paginator->sort('endereco', ['Endereço']) ?></th>
                            <th><?= $this->Paginator->sort('municipio', ['Município']) ?></th>
                            <th><?= $this->Paginator->sort('bairro') ?></th>
                            <th><?= $this->Paginator->sort('observacoes', ['Observações']) ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($estudantes as $estudante): ?>
                            <tr>
                                <td><?= '(' . $this->Number->format($estudante->codigo_telefone) . ')' . $estudante->telefone ?></td>
                                <td><?= '(' . $this->Number->format($estudante->codigo_celular) . ')' . h($estudante->celular) ?></td>
                                <td><?= h($estudante->email) ?></td>
                                <td><?= h($estudante->cep) ?></td>
                                <td><?= h($estudante->endereco) ?></td>
                                <td><?= h($estudante->municipio) ?></td>
                                <td><?= h($estudante->bairro) ?></td>
                                <td><?= h($estudante->observacoes) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('primeiro')) ?>
                    <?= $this->Paginator->prev('< ' . __('posterior')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('próximo') . ' >', ['class' => 'page-link']) ?>
                    <?= $this->Paginator->last(__('último') . ' >>', ['class' => 'page-link']) ?>
                </ul>
                <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
            </div>
        </div>

    </div>
</div>