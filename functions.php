<?php
//custom update checker
require_once dirname(__FILE__) .'/lib/ext/plugin-update-checker/plugin-update-checker.php';
$abUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/panprophet/dl_wp/',
    __FILE__,
    'dl_wp'
);
$abUpdateChecker->setAuthentication('12943909f22c712a064cc26f72135bce7099879a');
// $abUpdateChecker->setBranch('stage-update');
add_action( 'after_setup_theme', 'blankslate_setup' );



function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
/* menu bar js */
function menu_bar() {
  wp_enqueue_script('navMenu', get_template_directory_uri() . '/js/menu.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'menu_bar');
/* sliders js */
function img_slider() {
  wp_enqueue_script('imgSliders', get_template_directory_uri() . '/js/sliders.js', array('jquery'), '1.1', true);
}
add_action('wp_enqueue_scripts', 'img_slider');
// big galleries swipe
function gallery_swipe() {
  wp_enqueue_script('gallerySwipe', get_template_directory_uri() . '/js/gallery.js', array('jquery'), '1.1', true);
}
add_action( 'wp_enqueue_scripts', 'gallery_swipe' );

function submenu_swipe() {
  wp_enqueue_script('submenu_swipe', get_template_directory_uri() . '/js/submenuscroll.js', array('jquery'), '1.1', true);
}
add_action( 'wp_enqueue_scripts', 'submenu_swipe' );

function mail_checker() {
  wp_enqueue_script('checkmail', get_template_directory_uri() . '/js/checkmail.js', array('jquery'), '1.1', true);
}
add_action('wp_enqueue_scripts', 'mail_checker');

function search_script() {
  wp_enqueue_script('searchscript', get_template_directory_uri() . '/js/searchscript.js', array('jquery'), '1.1', true);
}
add_action('wp_enqueue_scripts', 'search_script');

add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
  {
  if ( !is_admin() ) {
  global $id;
  $comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
  return count( $comments_by_type['comment'] );
  } else {
  return $count;
  }
}
function kitchen_post_types() {
  register_post_type('kuhinje', array(
    'public' => true,
    'has_archive' => false,
    'show_in_rest' => true,
    'rest_base' => 'kuhinje',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'labels' => array(
      'name' => 'Kuhinje',
      'add_new_item' => 'Dodaj novi kuhinjski element',
      'edit_item' => 'Edit Kitchen element',
      'all_items' => 'Svi Kuhinjski elementi',
      'singular_name' => 'kuhinja',
    ),
    'menu_icon' => 'dashicons-store',
    // 'rewrite' => array( 'slug' => '/kuhinja'),

  ));
}
add_action('init', 'kitchen_post_types');

function plakari_post_type() {
  register_post_type('plakari', array(
    'public' => true,
    'has_archive' => false,
    'show_in_rest' => true,
    'rest_base' => 'plakari',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    'labels' => array(
      'name' => 'Plakari',
      'add_new_item' => 'Dodaj novi plakar',
      'edit_item' => 'Element plakar',
      'all_items' => 'Svi plakari elementi',
      'singular_name' => 'plakar',
    ),
    'menu_icon' => 'dashicons-archive',
    // 'rewrite' => array('slug' => '/kuhinje/fijoke'),

  ));

}

add_action('init', 'plakari_post_type');

function materijali_post_type() {
  register_post_type('materijali', array(
    'public' => true,
    'has_archive' => false,
    'show_in_rest' => true,
    'rest_base' => 'materijali',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
    // 'supports' => array( 'naziv', 'opis', 'informacije', 'cena', 'id_elementa', 'debljina_materijala', 'proizvodjac', 'dimenzije' ),
    'labels' => array(
      'name' => 'Materijali',
      'add_new_item' => 'Dodaj novi materijal',
      'edit_item' => 'Materijal',
      'all_items' => 'Svi materijali',
      'singular_name' => 'materijal',
      // 'rest_base' => 'materijali',
    ),
    'menu_icon' => 'dashicons-archive',
    // 'rewrite' => array('slug' => 'kuhinje/fijoke'),
    'rewrite' => array('slug' => '/materijali/materijal'),

  ));

}
add_action('init', 'materijali_post_type');

function register_kitchen_taxonomy(){
  register_taxonomy(
    'kuhinje_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
    'kuhinje',        //post type name
    array(
        'hierarchical' => true,
        'label' => 'Kuhinje',  //Display name
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'Kuhinjski_elementi', // This controls the base slug that will display before each term
            'with_front' => false // Don't display the category base before
        )
    )
  );
}
add_action('init', 'register_kitchen_taxonomy');

function register_fijoke_taxonomy(){
  register_taxonomy(
    'fijoke_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
    'fijoke',        //post type name
    array(
        'hierarchical' => true,
        'label' => 'Fijoke',  //Display name
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array(
            'slug' => 'Fijoke', // This controls the base slug that will display before each term
            'with_front' => false // Don't display the category base before
        )
    )
  );
}
add_action('init', 'register_fijoke_taxonomy');

function register_materijali_taxonomy(){
  register_taxonomy(
    'materijali_categories',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
    'materijali',        //post type name
    array(
        'hierarchical' => true,
        'label' => 'Materijali',  //Display name
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'show_in_rest' => true,
        'rest_base' => 'materijalirest',
        'rewrite' => array(
            'slug' => 'Materijali', // This controls the base slug that will display before each term
            'with_front' => false // Don't display the category base before
        )
    )
  );
}
add_action('init', 'register_materijali_taxonomy');

function register_custom_fields() {
  register_rest_field(
    'materijali',
    'materijali_element',
    array(
      'get_callback' => 'show_fields',
      'schema' => null,
    )
  );
  register_rest_field(
    'kuhinje',
    'kuhinja_element',
    array(
      'get_callback' => 'show_fields',
      'schema' => null,
    )
  );
  register_rest_field(
    'plakari',
    'plakari_element',
    array(
      'get_callback' => 'show_fields',
      'schema' => null,
    )
  );
}
function show_fields($object) {
  $post_id = $object['id'];
  return get_post_meta($post_id);
}

add_action('rest_api_init', 'register_custom_fields');

function category_has_children ( $term, $taxonomy) {
  $children = get_categories (
    array(
      'child_of' => $term,
      'taxonomy' => $taxonomy,
      'hide_empty' => false,
      'field' => 'slug',
    )
  );
  return $children;
}

flush_rewrite_rules( false );
