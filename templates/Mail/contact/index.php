<?php
/**
 * Mail / index
 *
 * @var \BcMail\View\MailFrontAppView $this
 */

$this->BcBaser->setTableToUpload('BcMail.MailMessages');
?>
<div<?php if (!$this->BcBaser->isHome()) : ?> style="margin: 0 auto;" <?php endif ?>>
	<section>
		<h2><?php $this->BcBaser->contentsTitle() ?></h2>
		<?php if ($freezed) : ?>
			<p><?php echo __('入力した内容に間違いがなければ「送信する」ボタンをクリックしてください。') ?></p>
		<?php endif ?>
		<?php $this->BcBaser->flash() ?>
		<?php $this->BcBaser->element('mail_form') ?>
	</section>
	</div>
