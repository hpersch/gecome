<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

echo $this->Form->create('Produto');
echo $this->Form->input('codigo');
echo $this->Form->input('nome');
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('descricao');
echo $this->Form->input('preco');
echo $this->Form->input('quantidade');
echo $this->Form->input('promocao');
echo $this->Form->input('data_cadastro');
echo $this->Form->input('id_marcas');
echo $this->Form->input('id_sub_departamentos');

echo $this->Form->end('Salvar');

?>
