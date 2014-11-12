<?php
// $Id: page.tpl.php,v 1.28.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">


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



<?php if($admin) { ?>
	<div id="admin">
	<?php print $admin; ?>
	</div>
<? } ?>


			
<div id="top_rounded"> </div>

<div id="wrapper">
			
	      <?php /*if ($mission) { ?><div id="mission"><?php print $mission ?></div><?php }*/ ?>		
			
				<?php print $header; ?>


			<div id="image-rotator">
					<img src="<?php print $base_path . $directory ?>/images/masthead1.jpg" style="width:880px; height:228px;" />
			</div>




<?php if($staff_menu) { ?>
<?php print $staff_menu; ?>
<? } ?>









<table id="content-wrapper-front" border="0" cellpadding="0" cellspacing="0" class="center">
  <tr>

    <td id="content-left" valign="top" align="left">

      <!--<div id="main">Homepage view (theme/using page-front.tpl.php)-->  
        <?php /*print $breadcrumb*/ ?>
        <!--<h1 class="title"><?php /*print $title*/ ?></h1>-->
        <div class="tabs"><?php print $tabs ?></div>
        <?php /*if ($show_messages) { print $messages; }*/ ?>
        <?php print $help ?>
        <?php print $content; ?>  
      <!--</div>-->
    </td>
    <td id="content_right" valign="top" align="right">
    	<?php print $content_right ?>
    </td>
    
  
  </tr>
	<!--<tr>
		<td colspan="2">

		</td>
	</tr>-->
</table>





</div><!-- end wrapper -->

<div id="footer">
  <?php print $footer_message ?>
  <?php print $footer ?>
</div>
<?php print $closure ?>


</body>
</html>
