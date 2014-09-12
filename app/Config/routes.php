<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
  
/**
 * my routes
 */
  Router::connect(
    '/news/jahr/:year',
    array('controller' => 'news', 'action' => 'year'),
    array('year' => '201[3-9]{1}')
  );
  
  Router::connect(
    '/news/:url_id',
    array('controller' => 'news', 'action' => 'view'),
    array('url_id' => '[\w-]+')
  );
  
  Router::connect('/bands/:id', array('controller' => 'bands', 'action' => 'view'));
  
  Router::connect('/kalender', array('controller' => 'events', 'action' => 'index'));
  Router::connect('/kalender/details/:id', array('controller' => 'events', 'action' => 'view'), array('id' => '[0-9]+'));
  
  Router::connect('/veroeffentlichungen', array('controller' => 'records', 'action' => 'index'));
  Router::connect('/veroeffentlichungen/alle', array('controller' => 'records', 'action' => 'alle'));
  Router::connect('/veroeffentlichungen/eintragen', array('controller' => 'records', 'action' => 'eintragen'));
  
  Router::connect('/festival', array('controller' => 'pages', 'action' => 'display', 'festival'));
  Router::connect('/impressum', array('controller' => 'pages', 'action' => 'display', 'impressum'));
  Router::connect('/vorlage', array('controller' => 'pages', 'action' => 'display', 'vorlage'));
  Router::connect('/soziale-netzwerke', array('controller' => 'pages', 'action' => 'display', 'soziale-netzwerke'));

/**
 * my redirect routes
 */
  Router::redirect(
    '/',
    array('controller' => 'news', 'action' => 'index'),
    array('persistent' => true)
  );
  
  Router::redirect(
    '/archiv',
    'http://darkneuss.blogspot.de',
    array('status' => 301)
  );
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
