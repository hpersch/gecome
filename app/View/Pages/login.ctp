<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Entrar</h3>
            </div>
            <div class="panel-body">
                <?php echo $this->element('form_login') ?>
            </div>
        </div>
    </div>
    <div class="col-lg-offset-1 col-lg-7">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Cadastro</h3>
            </div>
            <div class="panel-body">
                <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                    <li class="active"><a href="#pf" data-toggle="tab">Cadastro Pessoa Física</a></li>
                    <li><a href="#pj" data-toggle="tab">Cadastro Pessoa Jurídica</a></li>       
                </ul>
                <div id="my-tab-content" class="tab-content">
                    <div class="tab-pane active" id="pf">
                        <h4>Pessoa Física</h4>
                        <p>
                            <?php echo $this->element('/home/cad_pessoa_fis'); ?>
                        </p>
                    </div>
                    <div class="tab-pane" id="pj">
                        <h4>Pessoa Jurídica</h4>
                        <p>orange orange orange orange orange</p>
                    </div>        
                </div>
            </div>
        </div>        
    </div>
</div>