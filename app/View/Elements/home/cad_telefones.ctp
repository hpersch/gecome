<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 */


if($fisico) { ?>

<div id="fones">

<!--telefones residenciais-->
<label>Telefone residencial 1</label>
<?php echo $this->Form->input('Telefone.numero.0', array('label'=>'')); ?>
<label>Telefone residencial 2</label>
<?php echo $this->Form->input('Telefone.numero.1', array('label'=>'')); ?>

<!--celular-->
<label>Telefone Celular</label>
<?php echo $this->Form->input('Telefone.numero.2', array('label'=>'')); ?>
</div>

<?php } else { ?>

<div id="fones">

<!--telefones comerciais-->
<label>Telefone comercial</label>
<?php echo $this->Form->input('Telefone.numero', array('label'=>'')); ?>

<?php } ?>


<style>
    #fones
    {                
        float: right;
        margin-right: 20%;
        margin-top: -50%;        
    }
    
</style>



