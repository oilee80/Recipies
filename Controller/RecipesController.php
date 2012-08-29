<?php
App::uses('AppController', 'Controller');
/**
 * Recipes Controller
 *
 * @property Recipe $Recipe
 */
class RecipesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Recipe->recursive = 0;
		$this->set('recipes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Recipe->id = $id;
		if (!$this->Recipe->exists()) {
			throw new NotFoundException(__('Invalid recipe'));
		}
		$this->set('recipe', $this->Recipe->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Recipe->create();
			if ($this->Recipe->save($this->request->data)) {
				$this->Session->setFlash(__('The recipe has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipe could not be saved. Please, try again.'));
			}
		}
		$users = $this->Recipe->User->find('list');
		$recipes = $this->Recipe->Recipe->find('list');
		$this->set(compact('users', 'recipes'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Recipe->id = $id;
		if (!$this->Recipe->exists()) {
			throw new NotFoundException(__('Invalid recipe'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Recipe->save($this->request->data)) {
				$this->Session->setFlash(__('The recipe has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipe could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Recipe->read(null, $id);
		}
		$users = $this->Recipe->User->find('list');
		$recipes = $this->Recipe->Recipe->find('list');
		$this->set(compact('users', 'recipes'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Recipe->id = $id;
		if (!$this->Recipe->exists()) {
			throw new NotFoundException(__('Invalid recipe'));
		}
		if ($this->Recipe->delete()) {
			$this->Session->setFlash(__('Recipe deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Recipe was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
