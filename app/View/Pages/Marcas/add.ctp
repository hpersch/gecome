<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo $this->Form->create('Marca', array('url' => array('controller' => 'marcas', 'action' => 'add')));
echo $this->Form->input('nome', array('label'=>'Nome:'));
echo $this->Form->submit('Salvar');
echo $this->Form->end();


?>
