<?php
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
    <?php if ($page == 0): ?>
    	<h2 class="title">
    		<a name="node-<?php print $node->nid; ?>" />
    		<?php print $title; ?>
    	</h2>
    <?php endif; ?>

    <div class="content">
    	<?php print $content; ?>

			<?php if($is_front): ?>
				<a class="read-more" href="app/announcements" title="<?php print $title; ?>">Read more</a>
			<?php endif; ?>

			 <?php if($links): ?>
    			<div class="links">&raquo;
    				<?php print $links; ?>
    			</div>
			<?php endif; ?>
			<div class="clear" style="clear:both;">&nbsp;</div>
    </div>

  </div>    