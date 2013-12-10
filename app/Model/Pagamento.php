<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pagamento
 *
 * @author evandro
 */
class Pagamento extends AppModel{
    
    public $useTable = 'pagamentos';
    
    //descomentar depois de class compras estiver pronta
//    public $belongsTo = array(
//       'Compra'=> array(
//         'className' => 'Compra',
//            'foreignKey' => 'id_compras'          
//    ));
            
    
    //validação de entrada nos campos
    public $validate = array(
        'valor'=> array('rule'=> 'numeric', 'required'=> true),
        'data_vencimento' => array('rule'=> 'date', 'allowEmpty' => false,
            'message' => 'Entre com uma data válida'),
        'status_compras'=> array('rule' => 'notEmpty'),
        'data_vencimento' => array('rule'=> 'date', 'allowEmpty' => true,
            'message' => 'Entre com uma data válida')
    );
    
}
