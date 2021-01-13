<h2>「<?= $biditem->name ?>」の情報</h2>
<table class="vertical-table">
	<tr>
		<th class="small" scope="row">出品者</th>
		<td><?= $biditem->has('user') ? $biditem->user->username : '' ?></td>
	</tr>
	<tr>
		<th scope="row">商品名</th>
		<td><?= h($biditem->name) ?></td>
	</tr>
	<tr>
		<th scope="row">商品詳細情報</th>
		<td><?= nl2br(h($biditem->iteminfo)) ?></td>
	</tr>
	<tr>
		<th scope="row">商品画像</th>
		<td><?= $this->Html->image('/img/auction/' . $biditem->image_name) ?></td>
	</tr>
	<tr>
		<th scope="row">商品ID</th>
		<td><?= $this->Number->format($biditem->id) ?></td>
	</tr>
	<tr>
		<th scope="row">投稿時間</th>
		<td><?= h($biditem->created) ?></td>
	</tr>
	<tr>
		<th scope="row"><?= __('終了した？') ?></th>
		<td><?= $biditem->finished ? __('Yes') : __('No'); ?></td>
	</tr>
				<!-- タイマー -->
				<?php
			$date1 = new DateTime(); //現在時刻
			$end_time  = new DateTime($biditem->endtime); //終了時間
			$interval = $end_time->diff($date1); //差分
			$finished = $interval->invert; //0=終了済み,1= 落札可能
			if ($finished === 1) { //もし終了していなければ
				$dif_time_str = $interval->d * 24 * 60 * 60 + +$interval->h * 60 * 60 + $interval->i * 60 + $interval->s; //秒に変換
				$dif_time = intval($dif_time_str); //string型からint型に変換
			} else {
				$dif_time = 0;
			}
			?>
</table>
<!-- タイマー表示箇所 -->
<h4>COUNT DOWN TIMER</h4>
<?php echo $this->Html->tag('span', '', array('id' => 'timer'));?>
<br>
<div class="related">
	<h4><?= __('落札情報') ?></h4>
	<?php if (!empty($biditem->bidinfo)) : ?>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<th scope="col">落札者</th>
				<th scope="col">落札金額</th>
				<th scope="col">落札日時</th>
			</tr>
			<tr>
				<td><?= h($biditem->bidinfo->user->username) ?></td>
				<td><?= h($biditem->bidinfo->price) ?>円</td>
				<td><?= h($biditem->endtime) ?></td>
			</tr>

		</table>
	<?php else : ?>
		<p><?= '※落札情報は、ありません。' ?></p>
	<?php endif; ?>
</div>
<div class="related">
	<h4><?= __('入札情報') ?></h4>
	<?php if (!$biditem->finished) : ?>
		<h6><a href="<?= $this->Url->build(['action' => 'bid', $biditem->id]) ?>">《入札する！》</a></h6>
		<?php if (!empty($bidrequests)) : ?>
			<table cellpadding="0" cellspacing="0">
				<thead>
					<tr>
						<th scope="col">入札者</th>
						<th scope="col">金額</th>
						<th scope="col">入札日時</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($bidrequests as $bidrequest) : ?>
						<tr>
							<td><?= h($bidrequest->user->username) ?></td>
							<td><?= h($bidrequest->price) ?>円</td>
							<td><?= $bidrequest->created ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
		<?php else : ?>
			<p><?= '※入札は、まだありません。' ?></p>
		<?php endif; ?>
	<?php else : ?>
		<p><?= '※入札は、終了しました。' ?></p>
	<?php endif; ?>
</div>
<!-- javascriptへ変数を渡す -->
<script type="text/javascript">
    const dif_time = <?php echo $dif_time ?>; //残り時間(秒)
</script>
<!-- javascript読み込み -->
<?= $this->Html->script('index.js'); ?>
