/**
 Home page functionality.

 @since 0.1.0
 @package Applegate
 */
(function ($) {
    'use strict';

    $(function () {

       // Clicking on menu labels should do nothing
       $('#home-buckets').find('.bucket').click(function () {

           var link = $(this).data('link');

           if (link) {
               window.location = link;
           }
       });
    });

})(jQuery);