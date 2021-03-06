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
<html prefix="og: http://ogp.me/ns#">
<head>
	<!-- <?php echo $this->Html->charset(); ?> -->
  <meta charset="utf-8">
  <?php echo $this->Html->meta(array("name" => "viewport", "content" => "width=device-width, initial-scale=1")); ?>
  <?php echo $this->Html->meta(array("name" => "google-site-verification", "content" => "9exXgcVkPy6Q0i4Q5NdLdL7IxCYhjiql0Uovwu6kX9o")); ?>
	<title><?php echo $title_for_layout; ?> &ndash; DARKNEuSS.de</title>
	<?php
    //echo $this->Html->meta('icon');
    
    // Meta Tags
    echo $this->fetch('meta');

    if (isset($description)) {
      echo $this->Html->meta(array("name" => "description", "content" => $description));
    }

    if (isset($ogp)) {
      foreach ($ogp as $property => $content) {
        echo $this->Html->meta(array("property" => sprintf("og:%s", $property), "content" => $content));
      }
      // default values
      echo $this->Html->meta(array("property" => "og:site_name", "content" => "DARKNEuSS.de"));
      echo $this->Html->meta(array("property" => "og:locale", "content" => "de_DE"));
      if (isset($description)) { echo $this->Html->meta(array("property" => "og:description", "content" => $description)); }
      // Twitter card - https://dev.twitter.com/docs/cards/getting-started#open-graph
      echo $this->Html->meta(array("name" => "twitter:card", "content" => "summary"));
      echo $this->Html->meta(array("name" => "twitter:site", "content" => "@DARKNEuSSde"));
      echo $this->Html->meta(array("name" => "twitter:domain", "content" => "darkneuss.de"));
      echo $this->Html->meta(array("name" => "twitter:creator", "content" => "@StefKrie"));
    }

    // Cascading Style Sheets
		echo $this->Html->css(array("cake.generic", "darkneuss"));
    echo $this->fetch('css');
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
        <a href="/news">darkne<span class="opaque">u</span>ss<span class="opaque">.de</span></a>
        <span class="slogan">Mettel<span class="lightblue dagger">&dagger;</span><br> Jossik <span class="lightblue dagger">&dagger;</span><br> N�ss</span>
      </h1>
      
      <?php echo $this->Navigation->main(); ?>

		</header>
		<div id="content"<?php if(isset($schema_type)) { echo " itemscope itemtype=\"http://schema.org/$schema_type\""; } ?><?php if ($this->fetch("sidebar")) { echo " class=\"hasSidebar\""; } ?>>
    
      <h1 itemprop="name"><span class="lightblue">&mdash;</span> <?php echo $title_for_layout; ?> <span class="lightblue">&mdash;</span></h1>
      
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
      <?php echo $this->Html->link('Bands', '/bands'); ?>
      -
      <?php echo $this->Html->link('Karte', '/locations/karte'); ?>
      -
      <?php echo $this->Html->link('Facebook', 'http://www.facebook.com/darkneuss.de'); ?>
      -
      <?php echo $this->Html->link('Festival', '/festival'); ?>
      -
      <?php echo $this->Html->link('Fotoalbum', 'http://picasaweb.google.com/darkneuss', array('target' => '_blank')); ?>
      -
      <?php echo $this->Html->link('Archiv', '/archiv', array('target' => '_blank')); ?>
      -
      <?php echo $this->Html->link('Impressum', '/impressum', array('rel' => 'noindex')); ?>
      -
		</footer>
	</div>
	<?php echo $this->element('sql_dump'); ?>
  <?php echo $this->fetch('script'); ?>
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
