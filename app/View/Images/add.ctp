<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo $this->Form->create('Image', array('type'=> 'file'));
echo $this->Form->input('path', array('type'=>'file'));
echo $this->Form->input('principal');
echo $this->Form->submit('Enviar');
echo $this->Form->end();