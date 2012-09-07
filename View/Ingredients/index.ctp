<div class="ingredients index">
	<h2><?php echo __('Ingredients');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?= $this->Paginator->sort('name');?></th>
			<th><?= $this->Paginator->sort('pro_points', __('Pro Points per 100'));?></th>
			<th><?= $this->Paginator->sort('points_per_serving') . ' (' . __('amount') . ')' ?></th>
			<th><?= $this->Paginator->sort('calculate_pro_points', __('Calculated'));?></th>
			<th><?= $this->Paginator->sort('measure');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($ingredients as $ingredient):?>
	<tr>
		<td><?= h($ingredient['Ingredient']['name']); ?>&nbsp;</td>
		<td><?= h($ingredient['Ingredient']['pro_points'] * 100); ?>&nbsp;</td>
		<td><?= +$ingredient['Ingredient']['points_per_serving']; ?> (<?= +$ingredient['Ingredient']['serving_size'] ?>)</td>
		<td><?= ($ingredient['Ingredient']['calculate_pro_points']) ? __('Yes') : __('No'); ?>&nbsp;</td>
		<td><?= h($ingredient['Ingredient']['measure_text']); ?>&nbsp;</td>
		<td class="actions">
			<?= $this->Html->link(__('View'), array('action' => 'view', $ingredient['Ingredient']['id'])); ?>
			<?= $this->Html->link(__('Edit'), array('action' => 'edit', $ingredient['Ingredient']['id'])); ?>
			<?= $this->Form->postLink(__('Delete'), array('action' => 'delete', $ingredient['Ingredient']['id']), null, __('Are you sure you want to delete "%s"?', $ingredient['Ingredient']['name'])); ?>
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
