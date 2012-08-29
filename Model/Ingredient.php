<?php
App::uses('AppModel', 'Model');
/**
 * Ingredient Model
 *
 * @property Recipe $Recipe
 */
class Ingredient extends AppModel {

	public $actsAs = array(
		'Enum' => array(
			'measure' => array('weight(g)', 'volume(ml)'),
			'type' => array(
				'Unknown',
				'Fats and Sugars',
				'Breads, Crispbreads, Cereals, Potatoes, Rice and Pasta',
				'Fruit and Vegetables',
				'Meat, Poultry, Fish and Shellfish',
				'Milk, Cheese, Yogurt, Eggs, Beans, Nuts and Lentils'
			)
		)
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ingredient' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
			)
		),
		'type' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
			)
		),
		'measure' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
			)
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Recipe' => array(
			'className' => 'Recipe',
			'joinTable' => 'recipe_ingredients',
			'foreignKey' => 'ingredient_id',
			'associationForeignKey' => 'recipe_id',
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
