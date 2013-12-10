<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo $this->Form->create('Endereco');
echo $this->Form->input('nome');
echo $this->Form->input('cep');
echo $this->Form->input('tipo', array('type'=>'select',
    'options' => array(
     '0' =>'Apartamento',
     '1' =>'Casa',
     '2' =>'Comercial',
     '3' => 'outro'
 )));
echo $this->Form->input('rua');
echo $this->Form->input('numero');
echo $this->Form->input('complemento');
echo $this->Form->input('descricao');
echo $this->Form->input('bairro');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');

?>
