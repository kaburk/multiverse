<?php
/**
 * Mail / Elements / mail_form
 *
 * @var \BcMail\View\MailFrontAppView $this
 */
$this->Mail->token();
$this->BcBaser->js('BcMail.form-submit', true, ['defer']);
?>

<?php if (!$freezed): ?>
  <?php echo $this->BcBaser->createMailForm($mailMessage, ['url' => $this->BcBaser->getContentsUrl(null, false, null, false) . 'confirm', 'type' => 'file', 'valueSources' => ['context']]) ?>
<?php else: ?>
  <?php echo $this->BcBaser->createMailForm($mailMessage, ['url' => $this->BcBaser->getContentsUrl(null, false, null, false)  . 'submit', 'valueSources' => ['context']]) ?>
<?php endif; ?>

<?php $this->BcBaser->unlockMailFormField('mode') ?>
<?php echo $this->BcBaser->mailFormHidden('mode', ['id' => 'MailMessageMode']) ?>

<div class="fields">
  <?php $this->BcBaser->element('mail_input', ['blockStart' => 1]) ?>
</div>

<?php if ($mailContent->auth_captcha): ?>
	<?php $this->BcBaser->mailFormAuthCaptcha('auth_captcha', ['helper' => $this->BcBaser]) ?>
<?php endif ?>

<ul class="actions">
	<?php if ($freezed) : ?>
		<li><?php echo $this->BcBaser->mailFormSubmit('back', ['div' => false, 'class' => 'form-submit', 'id' => 'BtnMessageBack']) ?>
		<li><?php echo $this->BcBaser->mailFormSubmit('Send', ['div' => false, 'class' => 'primary form-submit', 'id' => 'BtnMessageSubmit']) ?>
		<?php else : ?>
		<li><input type="reset" value="Reset"></li>
		<li><?php echo $this->BcBaser->mailFormSubmit('Confirm', ['div' => false, 'class' => 'primary form-submit', 'id' => 'BtnMessageConfirm']) ?></li>
	<?php endif; ?>
</ul>

<?php echo $this->BcBaser->endMailForm() ?>
