<?php

/**
 * Description of Promocao
 *
 * @author evandro
 */
class Promocao extends AppModel
{        
    public $useTable = 'promocoes';
    
    public $belongsTo= array(
       'Produto'=> array(
         'className' => 'Produto',
            'foreignKey' => 'id_produto'          
    ));
    
    public $validate = array(
        'data_inicio'=> array('rule'=> 'date', 'allowEmpty'=> false),
        'data_fim'  => array('allowEmpty'=>true, 'rule'=>'date')
    );
    
    public function getPromocoes($id_produto = null)
    {
        if(!$id_produto)
            throw new NotFoundException(__('Id não foi encontrado'));
        
        $result = $this->find('all', array('conditions'=>array('Promocao.id_produto'=> $id_produto), 
            'recursive'=>-1));
        
        if($result)
            return $result;
        
        return false;
    }
    
}

?>
