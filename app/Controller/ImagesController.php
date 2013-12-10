<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImagesController
 *
 * @author evandro
 */
class ImagesController extends AppController {

    public $uses = array('Image');
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Fileupload');
    public static $PATH = "img/files";

    public function view() {
        
    }

    //adiciona registro no banco e colocar as figuras no servidor
    public function add() {
        if ($this->request->isPost()) {
            try {
                //tenta fazer a upload da imagem para o servidor
                $fileOK = $this->Fileupload->uploadFiles(self::$PATH, $this->request->data['Image']);

                if ($fileOK)
                    print_r($fileOK);

                //debug
                print_r($this->request->data);

                echo $this->Fileupload->getName();
                $dados = array();

                $dados['Image']['principal'] = $this->request->data['Image']['principal'];
                $dados['Image']['nome'] = $this->Fileupload->getName();
                $dados['Image']['caminho'] = self::$PATH;
                $dados['Image']['id_produtos'] = 2; //trocar

                $this->Image->create();

                if ($this->Image->save($dados)) {
                    $this->Session->setFlash("Dados salvos com sucesso!");
                } else {
                    $message = $this->Image->validationErrors;
                    $this->Session->setFlash($message, 'form_error', array('class' => 'alert alert-error'));
                }
            } catch (Exception $e) {
                throw new NotFoundException(__($e->getMessage()));
            }
        }
    }

}
