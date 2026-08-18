<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estudante $estudante
 */
// $user = $request->getAttribute('identity');
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Listar estudantes'), ['action' => 'index'], ['class' => 'nav-link']) ?>
            <?php if ($this->request->getAttribute('identity')->categoria == 1): ?>
                <?=
                $this->Form->postLink(
                        __('Excluir'),
                        ['action' => 'delete', $estudante->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $estudante->nome), 'class' => 'nav-link']
                )
                ?>
            <?php endif; ?>
        </div>
    </aside>
</div>

<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <?= $this->element('templates'); ?>
            <?= $this->Form->create($estudante) ?>
            <fieldset>
                <legend><?= __('Editar estudante') ?></legend>
                <?php
                echo $this->Form->control('registro');
                echo $this->Form->control('nome');
                echo $this->Form->control('nascimento', ['empty' => true]);
                echo $this->Form->control('cpf', ['label' => ['text' => 'CPF'], 'pattern' => '\d{9}-\d{2}', 'title' => "Digite o CPF no formato nnnnnnnnn-nn"]);
                echo $this->Form->control('identidade');
                echo $this->Form->control('orgao', ['label' => ['text' => 'Orgão']]);
                if ($estudante->registro):
                    echo $this->Form->control('ingresso', ['pattern' => '20' . substr($estudante->registro, 1, 2) . '-[1-2]', 'title' => "Digite o período de ingresso no formato nnnn-n"]);
                else:
                    echo $this->Form->control('ingresso', ['pattern' => '\d{4}-[1-2]', 'title' => "Digite o período de ingresso no formato nnnn-n"]);
                endif;
                echo $this->Form->control('turno', ['options' => ['diurno' => 'Diurno', 'noturno' => 'Noturno'], 'empty' => 'Seleciona']);
                echo $this->Form->control('codigo_telefone', ['label' => ['text' => 'DDD']]);
                echo $this->Form->control('telefone');
                echo $this->Form->control('codigo_celular', ['label' => ['text' => 'DDD']]);
                echo $this->Form->control('celular');
                echo $this->Form->control('email', ['label' => ['text' => 'E-mail']]);
                echo $this->Form->control('cep', ['label' => ['text' => 'CEP']]);
                echo $this->Form->control('endereco', ['label' => ['text' => 'Endereço']]);
                echo $this->Form->control('municipio', ['label' => ['text' => 'Município']]);
                echo $this->Form->control('bairro');
                echo $this->Form->control('observacoes', ['label' => ['text' => 'Observações']]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success position-static']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
