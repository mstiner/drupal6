<?php
// $Id: page.tpl.php,v 1.28.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
		<?php print $head ?>
		<title><?php print $head_title ?></title>
		<?php print $styles ?>
		<?php print $scripts ?>
		<script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
	</head>

<body>


<div id="masthead">
<div class="content">
<div id="searchbox"><?php print $search_box ?>
</div>
</div>
</div>
		<!--	<div id="header">

			</div>-->

<div id="top_rounded"> </div>

<div id="wrapper">

<?php

/*

    <!--<td id="logo">
      <?php if ($logo) { ?><a href="<?php print $front_page ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo ?>" alt="<?php print t('Home') ?>" /></a><?php } ?>
      <?php if ($site_name) { ?><h1 class='site-name'><a href="<?php print $front_page ?>" title="<?php print t('Home') ?>"><?php print $site_name ?></a></h1><?php } ?>
      <?php if ($site_slogan) { ?><div class='site-slogan'><?php print $site_slogan ?></div><?php } ?>
    </td>
    <td id="menu">
      <?php if (isset($secondary_links)) { ?><?php print theme('links', $secondary_links, array('class' => 'links', 'id' => 'subnavlist')) ?><?php } ?>
      <?php if (isset($primary_links)) { ?><?php print theme('links', $primary_links, array('class' => 'links', 'id' => 'navlist')) ?><?php } ?>
      <?php print $search_box ?>
    </td>-->


   */
?>








				<?php print $header; ?>



				<span style="width:25px;">
					<?php print $feed_icons; ?>
				</span>

	<?php global $user; $logged_in = ($user->uid > 0) ? TRUE : FALSE; if(!empty($masthead) && !$logged_in) { ?>
	

	<div id="image-rotator">

					<img src="<?php print $base_path . $directory ."/images/panoramics/".$masthead ?>.jpg" style="width:880px; height:228px;" />
	
			</div>
	<?php } ?>






<?php if($admin) { ?>
	<div id="admin">
	<?php print $admin; ?>
	</div>
<? } ?>




<?php if($staff_menu) { ?>
<?php print $staff_menu; ?>
<? } ?>





<div id="content">
	<?php if($above_content) { ?>
	<?php print $above_content; ?>
	<? } ?>
      <?php if ($mission) { ?><div id="mission"><?php print $mission ?></div><?php } ?>
        <?php if($logged_in) print $breadcrumb ?>
        <h1 class="title" ><?php print $title ?></h1>

        
        <div class="tabs" ><?php print $tabs ?></div>
        <?php if ($show_messages) { print $messages; } ?>
        <?php print $help ?>
        
   <?php if($right_sidebar) { ?>
   	<div style="width:190px; float:right; padding-left:15px;">
		<?php print $right_sidebar ?>
		</div>
	<?php } ?>
        
      <p><a href="https://developers.google.com/youtube/iframe_api_reference">YouTube API Reference</a></p>  
<!-- 1. The <iframe> (and video player) will replace this <div> tag. -->

<!--<iframe width="560" height="315" src="https://www.youtube.com/embed/s4hzBbE8gTM" frameborder="0" allowfullscreen></iframe>-->

        <?php 
        print $content;
        ?>

</div>



</div><!-- end wrapper -->

<div id="footer">
  <?php print $footer_message ?>
  <?php print $footer ?>
</div>
<?php print $closure ?>

</body>
</html>
