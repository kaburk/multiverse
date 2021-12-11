<?php

/**
 * Mail / unpublish
 *
 * @var BcAppView $this
 */
?>
<div<?php if (!$this->BcBaser->isHome()) : ?> style="margin: 0 auto;" <?php endif ?>>
	<section>
		<h2><?php $this->BcBaser->contentsTitle() ?></h2>

		<?php $this->BcBaser->flash() ?>

		<h3><?php echo __('受付中止') ?></h3>
		<p><?php echo __('現在、受付を中止しています。') ?></p>
	</section>
	</div>
