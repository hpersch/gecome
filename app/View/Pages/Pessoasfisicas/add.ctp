<?php


echo $this->Form->create('PessoasFisica', array('url' => array('controller' => 'pessoasfisicas', 'action' => 'add')));
echo $this->Form->input('nome', array('label'=>'Nome:'));
echo $this->Form->input('cpf', array('label'=>'Cpf:'));
echo $this->Form->input('rg', array('label'=>'Rg:'));
echo $this->Form->input('data_nascimento', array('label'=>'Data de nascimento:'));
echo $this->Form->input('sexo', array('label'=>'Sexo:'));
echo $this->Form->input('email', array('label'=>'Email:'));
echo $this->Form->submit('Salvar');
echo $this->Form->end();