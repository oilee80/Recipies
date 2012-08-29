<?php
App::uses('AppController', 'Controller');
/**
 * MethodSteps Controller
 *
 * @property MethodStep $MethodStep
 */
class MethodStepsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MethodStep->recursive = 0;
		$this->set('methodSteps', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->MethodStep->id = $id;
		if (!$this->MethodStep->exists()) {
			throw new NotFoundException(__('Invalid method step'));
		}
		$this->set('methodStep', $this->MethodStep->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MethodStep->create();
			if ($this->MethodStep->save($this->request->data)) {
				$this->Session->setFlash(__('The method step has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The method step could not be saved. Please, try again.'));
			}
		}
		$recipes = $this->MethodStep->Recipe->find('list');
		$this->set(compact('recipes'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->MethodStep->id = $id;
		if (!$this->MethodStep->exists()) {
			throw new NotFoundException(__('Invalid method step'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MethodStep->save($this->request->data)) {
				$this->Session->setFlash(__('The method step has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The method step could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->MethodStep->read(null, $id);
		}
		$recipes = $this->MethodStep->Recipe->find('list');
		$this->set(compact('recipes'));
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
		$this->MethodStep->id = $id;
		if (!$this->MethodStep->exists()) {
			throw new NotFoundException(__('Invalid method step'));
		}
		if ($this->MethodStep->delete()) {
			$this->Session->setFlash(__('Method step deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Method step was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
