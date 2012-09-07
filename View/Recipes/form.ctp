<div class="recipes form">
<?php echo $this->Form->create('Recipe');?>
	<fieldset>
		<legend><?php echo __('%s Recipe', ucwords($this->action)); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('user_id');
		echo $this->Form->input('recipe_id');
		echo $this->Form->input('fork_date', array('empty' => ''));
		echo $this->Form->input('servings');
	?>
	</fieldset>
	<fieldset class="recipeIngreients">
		<legend>Ingredients</legend>
		<table class="ingreientsList">
			<thead>
				<tr>
					<th>Amt.</th>
					<th>Meas.</th>
					<th>Ingredient</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($this->data['Ingredient'] As $i => $ingredient):?>
					<tr>
						<td><?= $this->Form->input('RecipeIngredient.' . $i . '.quantity', array('value' => +$ingredient['RecipeIngredient']['quantity'], 'label' => false)); ?></td>
						<td><?= $measures[$ingredient['measure']] ?></td>
						<td><?= $ingredient['name'] ?></td>
						<td></td>
					</tr>
				<?php endforeach; ?>
				<tr>
					<td><?= $this->Form->input('RecipeIngredient.' . ++$i . '.quantity', array('label' => false, 'placeholder' => 'Amount')); ?></td>
					<td id="RecipeIngredient<?= $i ?>Measure"></td>
					<td><?= $this->Form->input('RecipeIngredient.' . $i . '.ingredient', array('label' => false, 'placeholder' => 'Ingredient')); ?></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Recipes'), array('action' => 'index'));?></li>
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
