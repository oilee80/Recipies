<?php
/**
 * Useage:
 * var $actsAs = array(
 *		'Enum' => array(
			'field_name' => array('database_field' => 'display_value', 'database_field' => 'display_value', ...)
		)
 * );
 */
class EnumBehavior extends ModelBehavior {
	var $_defaults = array(
	);

    function setup(&$Model, $config = array()) {
		if(empty($config['fields'])) {
			$config = array('fields' => $config);
		}
        $settings = array_merge($this->_defaults, $config);
        $this->settings[$Model->alias] = $settings;
	}

	function afterFind(&$Model, $results, $primary) {
		extract($this->settings[$Model->alias]);

		if(empty($results)) {
			return true;
		}

		if($primary) {
			foreach($results as $key => $result) {
				foreach($fields as $field => $values) {
					if(isset($result[$Model->alias][$field])) {
						$results[$key][$Model->alias][$field . '_text'] = $values[$result[$Model->alias][$field]];
					}
				}
			}
		} else {
			foreach($fields as $field => $values) {
				if(!empty($Model->_enum[$field]) && isset($results[$field])) {
					$results[$field . '_text'] = $values[$results[$field]];
				}
			}
		}

		return $results;
	}

	function getValues(&$Model, $field) {
		extract($this->settings[$Model->alias]);
		return $fields[$field];
	}

}
?>