<?php

/**
 * Blog / single
 *
 * @var \BcBlog\View\BlogFrontAppView $this
 */
?>
<article class="thumb">
  <?php
    $eyeCatchThumb = $this->Blog->getEyeCatch($post, ['link' => false, 'noimage' => '/img/nophoto.png']);
    $eyeCatch = $this->Blog->getEyeCatch($post, ['output' => 'url', 'noimage' => '/img/nophoto.png']);
    $eyeCatch = str_replace('__thumb.', '.', $eyeCatch);
    $this->BcBaser->link($eyeCatchThumb, $eyeCatch, ['class' => 'image', 'escape' => false]);
  ?>
  <h2><?php $this->Blog->postTitle($post, false) ?></h2>
  <?php $this->Blog->postContent($post, true, false) ?>
</article>
