<?php
if( 'always' == $settings->creative_menu_mobile_breakpoint ) {
	echo $module->get_responsive_media( $settings, $module );
}
else { ?>
	<div class="uabb-creative-menu<?php if ( $settings->creative_menu_collapse ) echo ' uabb-creative-menu-accordion-collapse'; ?> uabb-menu-default">
		<?php $module->get_toggle_button(); ?>
		    <div class="uabb-clear"></div>
		   	<?php echo $module->get_menu( $settings, $module ); ?>
	</div>

	<?php echo $module->get_responsive_media( $settings, $module );
}
