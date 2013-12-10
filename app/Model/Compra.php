<?php

/**
 * Description of Compra
 *
 * @author evandro
 */
class Compra extends AppModel{
    
    public $useTable = 'compras';
    
    public $validate = array(
        'valor'=> array('rule'=> 'numeric', 'required'=> true),
        'data_compra' => array('rule'=> array('datetime'), 'allowEmpty' => false),//verificar correteza
        'status_compras' => array('rule'=> 'notEmpty')
    );   
    
    //relacionamento n2n tabela compras_produtos
    public $hasAndBelongsToMany = array(
    'Produto' => array(
      'className' => 'Produto',
      'joinTable' => 'compras_produtos',
      'foreignKey' => 'id_compras',
      'associationForeignKey' => 'id_produtos',
      'unique' => 'keepExisting',
    )
  );        
}
