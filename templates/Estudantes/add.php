<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estudante $estudante
 */
?>
<div class="row">
    <aside class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">
            <?= $this->Html->link(__('Listar estudantes'), ['action' => 'index'], ['class' => 'nav-link']) ?>
        </div>
    </aside>
</div>
<div class="row">
    <div class="container justify-content-left">
        <div class="col-auto">
            <?= $this->element('templates'); ?>
            <?= $this->Form->create($estudante) ?>
            <fieldset>
                <legend><?= __('Inserir estudante') ?></legend>
                <?php
                if (isset($registro) && !empty($registro)):
                    echo $this->Form->control('registro', ['value' => $registro, 'readonly']);
                else:
                    echo $this->Form->control('registro');
                endif;
                echo $this->Form->control('nome');
                echo $this->Form->control('nascimento', ['empty' => true]);
                echo $this->Form->control('cpf', ['label' => ['text' => 'CPF'], 'placeholder' => '_________-__','pattern' => '\d{9}-\d{2}']);
                echo $this->Form->control('identidade');
                echo $this->Form->control('orgao', ['label' => ['text' => 'Orgão']]);
                if ($estudante->registro):
                    echo $this->Form->control('ingresso', ['pattern' => '20' . substr($estudante->registro, 1, 2) . '-[1-2]', 'label' => "Digite o período de ingresso no formato nnnn-n", 'placeholder' => '____-_']);
                else:
                    echo $this->Form->control('ingresso', ['pattern' => '\d{4}-[1-2]', 'label' => "Digite o período de ingresso no formato nnnn-n", 'placeholder' => '____-_']);
                endif;
                echo $this->Form->control('turno', ['options' => ['diurno' => 'Diurno', 'noturno' => 'Noturno']]);
                echo $this->Form->control('codigo_telefone', ['label' => ['text' => 'DDD']]);
                echo $this->Form->control('telefone');
                echo $this->Form->control('codigo_celular', ['label' => ['text' => 'DDD']]);
                echo $this->Form->control('celular');
                echo $this->Form->control('email');
                echo $this->Form->control('cep', ['label' => ['text' => 'CEP']]);
                echo $this->Form->control('endereco', ['label' => ['text' => 'Endereço']]);
                echo $this->Form->control('municipio');
                echo $this->Form->control('bairro');
                echo $this->Form->control('observacoes', ['label' => ['text' => 'Observações']]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success position-static']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
