<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo $this->Form->create('Especificacao', array('url' => 
    array('controller' => 'especificacoes', 'action' => 'update')));
echo $this->Form->input('valor', array('label'=>'Valor:'));
echo $this->Form->input('nome', array('label'=>'Especificação:'));
echo $this->Form->submit('Salvar');
echo $this->Form->end();

?>
