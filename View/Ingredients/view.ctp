<div class="ingredients view">
<h2><?php  echo __('Ingredient');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ingredient'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['ingredient']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Protein'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['protein']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Carbohydrates'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['carbohydrates']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fiber'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['fiber']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fat'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['fat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($ingredient['Ingredient']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ingredient'), array('action' => 'edit', $ingredient['Ingredient']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ingredient'), array('action' => 'delete', $ingredient['Ingredient']['id']), null, __('Are you sure you want to delete # %s?', $ingredient['Ingredient']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ingredients'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ingredient'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Recipes');?></h3>
	<?php if (!empty($ingredient['Recipe'])):?>
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
		foreach ($ingredient['Recipe'] as $recipe): ?>
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
