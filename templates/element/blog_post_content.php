<?php
/**
 * ブログ記事コンテンツ
 *
 * BlogHelper::postContent より呼び出される
 *
 * @var \BaserCore\View\BcFrontAppView $this
 * @var bool $useContent
 * @var bool $moreText
 * @var \BcBlog\Model\Entity\BlogPost $post
 */
?>

<?php if($useContent): ?>
<?php echo $post->content ?>
<?php endif ?>
<?php if ($moreText && $post->detail): ?>
<?php echo $post->detail ?>
<?php endif ?>
