<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 
        
echo $this->Form->create('Endereco', array('url' => array('controller' => 'enderecos', 'action' => 'fimCadastroPessoa')));
echo "<label>Nome</label>";
echo $this->Form->input('nome', array('label'=>''));
echo "<label>CEP</label>";
echo $this->Form->input('cep', array('label'=>''));
echo "<label>Tipo</label>";
echo $this->Form->input('tipo', array(
    'type'=>'select',
    'label'=> '',
    'options' => array(
     '0' =>'Apartamento',
     '1' =>'Casa',
     '2' =>'Comercial',
     '3' => 'outro'
 )));
echo "<label>Rua</label>";
echo $this->Form->input('rua', array('label'=>''));
echo "<label>Numero</label>";
echo $this->Form->input('numero', array('label'=>''));
echo "<label>Complemento</label>";
echo $this->Form->input('complemento', array('label'=>''));
echo "<label>Descrição</label>";
echo $this->Form->input('descricao', array('label'=>''));
echo "<label>Bairro</label>";
echo $this->Form->input('bairro', array('label'=>''));
echo "<label>Cidade</label>";
echo $this->Form->input('cidade', array('label'=>''));
echo "<label>Estado</label>";
echo $this->Form->input('estado_id', array('label'=>'', 'options' => $estados));

$fisico = 1;
echo $this->element('home/cad_telefones', array('fisico'=> 1));

//echo $this->Form->submit('Salvar');
echo $this->Form->submit('Finalizar');
echo $this->Form->end();

?>
