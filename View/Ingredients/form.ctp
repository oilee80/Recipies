<div class="ingredients form">
<?php echo $this->Form->create('Ingredient');?>
	<fieldset>
		<legend><?php echo __('%s Ingredient', Inflector::humanize($this->view)); ?></legend>
	<?php
		echo $this->Form->input('ingredient');
		echo $this->Form->input('protein');
		echo $this->Form->input('carbohydrates');
		echo $this->Form->input('fiber');
		echo $this->Form->input('fat');
		echo $this->Form->input('type', array('options' => $types, 'empty' => '<Please Select>'));
		echo $this->Form->input('measure', array('options' => $measures, 'empty' => '<Please Select>'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ingredients'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>
