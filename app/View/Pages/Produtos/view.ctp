<!--form de visualização de subdepartamentos-->

<?php 
echo $this->Html->link("Adicionar produtos", array('controller' => 'produtos',
    'action' => 'add'));

?>
<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Código</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Promoção</th>            
            <th>Data de cadastro</th>
            <th>Marca</th>
            <th>Departamento</th>
            
            <th colspan="2">Ação</th>
            
        </tr>
    </thead>
    <tbody>
                    
<?php

define("UPDATE", "update");

foreach ($produtos as $value) {
    foreach ($value as $result) {
        ?>
        <tr>
            <td><?php echo $result['id'] ;?></td>
            <td><?php echo $result['codigo'] ;?></td>
            <td><?php echo $this->Html->link($result['nome'], 
                    array('controller'=>'produtos', 'action'=> 'detalhes', $result['id']));?></td>
            <td><?php echo $result['descricao'] ;?></td>
            <td><?php echo $result['preco'] ;?></td>
            <td><?php echo $result['quantidade'] ;?></td>
            <td><?php echo $result['promocao'] ;?></td>
            <td><?php echo $result['data_cadastro'] ;?></td>
            <td><?php echo $result['id_marcas'] ;?></td>
            <td><?php echo $result['id_sub_departamentos'] ;?></td>
            
            
            <td><?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $result['id']),
                array('confirm' => 'Você tem certeza?')) ?></td>
            <td><?php echo $this->Html->link("Atualizar", 
                          array('controller'=>'produtos', 'action'=> 'update', $result['id'])) ;?></td>
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
