<?php

echo $this->Form->create('Promocao', array('url' => 
    array('controller' => 'promocoes', 'action' => 'insert')));

echo $this->Form->input('id_produto', array('value'=> $produto_id['Produto']['id'], 'type'=>'hidden'));

echo $this->Form->input('data_inicio',  array('label'=>'Data inicio:', 'type'=>'date', 'dateFormat' => 'DMY'));
echo $this->Form->input('data_fim',  array('label'=>'Data fim:', 'type'=>'date', 'dateFormat' => 'DMY', 'empty' => true));
echo $this->Form->input('ativo', array('label'=>'Ativo:'));
echo $this->Form->input('desconto', array('label'=>'Desconto:'));
echo $this->Form->input('quantidade', array('label'=>'Quantidade:'));
echo $this->Form->input('quantidade_vendida', array('label'=>'Quantidade vendida:'));

echo $this->Form->submit('Salvar');
echo $this->Form->end();




?>
