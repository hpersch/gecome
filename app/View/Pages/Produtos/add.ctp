<?php

/**
 * @author evandro bolzan <ebolzan@inf.ufsm.br>
 */

echo $this->Form->create('Produto', array('url' => array('controller' => 'produtos', 'action' => 'add')));
echo $this->Form->input('codigo', array('label'=>'Código:'));
echo $this->Form->input('nome', array('label'=>'Nome:'));
echo $this->Form->input('descricao', array('label'=>'Descrição:', 'type'=> 'textarea'));
echo $this->Form->input('preco', array('label'=>'Preço:'));
echo $this->Form->input('quantidade', array('label'=>'Quantidade:'));
echo $this->Form->input('promocao', array('label'=>'Promoção:'));
echo $this->Form->input('data_cadastro', array('label'=>'Data cadastro:', 'type'=>'date', 'dateFormat' => 'DMY'));
echo $this->Form->input('id_sub_departamentos', array('options'=> array($subdepartamentos),  'style'=>'width:100px;', 'label'=>'Subdepartamento:'));
echo $this->Form->input('id_marcas', array('options'=> array($marcas), 'length'=>'80','label'=>'Marca:'));
echo $this->Form->submit('Salvar');
echo $this->Form->end();
?>
