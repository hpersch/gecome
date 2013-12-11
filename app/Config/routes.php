<?php

/**
 * Routes configuration 
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
//rotas de padroes
Router::connect('/users/:action', array('controller' => 'users'));
Router::connect('/admin/users/:action', array('controller' => 'users'));

Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
Router::connect('/admin/login', array('controller' => 'users', 'action' => 'login'));

//rotas admin
Router::connect('/admin/departamentos/:action/*', array('controller' => 'departamentos', 'admin' => true));
Router::connect('/admin/subdepartamentos/:action/*', array('controller' => 'subdepartamentos', 'admin' => true));
Router::connect('/admin/produtos/:action/*', array('controller' => 'produtos', 'admin' => true));
Router::connect('/admin/marcas/:action/*', array('controller' => 'marcas', 'admin' => true));

Router::connect('/admin', array('controller' => 'pages', 'action' => 'view', 'home', 'admin' => true));
Router::connect('/admin/*', array('controller' => 'pages', 'action' => 'view', 'admin' => true));

//rotas para todo o público
Router::connect('/', array('controller' => 'pages', 'action' => 'view', 'home'));
Router::connect('/*', array('controller' => 'pages', 'action' => 'view'));

/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
/**
 * Load all plugin routes.  See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
