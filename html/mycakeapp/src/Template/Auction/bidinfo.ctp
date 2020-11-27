<?php

use function PHPSTORM_META\type;
?>
<h2>お取引画面</h2>
<?= $this->Form->create($bidinfo, ['type' => 'post', 'url' => ['controller' => 'Auction', 'action' => 'bidinfo']]) ?>
<fieldset>
	<!-- 落札者 -->
	<?php if ($bidinfo->status == 0 && $authuser['id'] == $bidinfo->user_id) : ?>
		<h5>発送先住所</h5>
		<?php
		echo $this->Form->control('buyer_name', ['type' => 'textarea']);
		echo $this->Form->control('buyer_address', ['type' => 'textarea']);
		echo $this->Form->control('buyer_tel', ['type' => 'textarea']);
		?>
		<?= $this->Form->button(__('入力')) ?>
		<!-- 出品者 -->
	<?php elseif ($bidinfo->status == 0 && $authuser['id'] != $bidinfo->user_id) : ?>
		<h5>発送先住所</h5>
		<p>※連絡先が入力されるまで少々お待ちください</p>
		<table class="vertical-table">
			<tr>
				<th scope="row">お届け先氏名</th>
				<td><?= h($bidinfo->buyer_name) ?></td>
			</tr>
			<tr>
				<th scope="row">お届け先住所</th>
				<td><?= h($bidinfo->buyer_address) ?></td>
			</tr>
			<tr>
				<th scope="row">落札者電話番号</th>
				<td><?= h($bidinfo->buyer_tel) ?></td>
			</tr>
		</table>
	<?php endif; ?>
	<!-- 住所入力後の画面(両者) -->
	<?php if ($bidinfo->status == 1) : ?>
		<h5>発送先住所</h5>
		<table class="vertical-table">
			<tr>
				<th scope="row">お届け先氏名</th>
				<td><?= h($bidinfo->buyer_name) ?></td>
			</tr>
			<tr>
				<th scope="row">お届け先住所</th>
				<td><?= h($bidinfo->buyer_address) ?></td>
			</tr>
			<tr>
				<th scope="row">落札者電話番号</th>
				<td><?= h($bidinfo->buyer_tel) ?></td>
			</tr>
		</table>
	<?php endif; ?>

	<!-- 出品者 -->
	<!-- statusが0=落札済み、未発送でユーザーが出品者なら -->
	<?php if ($bidinfo->status == 1 && $authuser['id'] != $bidinfo->user_id) : ?>
		<h5>発送連絡</h5>
		<p><?= __('発送した？') ?></p>
		<?php echo $this->Form->button('status', ['type' => 'post', 'value' => 2]); ?>
		<!-- statusが落札済み、発済みでユーザーが出品者なら -->
	<?php elseif ($bidinfo->status == 2 && $authuser['id'] != $bidinfo->user_id) : ?>
		<h5>発送連絡</h5>
		<p>※受け取りをお待ちください</p>
		<!-- 落札者	 -->
		<!-- statusが落札済み、未発送でユーザーが落札者なら -->
	<?php elseif ($bidinfo->status == 1 && $authuser['id'] == $bidinfo->user_id) : ?>
		<h5>発送連絡</h5>
		<p>※発送をお待ちください</p>
		<!-- statusが落札済み、発送済みでユーザーが落札者でなら -->
	<?php elseif ($bidinfo->status == 2 && $authuser['id'] == $bidinfo->user_id) : ?>
		<h5>発送連絡</h5>
		<p>※商品が発送されました。</p>
	<?php endif; ?>

	<!-- 落札者 -->
	<!-- statusが2=発送済み、未受け取りでユーザーが落札者でならば -->
	<?php if ($bidinfo->status == 2 && $authuser['id'] == $bidinfo->user_id) : ?>
		<h5>受け取り連絡</h5>
		<p><?= __('受け取った？') ?></p>
		<?php echo $this->Form->button('status', ['type' => 'post',  'value' => 3]); ?>

		<!-- statusが発送済み、受け済みでユーザーが落札者でならば -->
	<?php elseif ($bidinfo->status == 3 && $authuser['id'] == $bidinfo->user_id) : ?>
		<p>※評価をしてください</p>

		<!-- 出品者	 -->
		<!-- statusが2=発送済み、未受け取りでユーザーが出品者でなら -->
	<?php elseif ($bidinfo->status == 2 && $authuser['id'] != $bidinfo->user_id) : ?>
		<h5>受け取り連絡</h5>
		<p>※受け取り完了をお待ちください</p>
		<!-- statusが発送済み、受け取り済みでユーザーが出品者でなら -->
	<?php elseif ($bidinfo->status == 3 && $authuser['id'] != $bidinfo->user_id) : ?>
		<p>※商品が受け取られました。評価に進んでください</p>
	<?php endif; ?>

</fieldset>
<?= $this->Form->end() ?>
