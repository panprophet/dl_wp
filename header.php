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
        <a href="<?php echo home_url('/') ?>"><img src="<?php if( is_home() || is_front_page() ) { echo './wp-content/uploads/2018/10/drvo_lux_logo.png'; }
          else if( is_page() && $post->post_parent ) { echo '../../wp-content/uploads/2018/10/drvo_lux_logo.png';}
          else if( is_page() ) { echo '../wp-content/uploads/2018/10/drvo_lux_logo.png';}
          else if( is_single() ) { echo '../../../../wp-content/uploads/2018/10/drvo_lux_logo.png';} ?>" />
        </a>
      </div>

      <div class="menu--top-links menu--top-links--closed" id="links">
      <?php
        if( is_single() ) {
      ?>
        <div class="menu--top-links-single menu--top-links-single--open" id="singlelinks">
         <?php //if() ?>
         <span class="menu--top-links-single--back"><a href="<?php echo home_url('/kuhinje/fijoke/'); ?>"><?php echo get_the_title(get_page_by_path('/kuhinje/fijoke/')); ?></a></span>
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
          <div class="top"
                id="subLink">
            <div class="top-link top-link--active"
                  id="subLink_1"
                  onclick="subMenu(1)">Pločasti Materijali</div>
            <div class="top-link"
                  id="subLink_2"
                  onclick="subMenu(2)">Okovi</div>
          </div>
          <div class="bottom"
                id="submenu">
            <div class="bottom--wrapper"
                  id="submenu_1">
              <div class="bottom--wrapper-column">
                <p>
                  <a href="#">Oplemenjena iverica</a>
                </p>
                <p>
                  <a href="#">Radne ploce</a>
                </p>
                <p>
                  <a href="#">Medijapan ( MDF )</a>
                </p>
              </div>
              <div class="bottom--wrapper-column">
                <p>
                  <a href="#">Akril na ( MDF )</a>
                </p>
                <p>
                  <a href="#">Lesonit</a>
                </p>
                <p>
                  <a href="#">Kompakt</a>
                </p>
              </div>
              <div class="bottom--wrapper-column">
                <p>
                  <a href="#">Neoplemenjena (Sirova) iverica</a>
                </p>
                <p>
                  <a href="#">OSB I Sper ploce</a>
                </p>
              </div>
            </div>
            <div class="bottom--wrapper"
                  id="submenu_2">
              <div class="bottom--wrapper-column">
                <p>
                  <a href="#">Okovi 1</a>
                </p>
                <p>
                  <a href="#">Okovi 2</a>
                </p>
                <p>
                  <a href="#">Okovi 3 ( MDF )</a>
                </p>
              </div>
              <div class="bottom--wrapper-column">
                <p>
                  <a href="#">Okovi 4 ( MDF )</a>
                </p>
                <p>
                  <a href="#">Okovi 5</a>
                </p>
                <p>
                  <a href="#">Okovi 6</a>
                </p>
              </div>
              <div class="bottom--wrapper-column">
                <p>
                  <a href="#">Okovi 6</a>
                </p>
                <p>
                  <a href="#">Okovi 7</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="menu--wrap-bottom">
        <div class="menu--wrap-bottom-container">
          <div class="elements">
            <div class="elements-title">Kuhinja</div>
            <div class="elements-container">
              <div class="elements-container--pic">
                <img src="<?php the_field('menubottomleft'); ?>" /> </div>
              <div class="elements-container--text"><?php the_field('menutextleft'); ?></div>
            </div>
          </div>
          <div class="elements">
            <div class="elements-title">Plakari</div>
            <div class="elements-container">
              <div class="elements-container--pic">
                <img src="<?php the_field('menubottomright'); ?>" /> </div>
              <div class="elements-container--text"><?php the_field('menutextright'); ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- top bar -->
