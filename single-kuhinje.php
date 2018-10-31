<?php /* Template Post Type: post, page, Kuhinje */ ?>
<?php get_header() ?>

<?php
  if(have_rows('fijoka_element')):
  while(have_rows('fijoka_element')): the_row();
?>

<div class="post-temp">
  <div class="post-temp--left">
    <div class="post-temp--left-title">
      <?php
      $terms = get_The_terms($post->ID, 'kuhinje_categories');
      foreach($terms as $term) {
      ?>
        <span><?php echo $term->name; ?></span>
      <?php
        }
      ?>
    </div>
    <div class="post-temp--left-slide">
      <div class="post-temp--left-slide--gallery"  id="slide">
      <?php
        $picNo = 0;
        if(have_rows('image_carousel')):
        while(have_rows('image_carousel')): the_row();
      ?>
        <div class="post-temp--left-slide--gallery-picture" id="<?php echo ($picNo+1); ?>"><img src="<?php the_sub_field('galerry_image'); ?>"></div>
      <?php
        $picNo++;
        endwhile;
        endif;
      ?>
      </div>
      <?php
        if($picNo > 1) {
      ?>
        <div class="post-temp--left-slide--slider">
          <span class="arrow arrrow-left" style="background-image: url('../../../../wp-content/uploads/2018/10/arrow_small.png');" onclick="single_gallery('prev')"></span>
          <span class="pages-from" id="pagefrom">01</span>
          <span class="pages-separator">/</span>
          <span class="pages-to" id="pageto"><?php if($picNo < 10) { echo '0'. $picNo;} else { echo $picNo; } ?></span>
          <span class="arrow arrow-right" style="background-image: url('../../../../wp-content/uploads/2018/10/arrow_small.png');" onclick="single_gallery('next')"></span>
        </div>
      <?php
        }
      ?>

    </div>
    <div class="post-temp--left-info">
      <div class="post-temp--left-info--title"><?php the_sub_field('naziv'); ?></div>
      <div class="post-temp--left-info--subtitle"><?php the_sub_field('debljina_materijala'); ?></div>
      <div class="post-temp--left-info--id"><?php the_sub_field('id_elementa'); ?></div>
    </div>
  </div>
  <div class="post-temp--midd" style="background-image: url(<?php the_sub_field('main_image') ?>">

  </div>
  <div class="post-temp--right">
    <div class="post-temp--right-info">
      <div class="post-temp--right-info--title">Informacije</div>
      <div class="post-temp--right-info--description"><?php the_sub_field('opis'); ?></div>
      <div class="post-temp--right-info--spec">
        <div class="tab">
          <div class="tab--title"><span class="tab--title-text">Dimenzije</span><span class="tab--title-icon" style="background-image: url('../../../wp-content/uploads/2018/10/arrow_2.png')"></span></div>

        </div>
        <div class="tab">
          <div class="tab--title"><span class="tab--title-text">Debljina ploce</span><span class="tab--title-icon" style="background-image: url('../../../wp-content/uploads/2018/10/arrow_2.png')"></span>
        </div>
        </div>
        <div class="tab">
          <div class="tab--title"><span class="tab--title-text">Proizvodjac</span><span class="tab--title-icon" style="background-image: url('../../../wp-content/uploads/2018/10/arrow_2.png')"></span>
          </div>
        </div>
      </div>
    </div>
<?php
  endwhile;
  endif;
?>
    <div class="post-temp--right-products">
      <div class="post-temp--right-products--title">Povezani Proizvodi</div>
      <div class="post-temp--right-products--list">
        <?php
          $loopPosts = new WP_Query (
            array(
            'post_type' => 'kuhinje',
            // 'category' => 'klizaci',
            'posts_per_page' => 3,
            'post__not_in'=> array ($post->ID),
            'orderby' => 'rand',
          )
          );
          $counter = 1;
          while ($loopPosts->have_posts() ) : $loopPosts->the_post();
            if(have_rows('fijoka_element')):
              while(have_rows('fijoka_element')): the_row();
        ?>
        <div class="post-temp--right-products--list-item" id="product_<?php echo $counter ?>">
          <div class="pic" style="background-image: url(<?php the_sub_field('main_image') ?>"></div>
          <div class="declaration">
            <p><a href="<?php the_permalink() ?>"><?php the_sub_field('naziv') ?></a></p>
            <p><?php the_sub_field('id_elementa') ?></p>
          </div>
        </div>
        <?php
          $counter++;
              endwhile;
            endif;
          endwhile;
        ?>
      </div>
    </div>
  </div>
</div>


<?php get_footer(); ?>
