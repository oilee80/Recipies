<div class="methodSteps form">
<?php echo $this->Form->create('MethodStep');?>
	<fieldset>
		<legend><?php echo __('Add Method Step'); ?></legend>
	<?php
		echo $this->Form->input('recipe_id');
		echo $this->Form->input('order');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Method Steps'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Recipes'), array('controller' => 'recipes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Recipe'), array('controller' => 'recipes', 'action' => 'add')); ?> </li>
	</ul>
</div>
