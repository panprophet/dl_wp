<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <!-- menu -->
  <nav class="menu">
    <div class="menu--top">
      <div class="menu--top-logo">
        <a href="<?php echo home_url('/') ?>"><img src="<?php
         if( is_home() || is_front_page() ) { echo './wp-content/uploads/2018/10/drvo_lux_logo.png'; }
          else if( is_page() && $post->post_parent ) { echo '../../wp-content/uploads/2018/10/drvo_lux_logo.png';}
          else if( is_page() ) { echo '../wp-content/uploads/2018/10/drvo_lux_logo.png';}
          else if( is_single() ) { echo '../../../wp-content/uploads/2018/10/drvo_lux_logo.png';} ?>" />
        </a>
      </div>

      <div class="menu--top-links menu--top-links--closed" id="links">
      <?php
        if( is_single() ) {
      ?>
        <div class="menu--top-links-single menu--top-links-single--open" id="singlelinks">
         <?php //if() ?>
         <span class="menu--top-links-single--back"><a href="javascript:history.back()"><?php echo get_the_title(get_page_by_path('/kuhinje/fijoke/')); ?></a></span>
         <?php ?>
         <span>/</span>
         <span class="menu--top-links-single--here"><?php the_title() ?></span>
        </div>
      <?php
        }
      ?>
      <?php
        $menuItems = wp_nav_menu( array(
            'theme_location',
            'container' => false,
            'items_wrap' => '<ul>%3$s</ul>',
            // 'menu_id' => 'links',
            // 'menu_class' => 'menu--top-links menu--top-links--closed'
          )
        );
      ?>
      </div>
      <div class="menu--top-choice">
        <div class="menu--top-choice--contact">
          <p>Kontakt</p>
        </div>
        <div class="menu--top-choice--lang">ENG / SRB</div>
        <div class="menu--top-choice--ham"
              onclick="toggleMenu()">
          <!-- <img src="images/ham.svg">  -->
          <svg version="1.1"
                id="Layer_1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px"
                y="0px"
                viewBox="0 0 18 12"
                style="enable-background:new 0 0 18 12;"
                xml:space="preserve">
            <style type="text/css">
              .st0 {
                fill: #ffffff;
              }

              .st1 {
                fill: #840505;
              }

              /* <!--
              svg:hover>.st0 {
                fill: #D9BB82;
              } --> */
            </style>
            <path class="st0"
                  id="ham"
                  d="M0,12h6v-2H0V12z M0,0v2h18V0H0z M0,7h12V5H0V7z" /> </svg>
          </div>
      </div>
    </div>
    <div class="menu--wrap menu--wrap-hide"
          id="dropdown">
      <div class="menu--wrap-midd">
        <div class="menu--wrap-midd-container">
          <div class="menu--wrap-midd-container--top"
                id="subLink">

           <?php
            $wp_my_query = new WP_Query();
            $all_wp_pages = $wp_my_query->query(array('post_type' => 'page', 'posts_per_page' => '-1', ));

            $materijali = get_page_by_title('Materijali');
            $materijali_children = get_page_children($materijali->ID, $all_wp_pages);
            foreach (array_reverse($materijali_children) as $child) {
              if(get_the_id() == $child->ID){
            ?>
              <div class="menu--wrap-midd-container--top-link top-link--active" id="subLink_1"><a href="<?php echo $child->guid ?>"><?php echo $child->post_title ?></a></div>
              <?php
              } else {
              ?>
              <div class="menu--wrap-midd-container--top-link" id="subLink_1"><a href="<?php echo $child->guid ?>"><?php echo $child->post_title ?></a></div>
              <?php
              }
              ?>
            <?php
            }
            ?>
          </div>
          <div class="menu--wrap-midd-container--bottom">
            <div class="bottom"></div>
          </div>
        </div>
      </div>
      <div class="menu--wrap-bottom">
        <div class="menu--wrap-bottom-container">
        <?php ?>
          <div class="elements">
            <div class="elements-title"><?php $fijoke = get_page_by_title('Fijoke'); ?><a href="<?php echo $fijoke->guid; ?>">Kuhinje</a></div>
            <div class="elements-container">
              <div class="elements-container--pic">
                <img src="<?php
                if( is_home() || is_front_page() ) { echo './wp-content/uploads/2018/10/Slide_gallery_3.png'; }
                else if( is_page() && $post->post_parent ) { echo '../../wp-content/uploads/2018/10/Slide_gallery_3.png'; }
                else if( is_page() ) { echo '../wp-content/uploads/2018/10/Slide_gallery_3.png'; }
                else if( is_single() ) { echo '../../../wp-content/uploads/2018/10/Slide_gallery_3.png';}
                ?> " alt="Kuhinje" /> </div>
              <div class="elements-container--text">Fioke, klizači, podizni mehanizmi, žičani elementi, diht lajsne, sokle, aluminijumski kantovi, ugradna tehnika, kuhinjska galanterija, sudopere i slavine, alu ramovi sa staklennom ispunom.</div>
            </div>
          </div>
          <div class="elements">
            <div class="elements-title">Plakari</div>
            <div class="elements-container">
              <div class="elements-container--pic">
                <img src="
                <?php
                if( is_home() || is_front_page() ) { echo './wp-content/uploads/2018/10/Slide_gallery_2.png'; }
                else if( is_page() && $post->post_parent ) { echo '../../wp-content/uploads/2018/10/Slide_gallery_2.png'; }
                else if( is_page() ) { echo '../wp-content/uploads/2018/10/Slide_gallery_2.png'; }
                else if( is_single() ) { echo '../../../wp-content/uploads/2018/10/Slide_gallery_2.png';}
                ?>
                " /> </div>
              <div class="elements-container--text">Izvlakači, garderoberi, liftovi, mehanizmi za otvaranje, aluminijumski profili za vrata, staklene ispune, razna galanterija</div>
            </div>
          </div>
          <?php ?>
        </div>
      </div>
    </div>
  </nav>
  <!-- top bar -->
