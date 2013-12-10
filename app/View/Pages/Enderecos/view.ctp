<?php 
echo $this->Html->link("Adicionar Endereço", array('controller' => 'enderecos',
    'action' => 'add'));

?>
<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>            
            <th>Cep</th>            
            <th>Tipo</th>            
            <th>Rua</th>            
            <th>Número</th>            
            <th>Complemento</th>            
            <th>Descrição</th>            
            <th>Bairro</th>                        
            <th colspan="2">Ação</th>
            
        </tr>
    </thead>
    <tbody>
        
        
    
<?php

define("UPDATE", "update");

foreach ($enderecos as $value) {
    foreach ($value as $result) {
        ?>
        <tr>
            <td><?php echo $result['id'] ;?></td>
            <td><?php echo $result['nome'] ;?></td>            
            <td><?php echo $result['cep'] ;?></td> 
            <td><?php echo $result['tipo'] ;?></td> 
            <td><?php echo $result['rua'] ;?></td> 
            <td><?php echo $result['numero'] ;?></td> 
            <td><?php echo $result['complemento'] ;?></td> 
            <td><?php echo $result['descricao'] ;?></td> 
            <td><?php echo $result['bairro'] ;?></td> 
            <td><?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $result['id']),
                array('confirm' => 'Você tem certeza?')) ?></td>
            <td><?php echo $this->Html->link("Atualizar", 
                          array('controller'=>'enderecos', 'action'=> 'update', $result['id'])) ;?></td>
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