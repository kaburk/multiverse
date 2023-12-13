<?php
/**
 * @var \BaserCore\View\BcFrontAppView $this
 */
use BaserCore\Utility\BcSiteConfig;

$siteConfig['name'] = BcSiteConfig::get('name');
$siteConfig['description'] = BcSiteConfig::get('description');
?>
<!DOCTYPE HTML>
<!--
  Multiverse by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>

<head>
  <?php $this->BcBaser->title() ?>
  <?php $this->BcBaser->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <?php $this->BcBaser->css(['main']); ?>
  <noscript><?php $this->BcBaser->css(['noscript']); ?></noscript>
  <?php $this->BcBaser->googleAnalytics() ?>
</head>

<body class="is-preload">

  <!-- Wrapper -->
  <div id="wrapper">

    <!-- Header -->
    <header id="header">
      <h1>
        <?php echo $this->BcBaser->link($siteConfig['name'], '/') ?>
      </h1>
      <nav>
        <ul>
          <li><a href="#footer" class="icon solid fa-info-circle">About</a></li>
        </ul>
      </nav>
    </header>

    <!-- Main -->
    <div id="main">
      <?php
      if ($this->BcBaser->isHome()) :
        $this->BcBaser->blogPosts('photos', 999);
      else :
        $this->BcBaser->content();
      endif;
      ?>
    </div>

    <!-- Footer -->
    <footer id="footer" class="panel">
      <div class="inner split">
        <div>
          <section>
            <h2><?php echo $siteConfig['name'] ?></h2>
            <p><?php echo $siteConfig['description'] ?></p>
          </section>
          <section>
            <h2>Follow me on ...</h2>
            <ul class="icons">
              <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
              <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
              <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
              <li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
              <li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a></li>
              <li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
            </ul>
          </section>
          <p class="copyright">
            &copy; <?php echo $this->BcBaser->link($siteConfig['name'], '/') ?>.<br>
            &copy; Unttled. Design: <a href="http://html5up.net">HTML5 UP</a>.<br>
          </p>
        </div>
        <?php
          $this->Mail = new BcMail\View\Helper\MailHelper($this);
          echo $this->Mail->getForm(1);
        ?>
      </div>
    </footer>

  </div>

  <!-- Scripts -->
  <?php $this->BcBaser->js([
    'jquery.min',
    'jquery.poptrox.min',
    'browser.min',
    'breakpoints.min',
    'util',
    'main',
  ]);
  ?>
  <?php $this->BcBaser->scripts() ?>
  <?php $this->BcBaser->func() ?>

</body>

</html>
