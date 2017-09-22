<?php 
	$settings->size = ( $settings->size != '' ) ? $settings->size : '40';
	$settings->spacing = ( $settings->spacing != '' ) ? $settings->spacing : '10';
?>

<?php if ( $settings->icon_struc_align == 'horizontal' ) { ?>


.fl-node-<?php echo $id; ?> .adv-icon-horizontal .adv-icon-link {
	margin-bottom: <?php echo $settings->spacing; ?>px;
}

/* Left */
.fl-node-<?php echo $id; ?> .adv-icon-left .adv-icon-link {
	margin-right: <?php echo $settings->spacing; ?>px;
}

/* Center */
.fl-node-<?php echo $id; ?> .adv-icon-center .adv-icon-link {
	margin-left: <?php echo intval($settings->spacing)/2; ?>px;
	margin-right: <?php echo intval($settings->spacing)/2; ?>px;
}

/* Right */
.fl-node-<?php echo $id; ?> .adv-icon-right .adv-icon-link {
	margin-left: <?php echo $settings->spacing; ?>px;
}

<?php } ?>

<?php if ( $settings->icon_struc_align == 'vertical' ) { ?>
	

.fl-node-<?php echo $id; ?> .adv-icon-vertical .adv-icon-link {
	margin-bottom: <?php echo $settings->spacing; ?>px;
}

<?php } ?>

<?php 
$icon_count = 1;
$settings->bg_border_radius = ( $settings->bg_border_radius !== '' ) ? $settings->bg_border_radius : '0';
$settings->bg_size = ( $settings->bg_size != '' ) ? (int) trim( $settings->bg_size ) : 0;

foreach ( $settings->icons as $i => $icon ) : 	
	$imageicon_array = array(

	  /* General Section */
	  'image_type' => $icon->image_type,

	  /* Icon Basics */
	  'icon' => $icon->icon,
	  'icon_size' => $settings->size,
	  'icon_align' => $settings->align,

	  /* Image Basics */
	  'photo_source' => 'library',
	  'photo' => $icon->photo,
	  'photo_url' => '',
	  'img_size' => ( $settings->icoimage_style == 'custom' || $settings->icoimage_style == 'simple') ? $settings->size : ( $settings->size * 2 ),
	  'img_align' => $settings->align,
	  'photo_src' => ( isset( $icon->photo_src ) ) ? $icon->photo_src : '' ,

	  /* Icon Style */
	  'icon_style' => $settings->icoimage_style,
	  'icon_bg_size' => ( $settings->bg_size * 2 ),
	  'icon_border_style' => $settings->border_style,
	  'icon_border_width' => $settings->border_width,
	  'icon_bg_border_radius' => $settings->bg_border_radius,

	  /* Image Style */
	  'image_style' => $settings->icoimage_style,
	  'img_bg_size' => $settings->bg_size,
	  'img_border_style' => $settings->border_style,
	  'img_border_width' => $settings->border_width,
	  'img_bg_border_radius' => $settings->bg_border_radius,

	  /* Preset Color variable new */
	  'icon_color_preset' => $settings->color_preset, 
	  
	  /* Icon Colors */
	  'icon_color' => ( !empty( $icon->icocolor ) ) ? $icon->icocolor : $settings->color,
	  'icon_hover_color' => ( !empty( $icon->icohover_color ) ) ? $icon->icohover_color : $settings->hover_color,
	  'icon_bg_color' => ( !empty( $icon->bg_color ) ) ? $icon->bg_color : $settings->bg_color,
	  'icon_bg_color_opc' => ( !empty( $icon->bg_color_opc ) ) ? $icon->bg_color_opc : $settings->bg_color_opc,
	  'icon_bg_hover_color' => ( !empty( $icon->bg_hover_color ) ) ? $icon->bg_hover_color : $settings->bg_hover_color,
	  'icon_bg_hover_color_opc' => ( !empty( $icon->bg_hover_color_opc ) ) ? $icon->bg_hover_color_opc : $settings->bg_hover_color_opc,
	  'icon_border_color' => ( !empty( $icon->border_color ) ) ? $icon->border_color : $settings->border_color,
	  'icon_border_hover_color' => ( !empty( $icon->border_hover_color ) ) ? $icon->border_hover_color : $settings->border_hover_color,
	  'icon_three_d' => $settings->three_d,

	  /* Image Colors */
	  'img_bg_color' => ( !empty( $icon->bg_color ) ) ? $icon->bg_color : $settings->bg_color,
	  'img_bg_color_opc' => ( !empty( $icon->bg_color_opc ) ) ? $icon->bg_color_opc : $settings->bg_color_opc,
	  'img_bg_hover_color' => ( !empty( $icon->bg_hover_color ) ) ? $icon->bg_hover_color : $settings->bg_hover_color,
	  'img_bg_hover_color_opc' => ( !empty( $icon->bg_hover_color_opc ) ) ? $icon->bg_hover_color_opc : $settings->bg_hover_color_opc,
	  'img_border_color' => ( !empty( $icon->border_color ) ) ? $icon->border_color : $settings->border_color,
	  'img_border_hover_color' => ( !empty( $icon->border_hover_color ) ) ? $icon->border_hover_color : $settings->border_hover_color,
	);
	FLBuilder::render_module_css('image-icon', $id.' .adv-icon-'.$icon_count, $imageicon_array);

	if( isset( $settings->responsive_align ) ) {
		if( $settings->responsive_align != '' && $settings->responsive_align != 'default' ) {
	?>
	@media ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {
		.fl-node-<?php echo $id; ?> .adv-icon-<?php echo $icon_count; ?> .uabb-imgicon-wrap {
			text-align: <?php echo $settings->responsive_align; ?>;
		}
	}
	<?php
		}
	}
	$icon_count = $icon_count + 1;
endforeach; ?>

<?php
if( isset( $settings->responsive_align ) ) {
	if( $settings->responsive_align != '' && $settings->responsive_align != 'default' ) {
?>
@media ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {
	.fl-node-<?php echo $id; ?> .adv-icon-wrap {
		text-align: <?php echo $settings->responsive_align; ?>;
	}

	<?php
	if( $settings->responsive_align != 'center' ) {
	?>
	.fl-node-<?php echo $id; ?> .adv-icon-<?php echo $settings->align; ?> .adv-icon-link {
		<?php
		if( $settings->responsive_align == 'left' ) {
		?>
		margin-right: <?php echo $settings->spacing; ?>px;
		margin-left: 0;
		<?php
		} else if( $settings->responsive_align == 'right' ) {
		?>
		margin-left: <?php echo $settings->spacing; ?>px;
		margin-right: 0;
		<?php
		} else {
		?>
		margin-left: <?php echo intval($settings->spacing)/2; ?>px;
		margin-right: <?php echo intval($settings->spacing)/2; ?>px;
		<?php
		}
		?>
	}
	<?php
	}
	?>
}
<?php
	}
}
?>