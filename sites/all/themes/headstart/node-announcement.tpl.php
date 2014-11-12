<?php
// $Id: node.tpl.php,v 1.7 2007/08/07 08:39:36 goba Exp $
//print_r( $node );
//$node_url


/**
 * This file renders announcement nodes on the following pages:
 * - http://www.hsolc.org/announcements/recent
 * - 
 * - https://www.hsolc.org/staff-home
 *
 *
 * @parameters: public, staff, training
 *
 */



?>
  <div class="node<?php if ($sticky) { print " sticky"; } ?><?php if (!$status) { print " node-unpublished"; } ?> node-<?php print $node->nid ?>">
    <?php if ($picture) {
      print $picture;
    }?>
    <?php if ($page == 0) { ?><h2 class="title"><a name="node-<?php print $node->nid ?>" /><?php print $title?></h2><?php }; ?>
    <!--<span class="submitted"><?php print $submitted?></span>-->
    <!--<div class="taxonomy"><?php print $terms?></div>-->
	<?php if( !empty( $node->field_date[0]["value"] ) ) echo '<h5 class="cck cck-field-date">'.date('F j, Y',strtotime($node->field_date[0]["value"])).'</h5>'; ?>
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