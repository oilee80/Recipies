<div class="methodSteps view">
<h2><?php  echo __('Method Step');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($methodStep['MethodStep']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Recipe'); ?></dt>
		<dd>
			<?php echo $this->Html->link($methodStep['Recipe']['title'], array('controller' => 'recipes', 'action' => 'view', $methodStep['Recipe']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($methodStep['MethodStep']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($methodStep['MethodStep']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($methodStep['MethodStep']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($methodStep['MethodStep']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Method Step'), array('action' => 'edit', $methodStep['MethodStep']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Method Step'), array('action' => 'delete', $methodStep['MethodStep']['id']), null, __('Are you sure you want to delete # %s?', $methodStep['MethodStep']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Method Steps'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Method Step'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>
