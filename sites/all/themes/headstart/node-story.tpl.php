<?php
// $Id: node.tpl.php,v 1.7 2007/08/07 08:39:36 goba Exp $
//$node_url
?>
  <div class="node<?php if ($sticky) { print " sticky"; } ?><?php if (!$status) { print " node-unpublished"; } ?>">
    <?php if ($picture) {
      print $picture;
    }?>
    <?php if ($page == 0) { ?><!--<h1 class="title"><?php print $title?></h1>--><?php }; ?>
    <!--<span class="submitted"><?php print $submitted?></span>-->
    <div class="taxonomy"><?php print $terms?></div>
    <div class="content">
    
    	<?php print $content?>
    	
			 <?php /*if ($links) { ?><div class="links" style="margin-top:-10px;">&raquo; <?php print $links?></div><?php };*/ ?>
    	
    		<?php /*if($teaser) { ?>&nbsp;<a class="read-more" href="node/319" title="<?php print $title ?>">Read more</a><?php }*/ ?>
    		
    </div>
  	</div>