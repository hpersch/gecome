<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link rel="shortcut icon" href="img/favicon.html">

        <title>GeCome Admin Panel</title>

        <!-- Bootstrap core CSS -->
        <link href="<?= $this->webroot ?>adm/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= $this->webroot ?>adm/css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        <link href="<?= $this->webroot ?>adm/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="<?= $this->webroot ?>adm/css/style.css" rel="stylesheet">
        <link href="<?= $this->webroot ?>adm/css/style-responsive.css" rel="stylesheet" />
        <script src="<?= $this->webroot ?>adm/js/jquery-1.8.3.min.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <section id="container" class="">
            <!--header start-->
            <header class="header white-bg">
                <div class="sidebar-toggle-box">
                    <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
                </div>
                <!--logo start-->
                <a href="#" class="logo">Ge<span>CoMe</span></a>
                <!--logo end-->
                <div class="nav notify-row" id="top_menu">
                </div>
                <div class="top-nav ">
                    <!--search & user info start-->
                    <ul class="nav pull-right top-menu">
                        <li>
                            <input type="text" class="form-control search" placeholder="Search">
                        </li>
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="icon icon-user"></i>
                                <span class="username"><?= (isset($user['User'])) ? $user['User']['username'] : "Usuario" ?></span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <div class="log-arrow-up"></div>
                                <li><a href="#"><i class=" icon-suitcase"></i>Profile</a></li>
                                <li><a href="#"><i class="icon-cog"></i> Settings</a></li>
                                <li><a href="#"><i class="icon-bell-alt"></i> Notification</a></li>
                                <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <!--search & user info end-->
                </div>
            </header>
            <!--header end-->
            <!--sidebar start-->
            <aside>
                <div id="sidebar"  class="nav-collapse ">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a class="" href="<?= $this->base ?>/admin">
                                <i class="icon-dashboard"></i>
                                <span>Inicio</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-book"></i>
                                <span>Departamentos</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?= $this->base ?>/admin/departamentos">Listar</a></li>
                                <li><a class="" href="<?= $this->base ?>/admin/departamentos/novo">Novo</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-cogs"></i>
                                <span>Sub-departamentos</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?= $this->base ?>/admin/subdepartamentos">Listar</a></li>
                                <li><a class="" href="<?= $this->base ?>/admin/subdepartamentos/novo">Novo</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-tasks"></i>
                                <span>Marcas</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?= $this->base ?>/admin/marcas">Listar</a></li>
                                <li><a class="" href="<?= $this->base ?>/admin/marcas/novo">Novo</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-th"></i>
                                <span>Produtos</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?= $this->base ?>/admin/usuarios">Listar</a></li>
                                <li><a class="" href="<?= $this->base ?>/admin/usuarios">Novo</a></li>
                                <li><a class="" href="<?= $this->base ?>/admin/usuarios">Promocoes</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-th"></i>
                                <span>Usuarios</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?= $this->base ?>/admin/usuarios">Listar</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <?php echo $content_for_layout; ?>
                </section>
            </section>
            <!--main content end-->
        </section>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="<?= $this->webroot ?>adm/js/jquery.js"></script>        
        <script src="<?= $this->webroot ?>adm/js/bootstrap.min.js"></script>
        <script src="<?= $this->webroot ?>adm/js/jquery.scrollTo.min.js"></script>
        <script src="<?= $this->webroot ?>adm/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?= $this->webroot ?>adm/js/jquery.sparkline.js" type="text/javascript"></script>
        <script src="<?= $this->webroot ?>adm/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script src="<?= $this->webroot ?>adm/js/owl.carousel.js" ></script>
        <script src="<?= $this->webroot ?>adm/js/jquery.customSelect.min.js" ></script>

        <!--common script for all pages-->
        <script src="<?= $this->webroot ?>adm/js/common-scripts.js"></script>

        <!--script for this page-->
        <script src="<?= $this->webroot ?>adm/js/sparkline-chart.js"></script>
        <script src="<?= $this->webroot ?>adm/js/easy-pie-chart.js"></script>

        <script>

            //owl carousel

            $(document).ready(function() {
                $("#owl-demo").owlCarousel({
                    navigation: true,
                    slideSpeed: 300,
                    paginationSpeed: 400,
                    singleItem: true

                });
            });

            //custom select box

            $(function() {
                $('select.styled').customSelect();
            });

        </script>

    </body>
</html>

