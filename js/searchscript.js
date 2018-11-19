var datamat;
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
  window.onwheel = preventDefault; // modern standard
  window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
  window.ontouchmove  = preventDefault; // mobile
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
    // startScroller();
  } else {
    get_data('http://localhost/drvolux/wp-json/wp/v2/materijali?per_page=100')
      .then((res) => {
        datamat = JSON.parse(res.responseText);
        document.getElementById('searchbox').classList.add('search--expanded');
        // stopScroller();
      })
      .catch((err)=>{
        console.log(err);
      });
  }
}
function getSearch(event){
  if(event.target.value !== event.altKey || event.target.value !== event.ctrlKey){
    setTimeout(() => {
        var term = event.target.value.toLowerCase();
        searchbox(term);
    }, 1500);
  }
}
async function searchbox(term) {
  var container = document.getElementById('searchresults');
  var data;
  var foundindex = -1;
  setTimeout(() => {
    container.innerHTML = "";
  }, 500);

  get_data('http://localhost/drvolux/wp-json/wp/v2/pages?search=' + term + '')
  .then((res) => {
    data = JSON.parse(res.responseText);
  })
  .then(() => {
    // if(data && term != '' && term != ' ') {
    if(data && term != '' && term != ' ' && term.length > 1) {
      data.forEach(elem => {
        if(elem.title.rendered !== 'Landing page') {
          setTimeout(() => {
            container.innerHTML += '<div class="search--results-container--row"><a href="' + elem.guid.rendered +  '"><div class="search--results-container--row-title">' + elem.title.rendered + '</div></a><div class="search--results-container--row-sifra">Svi proizvodi</div></div>';
          }, 1000);
        }
      });
    }
  })

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
// function displayResults(link, title, elem_id, container){

//   if(title != '' && elem_id != '') {

//     container.innerHTML += '<div class="search--results-container--row"><a href="' + link +  '"><div class="search--results-container--row-title">' + title + '</div></a><div class="">' + elem_id + '</div></div>';
//   } else {
//     container.innerHTML = '';
//   }
// }
