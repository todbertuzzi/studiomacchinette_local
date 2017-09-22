(function($){

    FLBuilder.registerModuleHelper('uabb-advanced-menu', {

        init: function()
        {
            var form = $('.fl-builder-settings'),
                a = $('.fl-builder-uabb-advanced-menu-settings').find('.fl-builder-settings-tabs a'),
                mobile_menu_type = form.find('select[name=creative_mobile_menu_type]'),
                menu_mobile_breakpoint = form.find('select[name=creative_menu_mobile_breakpoint]');

                $( '.fl-builder-content' ).on( 'fl-builder.layout-rendered', this.callbackRenderFunction );
                a.on('click', this._openSubmenu);

                mobile_menu_type.on('change', $.proxy( this._hideWidth, this ) );
                menu_mobile_breakpoint.on('change', $.proxy( this._hideWidth, this ) );

                $( this._hideWidth, this );
		},

		callbackRenderFunction: function() {
            var a    = $('.fl-builder-uabb-advanced-menu-settings').find('.fl-builder-settings-tabs a'),
                form = $('.fl-builder-settings'),
                id   = form.data('node');

            if( $( '.fl-active' ).attr('href') == '#fl-builder-settings-tab-submenu' ) {
            	jQuery( '.fl-node-' + id + ' .uabb-creative-menu .menu .sub-menu' ).first().css( 'display', 'block' );
                jQuery( '.fl-node-' + id + ' .uabb-creative-menu .menu .sub-menu' ).first().css( 'visibility', 'visible' );
                jQuery( '.fl-node-' + id + ' .uabb-creative-menu .menu .sub-menu' ).first().css( 'opacity', '1' );
            } else {
                jQuery( '.fl-node-' + id + ' .uabb-creative-menu .menu .sub-menu' ).first().css( 'display', 'none' );
                jQuery( '.fl-node-' + id + ' .uabb-creative-menu .menu .sub-menu' ).first().css( 'visibility', 'hidden' );
                jQuery( '.fl-node-' + id + ' .uabb-creative-menu .menu .sub-menu' ).first().css( 'opacity', '0' );
            }
        },

        _hideWidth: function() {
            var form = $('.fl-builder-settings'),
                mobile_menu_type = form.find('select[name=creative_mobile_menu_type]').val(),
                menu_mobile_breakpoint = form.find('select[name=creative_menu_mobile_breakpoint]').val();

            if( mobile_menu_type != 'default' && menu_mobile_breakpoint == 'always' ) {
                    form.find('#fl-field-submenu_width').hide();
            } else {
                form.find('#fl-field-submenu_width').show();
            }
        },

        _openSubmenu: function() {
            var form = $('.fl-builder-settings'),
                id   = form.data('node'),
                anchorHref = $(this).attr('href');
                
            if( anchorHref == '#fl-builder-settings-tab-submenu' ){
                jQuery( '.fl-node-' + id + ' .uabb-creative-menu .menu .sub-menu' ).first().css( 'display', 'block' );
                jQuery( '.fl-node-' + id + ' .uabb-creative-menu .menu .sub-menu' ).first().css( 'visibility', 'visible' );
                jQuery( '.fl-node-' + id + ' .uabb-creative-menu .menu .sub-menu' ).first().css( 'opacity', '1' );
            } else {
                jQuery( '.fl-node-' + id + ' .uabb-creative-menu .menu .sub-menu' ).first().css( 'display', 'none' );
                jQuery( '.fl-node-' + id + ' .uabb-creative-menu .menu .sub-menu' ).first().css( 'visibility', 'hidden' );
                jQuery( '.fl-node-' + id + ' .uabb-creative-menu .menu .sub-menu' ).first().css( 'opacity', '0' );
            }
        },
    });

})(jQuery);