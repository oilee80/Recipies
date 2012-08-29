<div class="recipeIngredients form">
<?php echo $this->Form->create('RecipeIngredient');?>
	<fieldset>
		<legend><?php echo __('Edit Recipe Ingredient'); ?></legend>
	<?php
		echo $this->Form->input('recipe_id');
		echo $this->Form->input('ingredient_id');
		echo $this->Form->input('quantity');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RecipeIngredient.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('RecipeIngredient.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Recipe Ingredients'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('controller' => 'ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
	</ul>
</div>
