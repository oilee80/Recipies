<div class="ingredients index">
	<h2><?php echo __('Ingredients');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('ingredient');?></th>
			<th><?php echo $this->Paginator->sort('protein');?></th>
			<th><?php echo $this->Paginator->sort('carbohydrates');?></th>
			<th><?php echo $this->Paginator->sort('fiber');?></th>
			<th><?php echo $this->Paginator->sort('fat');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($ingredients as $ingredient): ?>
	<tr>
		<td><?php echo h($ingredient['Ingredient']['ingredient']); ?>&nbsp;</td>
		<td><?php echo h($ingredient['Ingredient']['protein']); ?>&nbsp;</td>
		<td><?php echo h($ingredient['Ingredient']['carbohydrates']); ?>&nbsp;</td>
		<td><?php echo h($ingredient['Ingredient']['fiber']); ?>&nbsp;</td>
		<td><?php echo h($ingredient['Ingredient']['fat']); ?>&nbsp;</td>
		<td><?php echo h($ingredient['Ingredient']['created']); ?>&nbsp;</td>
		<td><?php echo h($ingredient['Ingredient']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ingredient['Ingredient']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ingredient['Ingredient']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ingredient['Ingredient']['id']), null, __('Are you sure you want to delete "%s"?', $ingredient['Ingredient']['ingredient'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ingredient'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>
