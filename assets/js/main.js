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

    $(function () {
       $('.vertical-center').each(function () {
           $(this).css('margin-top', ($(this).parent().height() / 2) - ($(this).height() / 2));
       });
    });

})(jQuery);