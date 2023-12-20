<?php
/**
 * Mail / submit
 *
 * @var \BcMail\View\MailFrontAppView $this
 */

if ($this->BcBaser->isDebug() && $mailContent->redirect_url) {
	$this->Html->meta(['http-equiv' => 'Refresh'], null, ['content' => '5;url=' . $mailContent->redirect_url, 'inline' => false]);
}
?>
<div<?php if (!$this->BcBaser->isHome()) : ?> style="margin: 0 auto;" <?php endif ?>>
	<section>
		<h2><?php $this->BcBaser->contentsTitle() ?></h2>

		<?php $this->BcBaser->flash() ?>

		<h3><?php echo __d('baser_core', 'メール送信完了') ?></h3>
		<p><?php echo __d('baser_core', 'お問い合わせ頂きありがとうございました。') ?>
			<?php echo __d('baser_core', '確認次第、ご連絡させて頂きます。') ?></p>
		<?php if ($this->BcBaser->isDebug() && $mailContent->redirect_url) : ?>
			<p>※<?php echo __d('baser_core', '{0} 秒後にトップページへ自動的に移動します。', 5) ?></p>
			<p><a href="<?php echo $mailContent->redirect_url; ?>"><?php echo __d('baser_core', '移動しない場合はコチラをクリックしてください。') ?></a></p>
		<?php endif; ?>
	</section>
	</div>
