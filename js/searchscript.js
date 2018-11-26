var datamat;
var data;
var keys = {37: 1, 38: 1, 39: 1, 40: 1};

function preventDefault(e) {
  e = e || window.event;
  if (e.preventDefault)
      e.preventDefault();
  e.returnValue = false;
}

function preventDefaultForScrollKeys(e) {
    if (keys[e.keyCode]) {
        preventDefault(e);
        return false;
    }
}

function stopScroller() {
  window.onwheel = preventDefault;
  window.onmousewheel = document.onmousewheel = preventDefault;
  window.ontouchmove  = preventDefault;
  document.onkeydown  = preventDefaultForScrollKeys;
  var searchbox = document.getElementById('searchbox');
  searchbox.onmousewheel = document.onmousewheel = null;
  searchbox.onwheel = null;
  searchbox.ontouchmove = null;
  searchbox.onkeydown = null;
}

function startScroller() {
  window.onmousewheel = document.onmousewheel = null;
  window.onwheel = null;
  window.ontouchmove = null;
  document.onkeydown = null;
}

async function toggleSearch() {
  if(document.getElementById('searchbox').classList.contains('search--expanded')) {
    document.getElementById('searchbox').classList.remove('search--expanded');
    document.getElementById('searchbox').classList.add('search--collapsed');

    document.getElementsByName('search')[0].value = '';
    document.getElementById('searchresults').innerHTML = '';
    // startScroller();
  } else {
    get_data('http://localhost/drvolux/wp-json/wp/v2/materijali?per_page=100')
    // get_data('http://drvolux.rs/wp-json/wp/v2/materijali?per_page=100')
      .then((res) => {
        var time;

        if(document.getElementById("dropdown") && document.getElementById("dropdown").classList.contains("menu--wrap-show")){
            toggleMenu();
            time = 800;
        } else {
          time = 0;
        }
        if(document.getElementById("dropdownmob") && document.getElementById("dropdownmob").classList.contains("mobilemenu--bottom-show")) {
          toggleMobileMenu();
          time = 800;
        } else {
          time = 0;
        }
        datamat = JSON.parse(res.responseText);

        get_data('http://drvolux.rs/wp-json/wp/v2/pages?per_page=100')
        .then((res) => {
          data = JSON.parse(res.responseText);
        })
        .catch((err)=>{
          console.log(err);
        });
        setTimeout(() => {
          document.getElementById('searchbox').classList.remove('search--collapsed');
          document.getElementById('searchbox').classList.add('search--expanded');
        }, time);
        document.getElementById('searchfield').focus();
        // stopScroller();
      })
      .catch((err)=>{
        console.log(err);
      });
  }
};
function getSearch(event){
  var timeout;
  if(event.target.value !== event.altKey || event.target.value !== event.ctrlKey){
    setTimeout(() => {
        var term = event.target.value.toLowerCase();
        searchbox(term)
    }, 1500);
  }
}
async function searchbox(term) {
  var container = document.getElementById('searchresults');
  var foundindex = -1;
  setTimeout(() => {
    container.innerHTML = "";
  }, 500);

    data.forEach(elem => {
    if(data && term != '' && term != ' ' && term.length > 1 && elem.title.rendered !== 'Landing page' && elem.title.rendered !== 'Email sent') {
      if(elem.title.rendered !== 'Landing page') {
        if(elem.title.rendered.toLowerCase().indexOf(term) >= 0) {

          setTimeout(() => {
            container.innerHTML += '<div class="search--results-container--row"><a href="' + elem.guid.rendered +  '"><div class="search--results-container--row-title">' + elem.title.rendered + '</div></a><div class="search--results-container--row-sifra">Svi proizvodi</div></div>';
          }, 500);
        }
      }
    }
  });

  datamat.forEach((elem, index) => {
    if(term != '' && term != ' ' && term.length > 1) {
      if(elem.title.rendered.toLowerCase().indexOf(term) >= 0) {
        setTimeout(() => {
          container.innerHTML += '<div class="search--results-container--row"><a href="' + elem.guid.rendered +  '"><div class="search--results-container--row-title">' + elem.title.rendered + '</div></a><div class="search--results-container--row-sifra">' + elem.materijali_element.materijali_element_0_id_elementa + '</div></div>';
        }, 500);
      }
    } else {
        container.innerHTML = '';
    }
    Object.keys(elem).forEach(function(key) {
      if(key == 'materijali_element'){
        var obj =  elem[key];
        Object.keys(obj).forEach(function(key) {
          if((key == 'materijali_element_0_id_elementa' || key == 'materijali_element_0_debljina_materijala' || key == 'materijali_element_0_proizvodjac') && (term != '' && term != ' ') ) {
            if(obj[key][0].toLowerCase().indexOf(term) >= 0){
              setTimeout(() => {
                container.innerHTML += '<div class="search--results-container--row"><a href="' + elem.guid.rendered +  '"><div class="search--results-container--row-title">' + elem.title.rendered + '</div></a><div class="search--results-container--row-sifra">' + elem.materijali_element.materijali_element_0_id_elementa + '</div></div>';
              }, 500);
            } else {
              container.innerHTML = '';
            }
          }
        });
      }
    });
  });
};
function get_data(url) {
  var other_s = new XMLHttpRequest();

  return new Promise((resolve, reject) => {
    other_s.onreadystatechange = function() {
      if(this.readyState !== 4 ) return;
        if(other_s.status >= 200 && other_s.status < 300) {
          resolve(other_s);
        } else {
          reject({status: this.status, statusText: other_s.statusText});
        }

    };
    other_s.open('GET', url);
    other_s.send();
  });
}
