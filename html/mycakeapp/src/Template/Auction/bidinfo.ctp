<h2>「<?= $biditem->name ?>」の情報</h2>
<?= $this->Form->create($bidinfo) ?>
<fieldset>
	<!-- もしbiditemsのfinishedが1なら -->
	<?php if ($biditem->finished == 1): ?>
	<?php
	echo $this->Form->hidden('biditem_id', ['value' => $biditem['id']]);
	echo $this->Form->hidden('user_id', ['value' => $authuser['id']]);
	echo $this->Form->hidden('price',['value' => $bidrequest['price']]);
	echo $this->Form->control('buyer_name', ['type' => 'textarea']);
	echo $this->Form->control('buyer_address', ['type' => 'textarea']);
	echo $this->Form->control('buyer_tel', ['type' => 'textarea']);
	echo $this->Form->hidden('status', ['value' => 0]);	
	?>
	<?php endif ;?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
