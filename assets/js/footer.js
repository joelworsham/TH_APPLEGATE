/**
 Footer functionality.

 @since 0.1.0
 @package Applegate
 */
(function ($) {
    'use strict';

    $(function () {

       // Clicking on menu labels should do nothing
       $('#site-footer').find('.menu .nav-menu > li > a').click(function (e) {
           e = e || event;
           e.preventDefault();
           return false;
       });
    });

})(jQuery);