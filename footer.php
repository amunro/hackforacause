<?php
/**
 * Footer template segment
 *
 * @author Conrad Muan <con.muan@gmail.com>
 * @package hack_theme
 * @subpackage templates
 **/
?>

        </div><!-- end #main -->
        <div id="footer">
            
            <?php wp_nav_menu(array('theme_location'=>'footer_menu')); ?>
            
        </div><!-- end #footer -->
    </div>
</div><!-- end .container  -->
<?php wp_footer(); ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=309978335715124";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

</body>
</html>