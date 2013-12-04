<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<!-- <?php echo $this->Html->charset(); ?> -->
  <meta charset="utf-8">
  <?php echo $this->Html->meta(array("name" => "viewport", "content" => "width=device-width, initial-scale=1")); ?>  
	<title><?php echo $title_for_layout; ?> &ndash; DARKNEuSS.de</title>
	<?php
    //echo $this->Html->meta('icon');
    
    // Meta Tags
    echo $this->fetch('meta');
    if (isset($description)) {
      echo $this->Html->meta(array("name" => "Description", "content" => $description));
    }
    
    if (isset($ogp)) {
      foreach ($ogp as $property => $content) {
        echo $this->Html->meta(array("property" => sprintf("og:%s", $property), "content" => $content));
      }
      // default values      
      echo $this->Html->meta(array("property" => "og:image", "content" => "http://darkneuss.de/img/fbdn.png"));
      echo $this->Html->meta(array("property" => "og:site_name", "content" => "DARKNEuSS.de"));
      echo $this->Html->meta(array("property" => "og:locale", "content" => "de_DE"));
      if (isset($description)) { echo $this->Html->meta(array("property" => "og:description", "content" => $description)); }
      // Twitter card
      echo $this->Html->meta(array("property" => "twitter:card", "content" => "summary"));
      echo $this->Html->meta(array("property" => "twitter:title", "content" => $ogp["title"]));
      if (isset($description)) { echo $this->Html->meta(array("property" => "twitter:description", "content" => $description)); }
      echo $this->Html->meta(array("property" => "twitter:image:src", "content" => "http://darkneuss.de/img/fbdn.png"));
      echo $this->Html->meta(array("property" => "twitter:domain", "content" => "darkneuss.de"));
    }

    // Cascading Style Sheets
		echo $this->fetch('css');
    echo $this->Html->css(array("cake.generic", "darkneuss"));

    // JavaScript		
		echo $this->fetch('script');    
	?>
  <!--[if lt IE 9]><?php echo $this->Html->css(array("ie")); ?><script src="http://devilschoice.de/javascript/html5shiv.js"></script><![endif]-->
</head>
<body>
  <?php if (isset($nw) && $nw) { ?>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/de_DE/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  </script>
  <?php } ?>
	<div id="container">
		<header role="banner">
			<h1>
        <a href="/news">darkne<span class="opaque">u</span>ss<span class="opaque">.de</span></a><span class="beta">beta</span>
        <span class="slogan">Metal <span class="lightblue">&dagger;</span> Gothic <span class="lightblue">&dagger;</span> Neuss</span>
      </h1>
      
      <?php echo $this->Navigation->main(); ?>

		</header>
		<div id="content"<?php if ($this->fetch("sidebar")) { echo " class=\"hasSidebar\""; } ?>>
    
      <h1>&mdash; <?php echo $title_for_layout; ?> &mdash;</h1>
      
      <?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
      
    </div>
    
    <?php if ($this->fetch("sidebar")): ?>
    <aside class="sidebar">
      <?php echo $this->fetch("sidebar"); ?>
    </aside>
    <?php endif; ?>

    <footer>
      -
      <?php echo $this->Html->link('Impressum', '/impressum', array('rel' => 'noindex')); ?>
      -
      <?php echo $this->Html->link('Festival', '/festival'); ?>
      -
      <?php echo $this->Html->link('Archiv', '/archiv', array('target' => '_blank')); ?>
      -
		</footer>
	</div>
	<?php echo $this->element('sql_dump'); ?>
  <?php if (Configure::read('debug') == 0) { ?>
  <!-- Piwik -->
  <script type="text/javascript"> 
    var _paq = _paq || [];
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
      var u=(("https:" == document.location.protocol) ? "https" : "http") + "://pwk.skww.de//";
      _paq.push(['setTrackerUrl', u+'piwik.php']);
      _paq.push(['setSiteId', 1]);
      var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
      g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();

  </script>
  <noscript><p><img src="http://pwk.skww.de/piwik.php?idsite=1" style="border:0" alt="" /></p></noscript>
  <!-- End Piwik Code -->
  <?php } ?>
</body>
</html>
