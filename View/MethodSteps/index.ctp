<div class="methodSteps index">
	<h2><?php echo __('Method Steps');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('recipe_id');?></th>
			<th><?php echo $this->Paginator->sort('order');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($methodSteps as $methodStep): ?>
	<tr>
		<td><?php echo h($methodStep['MethodStep']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($methodStep['Recipe']['title'], array('controller' => 'recipes', 'action' => 'view', $methodStep['Recipe']['id'])); ?>
		</td>
		<td><?php echo h($methodStep['MethodStep']['order']); ?>&nbsp;</td>
		<td><?php echo h($methodStep['MethodStep']['description']); ?>&nbsp;</td>
		<td><?php echo h($methodStep['MethodStep']['created']); ?>&nbsp;</td>
		<td><?php echo h($methodStep['MethodStep']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $methodStep['MethodStep']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $methodStep['MethodStep']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $methodStep['MethodStep']['id']), null, __('Are you sure you want to delete # %s?', $methodStep['MethodStep']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Method Step'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>
