<?php
// $Id: page.tpl.php,v 1.28.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">


<head>
  <?php print $head ?>
  <title><?php print $head_title ?></title>
  <?php print $styles ?>
  <?php print $scripts ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
</head>

<body style="margin-top:15px; margin-left:15px;background-color:#fffce9;background-image:url('images/ckeditor_background.gif');background-repeat:repeat;">


<?php if($admin) { ?>
	<div id="admin">
	<?php print $admin; ?>
	</div>
<? } ?>

<div id="masthead" style="float:left; width:100%; margin-bottom:5px;">
<div class="content">
<div id="searchbox" style="width:600px; padding-left:800px;float:left;"><?php print $search_box ?>
</div>
</div>
</div>

<div id="clear-both">&nbsp;</div>

<h1 style="font-size:14pt; width:400px; padding-bottom:10px; padding-left:100px;">Alternate Administrative View</h1>

<hr style="height:0px; border-top:none; border-bottom:1px solid #aaa;" />







<table cellpadding="0px" cellspacing="0px" style="padding-top:10px; border-collapse:separate; border-top:0px solid #fff;width:900px;">
	<tr>
		<td style="vertical-align:top;width:900px;">
			
					<?php if($content) { ?>
					<?php print $content ?>
					<?php } ?>

		</td>
	</tr>
</table>

<?php print $closure ?>


</body>
</html>
