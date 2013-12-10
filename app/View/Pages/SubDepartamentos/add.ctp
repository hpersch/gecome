<!--form de adicção de conteúdo de subdepartamentos-->

<?php
echo $this->Form->create('SubDepartamento', array('url' => array('controller' => 'SubDepartamentos', 'action' => 'add')));
echo $this->Form->input('nome', array('label'=>'Nome:'));
echo $this->Form->input('id_departamentos', array('options'=> array($departamentos), 'label'=>'Departamento'));
echo $this->Form->submit('Salvar');
echo $this->Form->end();
?>
