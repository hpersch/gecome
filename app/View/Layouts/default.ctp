<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo Configure::read('Application.name') ?> - <?php echo!empty($title_for_layout) ? $title_for_layout : ''; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
       
        
        <?php echo $this->Html->css('bootstrap.min') ?>
        <?php echo $this->Html->css('style') ?>
        <?php echo $this->Html->css('font-awesome') ?>
        <style>
            body {
                border-top:10px solid #6eb8d3;
            }
        </style>

        <?php
        if (is_file(WWW_ROOT . 'css' . DS . $this->params->controller . '.css')) {
            echo $this->Html->css($this->params->controller);
        }
        if (is_file(WWW_ROOT . 'css' . DS . $this->params->controller . DS . $this->params->action . '.css')) {
            echo $this->Html->css($this->params->controller . '/' . $this->params->action);
        }
        ?>
        <?php echo $this->Html->script('lib/modernizr') ?>
        
        <?php echo $this->Html->script('home/bootstrap'); ?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
            <![endif]-->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">                        
                        <div class="logo">
                            <h1><a href="/gecome">Ge<span class="color bold">ComE</span></a></h1>
                            <p class="meta">Sua loja virtual</p>
                        </div>
                    </div>

                    
                    <div class="col-md-8 text-right" style="margin:-4px 0px">                       

                        <span class="label label-info"><a href="<?php echo $this->base ;?>/cadastro_login" role="button" data-toggle="modal">Entre ou Cadastre-se</a></span>
                        <span class="label label-info"><a href="#cart" role="button" data-toggle="modal">0 itens <i class="icon-shopping-cart"></i></a> - <span class="bold">R$ 0</span></span>

                        <form class="form-inline" role="form">
                            <input type="text" class="form-control inline" id="search" placeholder="Buscar" style="width:auto;display:inline;">
                            <button type="submit" class="btn btn-default">Buscar</button>
                        </form>
                        
                    </div>
                        

                </div>
            </div>
        </header>
        <div class="navbar navbar-default module-blue">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>                    
                </div>
                                
                
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?= $this->webroot ?>"><i class="icon-home"></i></a></li>
                        <li>
                            <a href="<?php echo $this->base ?>/departamentos">Departamentos</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->base ?>/promocoes">Promocoes</a>
                        </li> 
                        <li>
                            <a href="<?php echo $this->base ?>/entrega">Entrega</a>
                        </li>
                        <li>
                            <a href="<?php echo $this->base ?>/sobre">Sobre</a>
                        </li> 
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>



        <div class="container" role="main" id="main">

            <?php  echo $this->Session->flash(); ?>
            <?php  
            
            echo $this->Js->writeBuffer(array('cache' => FALSE)) ;?>
            <?php echo $this->fetch('content'); ?>
            <hr>

            <footer>
                <?php echo $this->element('sql_dump'); ?>
                <?php echo $this->element('/home/banner_baixo');?>
                <p>&copy; <?php echo Configure::read('Application.name') ?> 2013</p>
            </footer>

        </div> <!-- /container -->

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo $this->params->webroot ?>js/lib/jquery.min.js"><\/script>')</script>

        <?php
        if (is_file(WWW_ROOT . 'js' . DS . $this->params->controller . '.js')) {
            echo $this->Html->script($this->params->controller);
        }
        if (is_file(WWW_ROOT . 'js' . DS . $this->params->controller . DS . $this->params->action . '.js')) {
            echo $this->Html->script($this->params->controller . '/' . $this->params->action);
        }
        ?>

        <?php
        echo $this->Html->script(
                array(
                    'lib/bootstrap.min',
                    'src/scripts.js'
        ));
        ?>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
            (function(d, t) {
                var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
                g.src = ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g, s)
            }(document, 'script'));
        </script>
        
    </body>
</html>
