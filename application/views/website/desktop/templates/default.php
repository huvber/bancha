<?php
/**
 * Default template
 *
 * Template predefinito per la renderizzazione del sito
 *
 * @package		Milk
 * @author		Nicholas Valbusa - info@squallstar.it - @squallstar
 * @copyright	Copyright (c) 2011, Squallstar
 * @license		GNU/GPL (General Public License)
 * @link		http://squallstar.it
 *
 */


$this->view->render('header');

$this->view->render('content_render');

$this->view->render('footer');