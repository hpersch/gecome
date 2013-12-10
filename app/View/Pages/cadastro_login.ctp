
<div class="col-sm-4">
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title">Entrar</h3>
        </div>
        <div class="panel-body"> 
            
            <?php echo $this->element('form_login') ?>
            
            </div>
    </div>
</div>    

<!--forma de cadastro--> 
<div class="col-sm-8">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Cadastre-se</h3>
</div>
<div class="panel-body">


<?php echo $this->Html->css('/home/bootstrap');?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<div class="container">

<!-------->
<div id="content">
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#pf" data-toggle="tab">Cadastro Pessoa Física</a></li>
        <li><a href="#pj" data-toggle="tab">Cadastro Pessoa Jurídica</a></li>       
    </ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="pf">
   <?php //echo $this->Session->flash(); ?>
            
            <h4>Pessoa Física</h4>
            <p>
                <script>
                    
                    function mostraErros(texto)
                    {
                        document.write(texto);
                    }
                
                </script>
            </p>
            <p>
                <?php echo $this->element('/home/cad_pessoa_fis') ;?>
                
                <?php //echo $this->fetch('/pessoasfisicas/add') ;?>
            </p>
        </div>
        <div class="tab-pane" id="pj">
            <h4>Pessoa Jurídica</h4>
            <p>orange orange orange orange orange</p>
        </div>        
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $('#tabs').tab();
    });
</script>    
</div> <!-- container -->

<?php echo $this->Html->script('/home/bootstrap');?>





</div>
</div>
</div> 

