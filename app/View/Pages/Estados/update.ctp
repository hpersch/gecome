<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo $this->Form->create('Estado');
echo $this->Form->input('nome', array('label'=> 'NOME:'));
echo $this->Form->input('uf', array('label'=> 'UF:'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->end('Salvar');

?>
