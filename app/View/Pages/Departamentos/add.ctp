<?php

/**
 * @description: View de inserção de dados de departamentos
 * @date: 1-10-2013
 * @author Ebolzan
 */

$now = date("Y-m-d");

echo $this->Form->create('Departamento', array('url' => array('controller' => 
    'departamentos', 'action' => 'add')));
echo $this->Form->input('nome', array('label'=>'Nome:'));

echo $this->Form->input('data_criacao', array( 'label' => 'Data de criação'
                            ,'dateFormat' => 'DMY', 'disabled'=>'disabled',
                            'value'=>  $now
    ));

echo $this->Form->submit('Salvar');
echo $this->Form->end();
?>
