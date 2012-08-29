<?php
App::uses('AppController', 'Controller');
/**
 * RecipeIngredients Controller
 *
 * @property RecipeIngredient $RecipeIngredient
 */
class RecipeIngredientsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->RecipeIngredient->recursive = 0;
		$this->set('recipeIngredients', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->RecipeIngredient->id = $id;
		if (!$this->RecipeIngredient->exists()) {
			throw new NotFoundException(__('Invalid recipe ingredient'));
		}
		$this->set('recipeIngredient', $this->RecipeIngredient->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RecipeIngredient->create();
			if ($this->RecipeIngredient->save($this->request->data)) {
				$this->Session->setFlash(__('The recipe ingredient has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipe ingredient could not be saved. Please, try again.'));
			}
		}
		$recipes = $this->RecipeIngredient->Recipe->find('list');
		$ingredients = $this->RecipeIngredient->Ingredient->find('list');
		$this->set(compact('recipes', 'ingredients'));

		$this->render('form');
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->RecipeIngredient->id = $id;
		if (!$this->RecipeIngredient->exists()) {
			throw new NotFoundException(__('Invalid recipe ingredient'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RecipeIngredient->save($this->request->data)) {
				$this->Session->setFlash(__('The recipe ingredient has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipe ingredient could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->RecipeIngredient->read(null, $id);
		}
		$recipes = $this->RecipeIngredient->Recipe->find('list');
		$ingredients = $this->RecipeIngredient->Ingredient->find('list');
		$this->set(compact('recipes', 'ingredients'));

		$this->render('form');
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
		$this->RecipeIngredient->id = $id;
		if (!$this->RecipeIngredient->exists()) {
			throw new NotFoundException(__('Invalid recipe ingredient'));
		}
		if ($this->RecipeIngredient->delete()) {
			$this->Session->setFlash(__('Recipe ingredient deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Recipe ingredient was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
