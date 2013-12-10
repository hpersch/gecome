<?php

/*
 * view update de promocao
 */

echo $this->Form->create('Promocao', array('url' => 
    array('controller' => 'promocoes', 'action' => 'update')));

echo $this->Form->input('data_inicio', array('label'=>'Data inicio:'));
echo $this->Form->input('data_fim', array('label'=>'Data Fim:'));
echo $this->Form->input('ativo', array('label'=>'Ativo:'));
echo $this->Form->input('desconto', array('label'=>'Desconto:'));
echo $this->Form->input('quantidade', array('label'=>'Quantidade:'));
echo $this->Form->input('quantidade_vendida', array('label'=>'Quantidade vendida:'));

echo $this->Form->submit('Salvar');
echo $this->Form->end();
?>
