function searchbox(event) {
  var term = event.target.value;
  var container = document.getElementById('searchresults');
  container.innerHTML = "";

  var materijali_s = new XMLHttpRequest();
  var grupe_s = new XMLHttpRequest();

      materijali_s.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          // console.log('im in');
        }
      };
      grupe_s.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          // console.log('im in');
        }
      };
      materijali_s.open('GET', 'http://localhost/drvolux/wp-json/wp/v2/materijali?search=' + term + '');
      materijali_s.send();
      materijali_s.onload = function(posts) {

        var data = JSON.parse(materijali_s.responseText);
        data.forEach(elem => {
          if(term != '') {
            setTimeout(() => {
              container.innerHTML += '<div class="search--results-container--row"><a href="' + elem.guid.rendered +  '"><div class="search--results-container--row-title">' + elem.title.rendered + '</div></a></div>';
            }, 500);
          }
        });
      };
      grupe_s.open('GET', 'http://localhost/drvolux/wp-json/wp/v2/pages?search=' + term + '');
      grupe_s.send();
      grupe_s.onload = function(posts) {

        var data = JSON.parse(grupe_s.responseText);
        data.forEach(elem => {
          // console.log(elem.link, elem.name);
          if(term != '') {
            setTimeout(() => {
              container.innerHTML += '<div class="search--results-container--row"><a href="' + elem.guid.rendered +  '"><div class="search--results-container--row-title">' + elem.title.rendered + '</div></a></div>';
            }, 500);
          }
        });
      };


};
