<div class="recipes view">
<h2><?php  echo __('Recipe');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipe['User']['id'], array('controller' => 'users', 'action' => 'view', $recipe['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recipe'); ?></dt>
		<dd>
			<?php echo $this->Html->link($recipe['Recipe']['title'], array('controller' => 'recipes', 'action' => 'view', $recipe['Recipe']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fork Date'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['fork_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Servings'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['servings']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($recipe['Recipe']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Recipe'), array('action' => 'edit', $recipe['Recipe']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Recipe'), array('action' => 'delete', $recipe['Recipe']['id']), null, __('Are you sure you want to delete # %s?', $recipe['Recipe']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Method Steps');?></h3>
	<?php if (!empty($recipe['MethodStep'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Recipe Id'); ?></th>
		<th><?php echo __('Order'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($recipe['MethodStep'] as $methodStep): ?>
		<tr>
			<td><?php echo $methodStep['id'];?></td>
			<td><?php echo $methodStep['recipe_id'];?></td>
			<td><?php echo $methodStep['order'];?></td>
			<td><?php echo $methodStep['description'];?></td>
			<td><?php echo $methodStep['created'];?></td>
			<td><?php echo $methodStep['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'method_steps', 'action' => 'view', $methodStep['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'method_steps', 'action' => 'edit', $methodStep['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'method_steps', 'action' => 'delete', $methodStep['id']), null, __('Are you sure you want to delete # %s?', $methodStep['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Method Step'), array('controller' => 'method_steps', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Recipe Ingredients');?></h3>
	<?php if (!empty($recipe['RecipeIngredient'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Recipe Id'); ?></th>
		<th><?php echo __('Ingredient Id'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($recipe['RecipeIngredient'] as $recipeIngredient): ?>
		<tr>
			<td><?php echo $recipeIngredient['recipe_id'];?></td>
			<td><?php echo $recipeIngredient['ingredient_id'];?></td>
			<td><?php echo $recipeIngredient['quantity'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'recipe_ingredients', 'action' => 'view', $recipeIngredient['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'recipe_ingredients', 'action' => 'edit', $recipeIngredient['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'recipe_ingredients', 'action' => 'delete', $recipeIngredient['id']), null, __('Are you sure you want to delete # %s?', $recipeIngredient['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Recipe Ingredient'), array('controller' => 'recipe_ingredients', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Recipes');?></h3>
	<?php if (!empty($recipe['Recipe'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Recipe Id'); ?></th>
		<th><?php echo __('Fork Date'); ?></th>
		<th><?php echo __('Servings'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($recipe['Recipe'] as $recipe): ?>
		<tr>
			<td><?php echo $recipe['id'];?></td>
			<td><?php echo $recipe['title'];?></td>
			<td><?php echo $recipe['description'];?></td>
			<td><?php echo $recipe['user_id'];?></td>
			<td><?php echo $recipe['recipe_id'];?></td>
			<td><?php echo $recipe['fork_date'];?></td>
			<td><?php echo $recipe['servings'];?></td>
			<td><?php echo $recipe['created'];?></td>
			<td><?php echo $recipe['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'recipes', 'action' => 'view', $recipe['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'recipes', 'action' => 'edit', $recipe['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'recipes', 'action' => 'delete', $recipe['id']), null, __('Are you sure you want to delete # %s?', $recipe['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
