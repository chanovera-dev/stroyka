<div class="site-brand">
    <?php
        if ( has_custom_logo() == false ) :
            echo '<a href="'.get_home_url().'">'.bloginfo('title').'</a>'; 
        else:
            the_custom_logo();
        endif;
    ?>
</div>