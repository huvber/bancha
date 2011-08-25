<?php
/**
 * Install Controller
 *
 * Installazione sito
 *
 * @package		Milk
 * @author		Nicholas Valbusa - info@squallstar.it - @squallstar
 * @copyright	Copyright (c) 2011, Squallstar
 * @license		GNU/GPL (General Public License)
 * @link		http://squallstar.it
 *
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Install extends Milk_Controller
{
	public function __construct()
	{
	    parent::__construct();
	    $this->view->base = 'admin/';
	}

	public function index()
	{
		$this->load->library('milk/installer');

		//Creo le tabelle
		$this->installer->create_tables();

		//Creo le directory
		$this->installer->create_directories();

		//Creo un utente ed i relativi permessi
		$username = 'admin';
		$password = 'admin';
		$this->installer->create_groups();
		$this->installer->create_user($username, $password, 'Nicholas', 'Valbusa');
		$this->auth->login($username, $password);

		//Creo i tipi predefiniti
		$this->installer->create_types();

		//Svuoto la cache
		$this->tree->clear_cache();

		//Loggo il primo evento
		$this->load->events();
		$this->events->log('install', null, CMS);

		$this->view->set('username', $username);
		$this->view->set('password', $password);
		$this->view->set('message', $this->lang->_trans('%n has ben installed!', array('n' => CMS)));
		$this->view->render_layout('installer/success', FALSE);

		return;

	}
}