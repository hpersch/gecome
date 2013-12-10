<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Produto extends AppModel
{
    public $belongTo = array('Marca', 'SubDepartamento','ProdutoHasEspecificacao', 'Especificacao');        
    
    
    public $validate = array(        
        'nome'=> array('rule'=>'notEmpty'),
        'id_marcas'=> array('rule'=>'notEmpty'),
        'data_cadastro'=> array('rule'=>'notEmpty'),
        'id_sub_departamentos'=> array('rule'=>'notEmpty'),
        'quantidade'=>array('rule'=> 'numeric', 'message'=> 'Entrada de dados inválida'),
        'preco'=>array('rule'=> 'numeric', 'message'=> 'Entrada de dados inválida'),        
    );
    
    
}

?>
