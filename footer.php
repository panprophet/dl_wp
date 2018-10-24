
<!-- <footer id="footer" role="contentinfo"> -->
    <footer class="info">
      <div class="info--top">
        <div class="info--top-left">
          <div class="info--top-left-badge">
            <div class="rotate">
              <span>
                <!-- <img src="/images/Group 3.svg">  -->
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                  <circle cx="7" cy="7" r="6.5" stroke="#840505"/>
                  <circle cx="6.99999" cy="6.99999" r="4.2" fill="#840505"/>
                </svg>
              </span>
              <span class="title">Footer</span>
            </div>
          </div>
        </div>
        <div class="info--top-right">
          <div class="info--top-right--contact info--top-right--contact-md">
            <div class="section">
              <div class="section--title section--title-medium">Poslovna jedinica Ledine</div>
              <div class="section--info">
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
            <div class="section">
              <div class="section--title">Vojvodjanska 494C, Ledine</div>
              <div class="section--info section--info-md">
                <span>
                  <p>Telefoni:</p>
                  <p>
                    <a href="tel: +38163475063">063/475-063</a>
                  </p>
                </span>
                <span>
                  <p></p>
                  <p>
                    <a href="tel: +381113171550">011/3171-550</a>
                  </p>
                </span>
              </div>
              <div class="section--info-mobile">
                <div class="section--title section--title-small">Prodavnica okova:</div>
                <div class="section--info">
                  <span>
                    <p>
                      <a href="tel: +38166275063">066/275-063</a>
                    </p>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="info--top-right--contact">
            <div class="section section--okovi">
              <div class="section--title section--title-small">Prodavnica okova:</div>
              <div class="section--info">
                <span>
                  <p>
                    <a href="tel: +38166275063">066/275-063</a>
                  </p>
                  <span>
              </div>
            </div>
            <div class="section-link">
              <div class="section-link--social">
                <a href="https://www.facebook.com/drvolux1/"
                   target="_blank">Facebook</a>
              </div>
              <div class="section-link--social">
                <a href="https://www.instagram.com/drvolux/"
                   target="_blank">Instagram</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="info--midd"
           id="maps">
        <a href="https://www.google.com/maps/place/DRVOLUX/@44.799082,20.2897741,13z/data=!4m8!1m2!2m1!1sdrvolux!3m4!1s0x475a68d245f130f1:0x1bc8a56bcc6a57e8!8m2!3d44.799082!4d20.324793" target="_blank">
          <div class="map1"
            id="map_1" style="background-image: url(<?php if(is_home() || is_front_page()) { echo './wp-content/uploads/2018/10/Map_1-1.png'; }
            else if(is_page() && $post->post_parent ) { echo '../../wp-content/uploads/2018/10/Map_1-1.png'; }
            else if(is_page()) { echo '../wp-content/uploads/2018/10/Map_1-1.png'; }
            else if(is_single()) { echo '../../../../wp-content/uploads/2018/10/Map_1-1.png'; } ?>); ">
          </div>
        </a>
        <a href="#" target="_blank">
          <div class="map2" id="map_2" style="background-image: url(<?php if(is_home() || is_front_page()) { echo './wp-content/uploads/2018/10/Map_2.png'; }
            else if(is_page() && $post->post_parent ) { echo '../../wp-content/uploads/2018/10/Map_2.png'; }
            else if(is_page()) { echo '../wp-content/uploads/2018/10/Map_2.png'; }
            else if(is_single()) { echo '../../../../wp-content/uploads/2018/10/Map_2.png'; } ?>);">
          </div>
        </a>
      </div>
      <div class="info--bottom">
        <div class="info--bottom-left">copyright 2018</div>
        <div class="info--bottom-midd">
          <div class="info--bottom-midd--inner">
            <div class="circle circle-active"
                 id="1"
                 onclick="changeMap(event)"></div>
            <div class="circle"
                 id="2"
                 onclick="changeMap(event)"></div>
          </div>
        </div>
        <div class="info--bottom-right">Dimis</div>
      </div>
    </footer>
<?php wp_footer(); ?>
</body>
</html>
