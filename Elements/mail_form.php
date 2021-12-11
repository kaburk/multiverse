<?php

/**
 * Mail / Elements / mail_form
 *
 * @var BcAppView $this
 */

$this->BcBaser->js('mail/form-submit', true, ['defer'])
?>

<?php if (!$freezed) : ?>
	<?php echo $this->Mailform->create('MailMessage', ['url' => $this->BcBaser->getContentsUrl(null, false, null, false) . 'confirm', 'type' => 'file']) ?>
<?php else : ?>
	<?php echo $this->Mailform->create('MailMessage', ['url' => $this->BcBaser->getContentsUrl(null, false, null, false) . 'submit']) ?>
<?php endif; ?>

<?php $this->Mailform->unlockField('MailMessage.mode') ?>
<?php echo $this->Mailform->hidden('MailMessage.mode') ?>

<div class="fields">
	<?php $this->BcBaser->element('mail_input', ['blockStart' => 1]) ?>
</div>

<?php if ($mailContent['MailContent']['auth_captcha']) : ?>
	<?php if (!$freezed) : ?>
		<div class="bs-mail-form-auth-captcha">
			<div><?php echo $this->Mailform->authCaptcha('MailMessage.auth_captcha') ?></div>
			<div><?php echo __('画像の文字を入力してください') ?></div>
			<?php echo $this->Mailform->error('MailMessage.auth_captcha', __('入力された文字が間違っています。入力をやり直してください。')) ?>
		</div>
	<?php else : ?>
		<?php echo $this->Mailform->hidden('MailMessage.auth_captcha') ?>
		<?php echo $this->Mailform->hidden('MailMessage.captcha_id') ?>
	<?php endif ?>
<?php endif ?>

<ul class="actions">
	<?php if ($freezed) : ?>
		<li><?php echo $this->Mailform->submit('back', ['div' => false, 'class' => 'form-submit', 'id' => 'BtnMessageBack']) ?>
		<li><?php echo $this->Mailform->submit('Send', ['div' => false, 'class' => 'primary form-submit', 'id' => 'BtnMessageSubmit']) ?>
		<?php else : ?>
		<li><input type="reset" value="Reset"></li>
		<li><?php echo $this->Mailform->submit('Confirm', ['div' => false, 'class' => 'primary form-submit', 'id' => 'BtnMessageConfirm']) ?></li>
	<?php endif; ?>
</ul>

<?php echo $this->Mailform->end() ?>
