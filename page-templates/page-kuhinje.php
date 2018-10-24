<?php /* Template Name: Kuhinje Page */ ?>

<?php get_header(); ?>

<div class="kuhinja">
  <div class="kuhinja--top">
      <div class="kuhinja--top--left">
        <div class="kuhinja--top--left--title">Kuhinje</div>
        <div class="kuhinja--top--left--menu">
        <?php
          $wp_my_query = new WP_Query();
          $all_wp_pages = $wp_my_query->query(array('post_type' => 'page', 'posts_per_page' => '-1'));

          $kuhinje = get_page_by_title('Kuhinje');
          $kuhinje_children = get_page_children($kuhinje->ID, $all_wp_pages);
          foreach ($kuhinje_children as $child) {
        ?>
          <a href="<?php echo $child->guid ?>"><?php echo $child->post_title ?></a>
        <?php
          }
        ?>
        </div>
        <div class="kuhinja--top--left--back"><a href="#">
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
            <path d="M16 7L3.83 7L9.42 1.41L8 0L0 8L8 16L9.41 14.59L3.83 9L16 9L16 7Z" fill="white"/>
          </svg>
        </span>
        <span>Back</span>
        </a>
        </div>
      </div>
      <div class="kuhinja--top--right">

      </div>
  </div>
</div>
<div>
<?php get_template_part('/page-templates/page', 'fijoke-sredina'); ?>

</div>

<?php get_template_part('/page-templates/page', 'kontakt'); ?>
<?php get_footer(); ?>
