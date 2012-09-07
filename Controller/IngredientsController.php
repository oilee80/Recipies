<?php
App::uses('AppController', 'Controller');
/**
 * Ingredients Controller
 *
 * @property Ingredient $Ingredient
 */
class IngredientsController extends AppController {

	public function import() {
		if($h = fopen(TMP . 'import' . DS . 'ingredients.csv', 'r')) {
			echo '<table>';
			while($row = fgetcsv($h)) {
				if((+$row[1]) == 0)
					continue;
				$this->Ingredient->create();
				$ingredient = array('Ingredient');
				$ingredient['Ingredient']['name'] = $row[0];
				$ingredient['Ingredient']['serving_size'] = +$row[1];
				$ingredient['Ingredient']['fat'] = $row[3] / $row[1];
				$ingredient['Ingredient']['carbohydrates'] = $row[4] / $row[1];
				$ingredient['Ingredient']['fiber'] = $row[5] / $row[1];
				$ingredient['Ingredient']['protein'] = $row[6] / $row[1];
				$ingredient['Ingredient']['measure'] = 0;
				$ingredient['Ingredient']['pro_points'] = $row[6];
				$ingredient['Ingredient']['calculate_pro_points'] = ($row[6] == '');

				if (!$this->Ingredient->save($ingredient, array('' => true))) {
					echo '<tr><td>'.implode('</td><td>', $ingredient['Ingredient']).'</td></tr>';
				}
			}
			echo '</table>';
			die('Import Completed');
		} else {
			die('Failed Import');
		}
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ingredient->recursive = 0;
		$this->set('ingredients', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function search() {
		$this->Ingredient->recursive = -1;
/*		$conditions = array(
			'name LIKE' => '%'.$this->request->query['search'].'%'
		);*/
		$searches = explode(' ', $this->request->query['search']);
		foreach($searches As &$search) {
			$search = 'name LIKE "%' . $search . '%"';
		}
		$conditions = array(
			'and' => $searches
		);

		$ingredients = $this->paginate('Ingredient', $conditions);

		$this->set(compact('ingredients'));

/*// Try to change to use Paginate instead so that it will 
		$limit = ($this->request->params['ext'] == 'json') ? 10 : 25;

		$results = $this->Ingredient->find('list', array('conditions' => $conditions, 'limit' => $limit));

		if($this->request->params['ext'] == 'json') {
			die(json_encode($results));
		}*/
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Ingredient->id = $id;
		if (!$this->Ingredient->exists()) {
			throw new NotFoundException(__('Invalid ingredient'));
		}
		$this->set('ingredient', $this->Ingredient->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ingredient->create();
			if ($this->Ingredient->save($this->request->data)) {
				$this->Session->setFlash(__('The ingredient has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ingredient could not be saved. Please, try again.'));
			}
		}
		$types = $this->Ingredient->getValues('type');
		$measures = $this->Ingredient->getValues('measure');

		$this->set(compact('types', 'measures'));

		$this->render('form');
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Ingredient->id = $id;
		if (!$this->Ingredient->exists()) {
			throw new NotFoundException(__('Invalid ingredient'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ingredient->save($this->request->data)) {
				$this->Session->setFlash(__('The ingredient has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ingredient could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Ingredient->read(null, $id);
		}
		$types = $this->Ingredient->getValues('type');
		$measures = $this->Ingredient->getValues('measure');

		$this->set(compact('types', 'measures'));

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
		$this->Ingredient->id = $id;
		if (!$this->Ingredient->exists()) {
			throw new NotFoundException(__('Invalid ingredient'));
		}
		if ($this->Ingredient->delete()) {
			$this->Session->setFlash(__('Ingredient deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ingredient was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
