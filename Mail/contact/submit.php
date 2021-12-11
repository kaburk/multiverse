<?php

/**
 * Mail / submit
 *
 * @var BcAppView $this
 */

if (Configure::read('debug') == 0 && $mailContent['MailContent']['redirect_url']) {
	$this->Html->meta(['http-equiv' => 'Refresh'], null, ['content' => '5;url=' . $mailContent['MailContent']['redirect_url'], 'inline' => false]);
}
?>
<div<?php if (!$this->BcBaser->isHome()) : ?> style="margin: 0 auto;" <?php endif ?>>
	<section>
		<h2><?php $this->BcBaser->contentsTitle() ?></h2>

		<?php $this->BcBaser->flash() ?>

		<h3><?php echo __('メール送信完了') ?></h3>
		<p><?php echo __('お問い合わせ頂きありがとうございました。') ?>
			<?php echo __('確認次第、ご連絡させて頂きます。') ?></p>
		<?php if (Configure::read('debug') == 0 && $mailContent['MailContent']['redirect_url']) : ?>
			<p>※<?php echo __('%s 秒後にトップページへ自動的に移動します。', 5) ?></p>
			<p><a href="<?php echo $mailContent['MailContent']['redirect_url']; ?>"><?php echo __('移動しない場合はコチラをクリックしてください。') ?></a></p>
		<?php endif; ?>
	</section>
	</div>
