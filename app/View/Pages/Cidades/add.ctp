<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo $this->Form->create('Cidade', array('url' => array('controller' => 'cidades', 'action' => 'add')));
echo $this->Form->input('nome', array('label'=>'Nome:'));
echo $this->Form->input('id_estado', array('options'=> array($estados), 'label'=>'Cidade:'));
echo $this->Form->submit('Salvar');
echo $this->Form->end();


?>
