<div class="recipes form">
<?php echo $this->Form->create('Recipe');?>
	<fieldset>
		<legend><?php echo __('Add Recipe'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('user_id');
		echo $this->Form->input('recipe_id');
		echo $this->Form->input('fork_date');
		echo $this->Form->input('servings');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Recipes'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Method Steps'), array('controller' => 'method_steps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Method Step'), array('controller' => 'method_steps', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipe Ingredients'), array('controller' => 'recipe_ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe Ingredient'), array('controller' => 'recipe_ingredients', 'action' => 'add')); ?> </li>
	</ul>
</div>
