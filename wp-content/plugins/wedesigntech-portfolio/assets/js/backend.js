var wdtPortfolioBackendUtils = {

	wdtPortfolioCheckboxSwitch : function() {

		jQuery('.wdt-checkbox-switch:not(.disabled)').each( function() {
			jQuery(this).on('click', function(e) {

				var $ele = '#' + jQuery(this).attr('data-for');
				jQuery(this).toggleClass('checkbox-switch-off checkbox-switch-on');

				if (jQuery(this).hasClass('checkbox-switch-on')) {
					jQuery($ele).prop('checked', true);
				} else {
					jQuery($ele).removeAttr('checked');
				}

				e.preventDefault();

			});
		});

	},

	wdtPortfolioAjaxBeforeSend : function(this_item) {

		if(this_item != undefined) {
			if(!this_item.find('.wdt-ajax-load-image').hasClass('first')) {
				this_item.find('.wdt-ajax-load-image').show();
			} else {
				this_item.find('.wdt-ajax-load-image').removeClass('first');
			}
		} else {
			if(!jQuery('.wdt-ajax-load-image').hasClass('first')) {
				jQuery('.wdt-ajax-load-image').show();
			} else {
				jQuery('.wdt-ajax-load-image').removeClass('first');
			}
		}

	},

	wdtPortfolioAjaxAfterSend : function(this_item) {

		if(this_item != undefined) {
			this_item.find('.wdt-ajax-load-image').hide();
		} else {
			jQuery('.wdt-ajax-load-image').hide();
		}

	},

	wdtPortfolioVerticalTab : function(this_item) {

		if(('ul.wdt-tabs-vertical').length > 0) {
			jQuery('ul.wdt-tabs-vertical').each(function(){
				var $effect = jQuery(this).parent('.wdt-tabs-vertical-container').attr('data-effect');
				jQuery(this).wdtPortfolioTabs('> .wdt-tabs-vertical-content', {
					effect: $effect
				});
			});

			jQuery('.wdt-tabs-vertical').each(function(){
				jQuery(this).find('li:first').addClass('first').addClass('current');
				jQuery(this).find('li:last').addClass('last');
			});

			jQuery('.wdt-tabs-vertical li').on('click', function(){
				jQuery(this).parent().children().removeClass('current');
				jQuery(this).addClass('current');
			});
		}

	}

};


var wdtPortfolioBackend = {

	dtInit : function() {
		wdtPortfolioBackend.wdtPortfolio();
		wdtPortfolioBackend.dtSettings();
	},

	wdtPortfolio : function() {

		// Checkbox switch
		wdtPortfolioBackendUtils.wdtPortfolioCheckboxSwitch();

		// Vertical Tabs
		wdtPortfolioBackendUtils.wdtPortfolioVerticalTab();


		// Initaialize color picker
		if(jQuery('.wdt-color-field').length) {
			jQuery('.wdt-color-field').wpColorPicker();
		}

	},

	dtSettings : function() {

		// Save Backend Options

		jQuery('body').on('click', '.wdt-save-options-settings', function (e) {

        e.preventDefault();
        var $button = jQuery(this);
        var settings = $button.data('settings');
        var $form = jQuery('.formOptionSettings');
        var $responseBox = $form.find('.wdt-option-settings-response-holder');
        var formData = new FormData($form[0]);
        formData.append('action', 'wdt_save_options_settings');
        formData.append('settings', settings);
        formData.append('nonce', wdtbackendobject.nonce);

        jQuery.ajax({
            type: 'POST',
            url: wdtbackendobject.ajaxurl,
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            dataType: 'json',

            beforeSend: function () {
                $button.prepend('<span class="wdt-spinner"><i class="fa fa-spinner fa-spin"></i></span>');
            },
            success: function (response) {

                if (response.success) {
                    $responseBox.html(response.data).show();
                } else {
                    $responseBox.html(response.data || 'Error occurred').show();
                }
                setTimeout(function () {
                    $responseBox.fadeOut('slow');
                }, 2000);
            },
            error: function () {
                $responseBox.html('AJAX request failed.').show();
            },
            complete: function () {
                $button.find('.wdt-spinner').remove();
            }
        });

		});

			// Skin

		jQuery('body').on('click', '.wdt-save-skin-settings', function (e) {
			e.preventDefault();
			var $button = jQuery(this);
			var $form = jQuery('.formSkinSettings');
			var $response = $form.find('.wdt-skin-settings-response-holder');
			var formData = new FormData($form[0]);
			formData.append('action', 'wdt_save_skin_settings');
			formData.append('nonce', wdtbackendobject.nonce);
			jQuery.ajax({
				type: "POST",
				url: wdtbackendobject.ajaxurl,
				data: formData,
				processData: false,
				contentType: false,
				cache: false,
				dataType: "json",

				beforeSend: function () {
					$button.prepend('<span class="wdt-spinner"><i class="fa fa-spinner fa-spin"></i></span>');
				},
				success: function (response) {

					if (response.success) {
						$response.html(response.data).show();
					} else {
						$response.html(response.data || 'Error occurred').show();
					}
					setTimeout(function () {
						$response.fadeOut('slow');
					}, 2000);
				},
				error: function () {
					$response.html('AJAX request failed.').show();
				},
				complete: function () {
					$button.find('.wdt-spinner').remove();
				}
			});
		});

	}

};

jQuery(document).ready(function() {

	wdtPortfolioBackend.dtInit();

});