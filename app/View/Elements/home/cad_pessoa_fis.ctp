<?php

echo $this->Session->flash();

echo "tempo de inicio". $this->Session->read('PF.time_start');

echo "tempo de fim". $this->Session->read('PF.time_end');

echo $this->Form->create('Pessoasfisica', array('url' => array('controller' => 'pessoasfisicas', 'action' => 'add')));
echo "<label>Nome:</label><br>";
echo $this->Form->input('nome', array('label'=>'', 'value'=> $this->Session->read('PF.nome'), 'size'=> '30'));
echo "<label>CPF:</label><br>";
echo $this->Form->input('cpf', array('label'=>'', 'value'=> $this->Session->read('PF.cpf')));
echo "<label>RG:</label><br>";
echo $this->Form->input('rg', array('label'=>'', 'value'=> $this->Session->read('PF.rg')));
echo "<label>Data de nascimento:</label><br>";

print_r($this->Session->read('PF.data_nascimento'));
$data = $this->Session->read('PF.data_nascimento');
echo $this->Form->input('data_nascimento', array('label'=>'', 'dateFormat' => 'DMY','minYear' => date('Y') - 110,
    'maxYear' => date('Y') - 18, 
    'selected' => "{$data['year']}-{$data['month']}-{$data['day']}", 'type'=>'date'));
echo "<br>";

echo "<label>Sexo:</label><br>";
if($this->Session->check('PF.sexo'))
{
     $sexo = $this->Session->read('PF.sexo');
     
     if($sexo)
     {
         $femea = "checked";
         $macho = "";
     }
    else 
     {
         $femea = "";
         $macho = "checked";
     }                   
}
else
{
    $femea = "";
    $macho = "checked";
}
?>
<input type="radio" name="data[Pessoasfisica][sexo]" value="0" <?php echo $macho; ?>> Masculino<br>
<input type="radio" name="data[Pessoasfisica][sexo]" value="1" <?php echo $femea; ?>> Feminino<br>
<?php


echo "<label>Email:</label><br>";
echo $this->Form->input('email', array('label'=>'', 'size'=> '30', 'value'=> $this->Session->read('PF.email')));
echo "<label>Senha:</label><br>";
echo $this->Form->input('senha', array('label'=>'')); 
echo "<label>Repita a senha:</label><br>";
echo $this->Form->input('repass', array('label'=>''));

echo $this->Form->submit('Continuar');
echo $this->Form->end();
