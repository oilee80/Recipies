<?php
	$ret = array(
		'paginator' => $this->request->params['paging']['Ingredient'],
		'node' => 'Ingredient',
		'data' => $ingredients
	);
	echo json_encode($ret);
?>