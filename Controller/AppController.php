<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array('RequestHandler', 'Session');

	public $paginate = array(
		'limit' => 25
	);

	public function beforeFilter() {
// Limit JSON results to 10
		if(!empty($this->request->params['ext']) && ($this->request->params['ext'] == 'json')) {
			$this->paginate['limit'] = 10;
		}

// Enables search from link in related models
		if(isset($this->request->params['named']['searchField']) && isset($this->request->params['named']['searchValue'])) {
			$this->paginate = array();
			$this->paginate['conditions'][$this->modelClass . '.' . $this->request->params['named']['searchField']] = $this->request->params['named']['searchValue'];
		}

		parent::beforeFilter();
	}

}
