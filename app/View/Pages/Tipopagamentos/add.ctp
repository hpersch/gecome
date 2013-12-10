<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo $this->Form->create('Tipopagamento', array('action'));
echo $this->Form->input('nome', array('label'=>'Forma de pagamento'));
echo $this->Form->submit('Enviar');
echo $this->Form->end();


