<?php

/**
 * Description of Especificacao: model usado por outro controller para inserções
 * no banco de dados
 *
 * @author evandro
 */
class Especificacao extends AppModel{    
    
    public $useTable = 'especificacoes';        
    
    public $belongsTo = array(
       'Produto'=> array(
         'className' => 'Produto',
            'foreignKey' => 'id_produto'          
    ));
    
    public $validate = array(
      'valor' => array('rule'=> 'notEmpty'),
      'nome' => array('rule'=> 'notEmpty')        
    );

    /**
     * 
     * @param type $id_produto
     * @throws NotFoundException
     * @return array or false, se tiver espeficicações retorna array com resultados
     * senão tiver retorna false
     */
    public function getEspecificacoes($id_produto)
    {
        if(!$id_produto)
            throw new NotFoundException(__('Id não foi encontrado'));
        
        $result = $this->find('all', array('conditions'=>array('Especificacao.id_produto'=> $id_produto), 
            'recursive'=>-1));
        
        if($result)
            return $result;
        
        return false;        
    }
    
}

?>
