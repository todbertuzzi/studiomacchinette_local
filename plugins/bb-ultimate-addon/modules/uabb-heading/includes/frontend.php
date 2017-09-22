<div class="uabb-module-content uabb-heading-wrapper uabb-heading-align-<?php echo $settings->alignment; ?> <?php echo ( $settings->separator_style == 'line_text' ) ? $settings->responsive_compatibility : ''; ?>">
	
	<?php $module->render_separator( 'top' ); ?>

	<<?php echo $settings->tag; ?> class="uabb-heading">
		<?php if(!empty($settings->link)) : ?>
		<a href="<?php echo $settings->link; ?>" title="<?php echo $settings->heading; ?>" target="<?php echo $settings->link_target; ?>">
		<?php endif; ?>
		<span class="uabb-heading-text"><?php echo $settings->heading; ?></span>
		<?php if(!empty($settings->link)) : ?>
		</a>
		<?php endif; ?>
	</<?php echo $settings->tag; ?>>
	
	<?php $module->render_separator( 'center' ); ?>
	
	<?php if( $settings->description != '' ) : ?>
	<div class="uabb-subheading uabb-text-editor">
		<?php echo $settings->description; ?>
	</div>
	<?php endif; ?>

	<?php $module->render_separator( 'bottom' ); ?>
</div>