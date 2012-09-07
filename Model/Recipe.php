<?php
App::uses('AppModel', 'Model');
/**
 * Recipe Model
 *
 * @property User $User
 * @property Recipe $Recipe
 * @property MethodStep $MethodStep
 * @property RecipeIngredient $RecipeIngredient
 * @property Recipe $Recipe
 */
class Recipe extends AppModel {

	public function afterFind($results = array(), $primary = false) {

		$results = parent::afterFind($results, $primary);

		if(!empty($results['Ingredient'])) {
			$results['Recipe']['pro_points'] = 0;
			foreach($results['Ingredient'] As $ingredient) {
				$protein = $ingredient['protein'] * $ingredient['RecipeIngredient']['quantity'];
				$carbs = $ingredient['carbohydrates'] * $ingredient['RecipeIngredient']['quantity'];
				$fat = $ingredient['fat'] * $ingredient['RecipeIngredient']['quantity'];
				$fiber = $ingredient['fiber'] * $ingredient['RecipeIngredient']['quantity'];

				$results['Recipe']['pro_points'] += ( ( 16 * $protein ) + ( 19 * $carbs ) + ( 45 * $fat ) + ( 14 * $fiber ) ) / 175;
			}
			$results['Recipe']['pro_points'] = max(round($results['Recipe']['pro_points']), 0);
		} elseif(!empty($results[0]) && !empty($results[0]['Ingredient'])) {
			foreach($results As &$result) {
				$result['Recipe']['pro_points'] = 0;
				foreach($result['Ingredient'] As $ingredient) {
					$protein = $ingredient['protein'] * $ingredient['RecipeIngredient']['quantity'];
					$carbs = $ingredient['carbohydrates'] * $ingredient['RecipeIngredient']['quantity'];
					$fat = $ingredient['fat'] * $ingredient['RecipeIngredient']['quantity'];
					$fiber = $ingredient['fiber'] * $ingredient['RecipeIngredient']['quantity'];

					$result['Recipe']['pro_points'] += ( ( 16 * $protein ) + ( 19 * $carbs ) + ( 45 * $fat ) + ( 14 * $fiber ) ) / 175;
				}
				$result['Recipe']['pro_points'] = max(round($result['Recipe']['pro_points']), 0);
			}
		}

		return $results;
	}

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'recipe_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'servings' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'OriginalRecipe' => array(
			'className' => 'Recipe',
			'foreignKey' => 'recipe_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'MethodStep' => array(
			'className' => 'MethodStep',
			'foreignKey' => 'recipe_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
/*		'RecipeIngredient' => array(
			'className' => 'RecipeIngredient',
			'foreignKey' => 'recipe_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),*/
		'Recipe' => array(
			'className' => 'Recipe',
			'foreignKey' => 'recipe_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Ingredient' => array(
			'className' => 'Ingredient',
			'joinTable' => 'recipe_ingredients',
			'foreignKey' => 'recipe_id',
			'associationForeignKey' => 'ingredient_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
