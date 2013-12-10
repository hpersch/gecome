<?php 

echo $this->Html->link("Adicionar Departamento", array('controller' => 'departamentos',
    'action' => 'add'));

?>
<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Departamento</th>
            <th colspan="2">Ação</th>
            
        </tr>
    </thead>
    <tbody>      
    
<?php

define("UPDATE", "update");

foreach ($depto as $value) {
    foreach ($value as $result) {
        ?>
        <tr>
            <td><?php echo $result['id'] ;?></td>
            <td><?php echo $result['nome'] ;?></td>
            <td><?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $result['id']),
                array('confirm' => 'Você tem certeza?')) ?></td>
            <td><?php echo $this->Html->link("Atualizar", 
                          array('controller'=>'departamentos', 'action'=> 'update', $result['id'])) ;?></td>
        </tr>
    <?php 
    
    }
}
?>
</tbody>
</table>

<?php
echo $this->Paginator->prev('« Mais novas', null, null, array('class' => 'desabilitado'));
echo $this->Paginator->numbers();
echo $this->Paginator->next('Mais antigas »', null, null, array('class' => 'desabilitado'));
?>


