/**
 Main functions file.

 @since 0.1.0
 @package Applegate
 */
(function ($) {
    'use strict';

    $(document).foundation({
        abide: {
            validate_on_blur: false,
            focus_on_invalid: false
        }
    });

    $(window).load(function () {

        // Vertically center
        $('.vertical-center').each(function () {
            $(this).css('margin-top', ($(this).parent().height() / 2) - ($(this).height() / 2));
        });

        youtube_embeds();
    });

    $(window).resize(youtube_embeds);

    $(function () {

        // Auto submit forms
        $('form.auto-submit').each(function () {

            var $inputs = $(this).find('input, select, textarea');

            if ($inputs.length) {
                $inputs.change(function () {

                    var $form = $(this).closest('form.auto-submit');

                    if (typeof $form.data('url') != 'undefined') {
                        window.location.href = $(this).val();
                    } else {
                        $(this).closest('form.auto-submit').submit();
                    }
                });
            }
        });
    });

    function youtube_embeds() {

        $('iframe[src*="youtube.com"]').each(function () {

            // Set height proportionately to the width
            $(this).height($(this).width() / 1.5);
        });
    }

})(jQuery);