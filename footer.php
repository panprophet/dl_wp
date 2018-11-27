
<!-- <footer id="footer" role="contentinfo"> -->
  <?php if(!is_single()) : ?>
    <footer class="info">
      <div class="info--top">
        <div class="info--top-left">
          <div class="info--top-left-badge">
            <div class="rotate">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                  <circle cx="7" cy="7" r="6.5" stroke="#840505"/>
                  <circle cx="6.99999" cy="6.99999" r="4.2" fill="#840505"/>
                </svg>
              </span>
              <span class="title">Footer</span>
            </div>
          </div>
        </div>
        <!-- levi -->
        <div class="info--top-right f_shown" id="info_1">
          <div class="info--top-right--contact info--top-right--contact-md">
            <div class="section">
              <div class="section--title section--title-medium" id="expo_1">Poslovna jedinica Ledine</div>
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
              <div class="section--title" id="address_1">Vojvođanska 494C, Ledine</div>
              <div class="section--info section--info-md">
                <span>
                  <p>Telefoni:</p>
                  <p>
                    <a href="tel: +38163475063">063/475-063</a>
                  </p>
                </span>
                <span>
                  <p></p>
                  <p id="phone_1">
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
        <!-- desni -->
        <div class="info--top-right f_hidden" id="info_2">
          <div class="info--top-right--contact info--top-right--contact-md">
            <div class="section">
              <div class="section--title section--title-medium" id="expo_2">Poslovna jedinica Jajinci</div>
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
              <div class="section--title" id="address_2">Bul. Oslobođenja 8</div>
              <div class="section--info section--info-md">
                <span>
                  <p>Telefoni:</p>
                  <p>
                    <a href="tel: +38163475063">063/475-063</a>
                  </p>
                </span>
                <span>
                  <p></p>
                  <p id="phone_2">
                    <a href="tel: +381113940014">011/3940-014</a>
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
        <!-- desni kraj -->
      </div>
      <div class="info--midd"
           id="maps">
        <div class="map map1" id="map_1" >
          <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
          integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
          crossorigin=""/>

          <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
          integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
          crossorigin=""></script>

          <script>
              var MapStr = '44.799082,20.3226043,17';
              var lat  = Number( MapStr.split(',')[0] );
              var lng  = Number( MapStr.split(',')[1] );
              var map =  L.map('map_1').setView([lat, lng ], 16);

              L.tileLayer('http://{s}.tiles.wmflabs.org/bw-mapnik/{z}/{x}/{y}.png', {
                  attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
              }).addTo(map);

              var marker = new L.marker([lat, lng]).addTo(map);
          </script>
        </div>
        <div class="map map2" id="map_2" >
          <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
          integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
          crossorigin=""/>

          <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
          integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
          crossorigin=""></script>

          <script>
              var MapStr = '44.726442,20.4882643,17';
              var lat  = Number( MapStr.split(',')[0] );
              var lng  = Number( MapStr.split(',')[1] );
              var map =  L.map('map_2').setView([lat, lng ], 16);

              L.tileLayer('http://{s}.tiles.wmflabs.org/bw-mapnik/{z}/{x}/{y}.png', {
                  attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
              }).addTo(map);

              var marker = new L.marker([lat, lng]).addTo(map);
          </script>
        </div>
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
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
