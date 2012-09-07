<div class="recipes index">
	<h2><?php echo __('Recipes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('recipe_id');?></th>
			<th><?php echo _('Pro Points');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($recipes as $recipe):?>
	<tr>
		<td><?php echo h($recipe['Recipe']['title']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($recipe['User']['full_name'], array('searchField' => 'user_id', 'searchValue' => $recipe['User']['id'])); ?>
		</td>
		<td><?php
			if(!empty($recipe['OriginalRecipe']['id'])) {
				echo $this->Html->link($recipe['OriginalRecipe']['title'], array('controller' => 'recipes', 'action' => 'view', $recipe['OriginalRecipe']['id']));
			}
		?></td>
		<td><?php echo h($recipe['Recipe']['pro_points']); ?>&nbsp;</td>
		<td><?php echo h($recipe['Recipe']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $recipe['Recipe']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $recipe['Recipe']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $recipe['Recipe']['id']), null, __('Are you sure you want to delete # %s?', $recipe['Recipe']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Recipe'), array('action' => 'add')); ?></li>
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
