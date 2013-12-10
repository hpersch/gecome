
<?php
echo $this->Html->link("Adicionar Tipos de pagamentos", array('controller' => 'tipopagamentos',
    'action' => 'add'));

?>
<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Tipo de pagamento</th>
            <th>Ação</th>
            
        </tr>
    </thead>
    <tbody>      
    
<?php


foreach ($pagamentos as $value) {
    foreach ($value as $result) {
        ?>
        <tr>
            <td><?php echo $result['id'] ;?></td>
            <td><?php echo $result['nome'] ;?></td>
            <td><?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $result['id']),
                array('confirm' => 'Você tem certeza?')) ?></td>            
        </tr>
    <?php 
    
    }
}
?>
</tbody>
</table>





