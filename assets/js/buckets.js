/**
 Buckets.

 @since 0.1.0
 @package Applegate
 */
(function ($) {
    'use strict';

    $(function () {

       // Bucket menu mobile
        $('#bucket-menu').find('.select-menu').change(function () {
            window.location = $(this).val();
        });
    });

})(jQuery);