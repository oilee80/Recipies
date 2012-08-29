<div class="recipeIngredients view">
<h2><?php  echo __('Recipe Ingredient');?></h2>
	<dl>
		<dt><?php echo __('Recipe'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipeIngredient['Recipe']['title'], array('controller' => 'recipes', 'action' => 'view', $recipeIngredient['Recipe']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ingredient'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipeIngredient['Ingredient']['id'], array('controller' => 'ingredients', 'action' => 'view', $recipeIngredient['Ingredient']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($recipeIngredient['RecipeIngredient']['quantity']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Recipe Ingredient'), array('action' => 'edit', $recipeIngredient['RecipeIngredient']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Recipe Ingredient'), array('action' => 'delete', $recipeIngredient['RecipeIngredient']['id']), null, __('Are you sure you want to delete # %s?', $recipeIngredient['RecipeIngredient']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipe Ingredients'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe Ingredient'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('controller' => 'ingredients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('controller' => 'ingredients', 'action' => 'add')); ?> </li>
	</ul>
</div>
