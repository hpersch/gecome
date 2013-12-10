<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo $merda;
echo $this->Html->link('Departamentos', array('controller' => 'departamentos', 'action' => 'view')) . '|';
echo $this->Html->link('Subdepartamentos', array('controller' => 'subDepartamentos', 'action' => 'view')) . '|';
echo $this->Html->link('Marcas', array('controller' => 'marcas', 'action' => 'view')) . '|';
echo $this->Html->link('Produtos', array('controller' => 'produtos', 'action' => 'view')) . '|';


?>
