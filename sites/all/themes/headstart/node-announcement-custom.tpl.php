<?php

/**
 * This file renders announcement nodes on the following pages:
 * - http://www.hsolc.org/app/announcements
 * @parameters: public, staff, training
 *
 */



?>
  <div class="node<?php if ($sticky) { print " sticky"; } ?><?php if (!$status) { print " node-unpublished"; } ?> node-<?php print $node->nid ?>">
    <?php if ($picture) {
      print $picture;
    }?>
    <?php if ($page == 0): ?>
    	<h2 class="title">
    		<a name="node-<?php print $node->nid ?>"></a><?php print $title?>
    	</h2>
    <?php endif; ?>

    <div class="content">
    
    	<?php print $content ?>
    		<?php /*if (!$is_front && $page == TRUE) {
    			echo "<pre>";
    				print_r( $node );
    			echo "</pre>";
    		} else*/
    		
			if ($is_front) { ?>
				<a class="read-more" href="app/announcements" title="<?php print $title ?>">Read more</a>
			<?php } 
    		
    		/*else if ($links && $node->field_announcement_type[0]["value"] == "staff") { ?>
				<a class="read-more" href="announcements/staff" title="<?php print $title ?>">Read more</a>
    		<?php }
    		
    		else if ($links && $node->field_announcement_type[0]["value"] == "training") { ?>
				<a class="read-more" href="announcements/training" title="<?php print $title ?>">Read more</a>
			 <?php }*/
			 
			 else if($links) {?>
    			<div class="links">&raquo; <?php print $links?></div>
			<?php } ?>
			<div class="clear" style="clear:both;">&nbsp;</div>
    </div>

  </div>    