 
       <!-- CORE FILES -->
      <script src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
      <script src="<?php bloginfo('template_directory'); ?>/js/jquery.isotope.min.js"></script>
      <script src="<?php bloginfo('template_directory'); ?>/js/jquery.easing.1.3.js"></script>
      <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
      <!-- PLUGINS -->
      <script src="<?php bloginfo('template_directory'); ?>/js/jquery.scrollTo.js"></script>
      <script src="<?php bloginfo('template_directory'); ?>/js/jquery.nav.js"></script>
      <script src="<?php bloginfo('template_directory'); ?>/js/jquery.superslides.js"></script>
      <script src="<?php bloginfo('template_directory'); ?>/js/jquery.sticky.js"></script>
      <script src="<?php bloginfo('template_directory'); ?>/js/owl.carousel.min.js"></script>
      <script src="<?php bloginfo('template_directory'); ?>/js/tweetie.js"></script>
      <script src="<?php bloginfo('template_directory'); ?>/js/pace.min.js"></script>
      <script src="<?php bloginfo('template_directory'); ?>/js/featherlight.js"></script>
      <script src="<?php bloginfo('template_directory'); ?>/js/jquery.nicescroll.min.js"></script>
      <!-- init -->
      <script src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script>
      <script>
         (function($) {
         "use strict";
             /**    09. TWITTER
         *************************************************** **/
         // Twitter
         $('.tweet').twittie({
         
         count: 1
         });
         })(jQuery);
         
      </script>
<!----- Clients --->
<script>
$(document).ready(function() {
              $('.menu a').hover(function() {
                $(this).stop().animate({
                   opacity: 1
                 }, 200);
                    }, function() {
               $(this).stop().animate({
                opacity: 0.3
                 }, 200);
              });
            });
</script>



<?php wp_footer(); ?>

   </body>
</html>
