<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComprasController
 *
 * @author evandro
 */
class ComprasController extends AppController {

    public $uses = array('Compra');

    //@debug apenas para teste de inserção de dados;
    public function save() {

        //exemplo de inserção de compras_produtos table      
//  
//        $dados = array();
//        $dados['Compra']['codigo'] = "das343";
//        $dados['Compra']['valor'] = 234;
//        $dados['Compra']['data_compra'] = "2013-11-14 00:00:00";
//        $dados['Compra']['status_compras'] = "Finalizada";
//        $dados['Compra']['id_tipo_pagamentos'] = 3;
//        $dados['Compra']['id_clientes'] = 2;
//        $dados['Produto'][] = 2;
//        
//        $this->Compra->create();
//        
//        if ($this->Compra->save($dados)) {
//        $this->Session->setFlash(__('The post has been saved'));
//        $this->redirect(array('controller'=> 'cidades','action' => 'view'));
//            } else 
//              {
//                $this->Session->setFlash(__('The post could not be saved. Please, try again.'));
//              }
//        
//    }
    }

}
