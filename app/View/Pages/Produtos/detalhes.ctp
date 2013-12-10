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
        </tr>
    </thead>
    <tbody>
                    
<?php


foreach ($produto as $resultProd) {
    
        ?>
        <tr>
            <td><?php echo $resultProd['id'] ;?></td>
            <td><?php echo $resultProd['codigo'] ;?></td>
            <td><?php echo $resultProd['nome'] ;?></td>
            <td><?php echo $resultProd['descricao'] ;?></td>
            <td><?php echo $resultProd['preco'] ;?></td>
            <td><?php echo $resultProd['quantidade'] ;?></td>
            <td><?php  if($resultProd['promocao']) echo 'Sim'; else  echo 'Não'; ;?></td>
            <td><?php echo $resultProd['data_cadastro'] ;?></td>
            <td><?php echo $marca[0]['Marca']['nome'] ;?></td>
            <td><?php echo $subdepartamento[0]['SubDepartamento']['nome'] ;?></td>                                    
        </tr>
    <?php         
}
?>
</tbody>
</table>

<br><br>
Especificações <?php echo $this->Html->link('Adicionar Especificação', 
        array('controller'=>'especificacoes', 'action'=> 'add', $resultProd['id'])) ;?>

<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Valor</th>   
            <th colspan="2">Ações</th>
        </tr>
    </thead>
    <tbody>
                    
<?php
if($especificacoes)    
foreach ($especificacoes as $result) {
    
        ?>
        <tr>
            <td><?php echo $result['Especificacao']['id'] ;?></td>
            <td><?php echo $result['Especificacao']['nome'] ;?></td>
            <td><?php echo $result['Especificacao']['valor'] ;?></td>
            <td><?php echo $this->Form->postLink(
                'Delete',
                array('controller'=>'especificacoes','action' => 'delete', $result['Especificacao']['id']),
                array('confirm' => 'Você tem certeza?')) ?></td>
            
            <td><?php  echo $this->Html->link("Atualizar", 
                    array('controller'=>'especificacoes', 'action'=>'update', 
                        $result['Especificacao']['id'] ));?></td>
                                                
        </tr>
    <?php         
}
?>
</tbody>
</table>

<!--promocoes para determinado produto-->
<br><br>
Especificações <?php echo $this->Html->link('Adicionar Promoção', 
        array('controller'=>'promocoes', 'action'=> 'add', $resultProd['id'])) ;?>

<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Data de inicio</th>
            <th>Data de fim</th>
            <th>Ativo</th>
            <th>Desconto</th>
            <th>Quantidade</th>   
            <th>Quantidade vendida</th>
            <th colspan="2">Ações</th>
        </tr>
    </thead>
    <tbody>
                    
<?php
if($promocoes)    
foreach ($promocoes as $result) {    
        ?>
        <tr>
            <td><?php echo $result['Promocao']['id'] ;?></td>
            <td><?php echo $result['Promocao']['data_inicio'] ;?></td>
            <td><?php echo $result['Promocao']['data_fim'] ;?></td>
            <td><?php echo $result['Promocao']['ativo'] ;?></td>
            <td><?php echo $result['Promocao']['desconto'] ;?></td>
            <td><?php echo $result['Promocao']['quantidade'] ;?></td>
            <td><?php echo $result['Promocao']['quantidade_vendida'] ;?></td>
            <td><?php echo $this->Form->postLink(
                'Delete',
                array('controller'=>'promocoes','action' => 'delete', $result['Promocao']['id']),
                array('confirm' => 'Você tem certeza?')) ?></td>
            
            <td><?php  echo $this->Html->link("Atualizar", 
                    array('controller'=>'promocoes', 'action'=>'update', 
                        $result['Promocao']['id'] ));?></td>
                                                
        </tr>
    <?php         
}
?>
</tbody>
</table>

<!--imagens de determinado produto-->

<br><br>
Especificações <?php echo $this->Html->link('Adicionar Imagem', 
        array('controller'=>'images', 'action'=> 'add', $resultProd['id'])) ;?>

<table border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Imagem</th>   
            <th colspan="2">Ações</th>
        </tr>
    </thead>
    <tbody>
                    
<?php
if($images)    
foreach ($images as $result) {
    
        ?>
        <tr>
            <td><?php echo $result['Image']['id'] ;?></td>
            <td><?php echo $result['Image']['nome'] ;?></td>
            <td><?php echo  $this->Html->image("files/".$result['Image']['nome'], array('alt' => 'CakePHP', 'width'=> '30%')) ;?></td>
            <td><?php echo $this->Form->postLink(
                'Delete',
                array('controller'=>'images','action' => 'delete', $result['Image']['id']),
                array('confirm' => 'Você tem certeza?')) ?></td>
            
            <td><?php  echo $this->Html->link("Atualizar", 
                    array('controller'=>'images', 'action'=>'update', 
                        $result['Image']['id'] ));?></td>
                                                
        </tr>
    <?php         
}
?>
</tbody>
</table>