<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo $this->Form->create('Marca');
echo $this->Form->input('nome');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');

?>
