<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo $this->Form->create('Estado', array('url' => array('controller' => 'estados', 'action' => 'add')));
echo $this->Form->input('nome', array('label'=>'Nome:'));
echo $this->Form->input('uf', array('label'=>'UF:'));
echo $this->Form->input('id_paises', array('options'=> array($paises), 'label'=>'País:'));
echo $this->Form->submit();
echo $this->Form->end();


?>
