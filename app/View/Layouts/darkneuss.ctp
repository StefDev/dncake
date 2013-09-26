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
  <?php echo $this->Html->meta(array("name" => "viewport", "content" => "width=device-width")); ?>
  <?php echo $this->Html->meta(array("name" => "robots", "content" => "noindex, nofollow")); ?>
	<title>
		<?php echo $title_for_layout; ?>
    &ndash; DARKNEuSS.de
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array("cake.generic", "darkneuss"));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<header role="banner">
			<h1><!-- <?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?> -->
        DARKNE<span class="opaque">u</span>SS<span class="opaque">.de</span><span class="beta">beta</span>        
        <span class="slogan">Metal <span class="lightblue">&dagger;</span> Gothic <span class="lightblue">&dagger;</span> Neuss</span>
      </h1>
      
      <?php echo $this->Navigation->main(); ?>

		</header>
		<div id="content"<?php if ($this->fetch("sidebar")) { echo " class=\"hasSidebar\""; } ?>>
    
      <h1>&mdash; <?php echo $title_for_layout; ?> &mdash;</h1>
      
      <?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
      
    </div>
    
    <!-- http://book.cakephp.org/2.0/en/views.html -->
    <?php if ($this->fetch("sidebar")): ?>
    <aside class="sidebar">
      <?php echo $this->fetch("sidebar"); ?>
    </aside>
    <?php endif; ?>

    <footer>
			<!-- <?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
      &middot; -->
      &middot;
      <?php echo $this->Html->link('Impressum', '/impressum'); ?>
      &middot;
      <?php echo $this->Html->link('Archiv', '/archiv', array('target' => '_blank')); ?>
      &middot;
		</footer>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
