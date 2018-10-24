<?php /* Template Name: Landing Page */ ?>

<?php get_header(); ?>

<div class="landing">
  <div class="landing--left">
    <div class="landing--left-icon">
      <p>
        <a href="https://www.instagram.com/drvolux/" target="_blank">Instagram</a>
      </p>
    </div>
    <div class="landing--left-icon">
      <p>
        <a href="https://www.facebook.com/drvolux1/" target="_blank">Facebook</a>
      </p>
    </div>
    <div class="landing--left-badge">
      <div class="rotate">
        <span>
          <!-- <img src="/images/Group 3.svg">  -->
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
            <circle cx="7" cy="7" r="6.5" stroke="#840505"/>
            <circle cx="6.99999" cy="6.99999" r="4.2" fill="#840505"/>
          </svg>
          </span>
        <span class="title">Pocetna</span>
      </div>
    </div>
  </div>
  <div class="landing--right">
    <div class="landing--right-top">
      <div class="landing--right-top-left">
        <p class="title-big">Savršen Spoj</p>
        <p class="title-lilliput">Među prvima u Srbiji - kantovanje laserom</p>
      </div>
      <div class="landing--right-top-midd">
        <div class="landing--right-top-midd--title">Poslovna jedinica Jajinci</div>
        <div class="landing--right-top-midd--info">
          <span>
            <p>Ponedeljak - Petak</p>
            <p>8:00 - 19:00</p>
          </span>
          <span>
            <p>Subota</p>
            <p>8:00 - 15:00</p>
          </span>
        </div>
      </div>
      <div class="landing--right-top-right">
        <div class="landing--right-top-right--title">Poslovna jedinica Ledine</div>
        <div class="landing--right-top-right--info">
          <span>
            <p>Ponedeljak - Petak</p>
            <p>8:00 - 19:00</p>
          </span>
          <span>
            <p>Subota</p>
            <p>8:00 - 15:00</p>
          </span>
        </div>
      </div>
    </div>
    <div class="landing--right-bottom">
      <div class="image" style="background-image: url(<?php the_field('landinghome') ?>); "></div>
    </div>
  </div>
</div>
<div class="usluge">
  <div class="usluge--left">
    <div class="usluge--left-badge">
      <div class="rotate">
        <span>
          <!-- <img src="/images/Group 3.svg">  -->
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
            <circle cx="7" cy="7" r="6.5" stroke="#840505"/>
            <circle cx="6.99999" cy="6.99999" r="4.2" fill="#840505"/>
          </svg>
        </span>
        <span class="title">Usluge</span>
      </div>
    </div>
  </div>
  <div class="usluge--right">
    <div class="usluge--right-top">
      <div class="tab tab-red"
            id="tab1"
            onclick="changeTab(event)">Fizčka Lica</div>
      <div class="tab"
            id="tab2"
            onclick="changeTab(event)">Profesionalna lica</div>
    </div>
    <div class="usluge--right-bottom">
      <div class="arrow"
            onclick="slideImages(event)">
        <!-- <img src="/images/arrow_right.svg">  -->
        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
          <path d="M0.5 17.375L23.3188 17.375L12.8375 27.8563L15.5 30.5L30.5 15.5L15.5 0.5L12.8563 3.14375L23.3188 13.625L0.5 13.625L0.5 17.375Z" fill="#E0E1E2"/>
        </svg>
      </div>
      <!-- Fizicka lica -->
      <div class="gallery"
            id="galleryFizicka">
        <?php
        $counter = 1;
        if(have_rows('servicespersonal')):
          while(have_rows('servicespersonal')): the_row();
        ?>
        <div class="wrap"
              id="<?php echo "pic_".$counter ?>">
          <div class="wrap--number"><?php if($counter < "10") {
            echo '0'. $counter;
          } else {
            echo $counter;
          } ?></div>
          <div class="wrap--picture"
                style="background-image: url(<?php the_sub_field('serviceimage') ?>); background-size: cover; background-repeat: no-repeat;">
            <div class="title">
              <p><img src="<?php the_sub_field('serviceicon') ?>"> </p>
              <p><a href=""><?php the_sub_field('servicelabel') ?></a></p>
            </div>
          </div>
          <div class="wrap--text"><?php the_sub_field('servicetext') ?></div>
        </div>
        <?php $counter++; ?>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <!-- Fizicka lca -->
      <!-- Profesionalna lica -->
      <div class="gallery"
            id="galleryProf">
            <?php
        $counter = 1;
        if(have_rows('servicesprofesional')):
          while(have_rows('servicesprofesional')): the_row();
        ?>
        <div class="wrap"
              id="<?php echo "prof_".$counter ?>">
          <div class="wrap--number"><?php if($counter < "10") {
            echo '0'. $counter;
          } else {
            echo $counter;
          } ?></div>
          <div class="wrap--picture"
                style="background-image: url(<?php the_sub_field('serviceimage') ?>); background-size: cover; background-repeat: no-repeat;">
            <div class="title">
              <p><img src="<?php the_sub_field('serviceicon') ?>"> </p>
              <p><?php the_sub_field('servicelabel') ?></p>
            </div>
          </div>
          <div class="wrap--text"><?php the_sub_field('servicetext') ?></div>
        </div>
        <?php $counter++; ?>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <!-- Profesionalna lica-->
    </div>
  </div>
</div>

<div class="kantovanje">
  <div class="kantovanje--left"></div>
  <div class="kantovanje--right">
    <div class="kantovanje--right-top">
      <div class="kantovanje--right-top--info">
        <div class="title">Lasersko Kantovanje</div>
        <div class="text"><?php the_field('pasus1'); ?></div>
        <div class="text"><?php the_field('pasus2'); ?></div>
      </div>
      <div class="kantovanje--right-top--image" style="background-image: url('<?php the_field('kantovanjeimage'); ?>');"></div>
    </div>
    <div class="kantovanje--right-bottom">
      <div class="line"></div>
      <div class="link">
        <a href="#">Vidi više</a>
      </div>
    </div>
  </div>
</div>
<div class="single_picture">
  <div class="single_picture--frame">
    <img src="<?php the_field('singleimage') ?>"> </div>
</div>
<div class="partners">
  <div class="partners--inner">
    <div class="partners--inner-left">
      <div class="partners--inner-left-badge">
        <div class="rotate">
          <span>
            <!-- <img src="/images/Group 3.svg">  -->
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
            <circle cx="7" cy="7" r="6.5" stroke="#840505"/>
            <circle cx="6.99999" cy="6.99999" r="4.2" fill="#840505"/>
          </svg>
          </span>
          <span class="title">Brendovi</span>
        </div>
      </div>
    </div>
    <div class="partners--inner-right">
      <div class="partners--inner-right--top">

      <?php if(have_rows('partnerstop')):

        while(have_rows('partnerstop')): the_row();

        ?>
        <div class="partner">
          <img src="<?php the_sub_field('partner') ?>"> </div>

      <?php endwhile; ?>
      <?php endif; ?>

      </div>
      <div class="partners--inner-right--top">
      <?php if(have_rows('partnersbottom')):

        while(have_rows('partnersbottom')): the_row();

        ?>
        <div class="partner">
          <img src="<?php the_sub_field('partner2') ?>"> </div>
      <?php endwhile; ?>
      <?php endif; ?>
      </div>

    </div>
  </div>
</div>

<?php get_template_part('/page-templates/page', 'kontakt'); ?>

<?php get_footer(); ?>
