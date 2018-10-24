var no = 0;
// images slider
function slideImages(event) {
  event.preventDefault;
  let noPics;
  let elemId;
  if (document.getElementById("galleryFizicka").classList.contains("gallery-hide")){
    noPics = document.getElementById("galleryProf").childElementCount;
    elemId = "prof_";
  } else {
    noPics = document.getElementById("galleryFizicka").childElementCount;
    elemId = "pic_";
  }
  if(no >= 0 && no < noPics-3 ){
    no += 1;
  } else {
    no = 0;
  }
  for(var i = 1; i <= noPics; i++) {
    document.getElementById(elemId + i).style.transform = "translateX(" + (-100 * no)  + "%)";
  }
}
// footer map slider
function changeMap(event) {
  let elemId = event.target.id;
  let noMaps = document.getElementById("maps").childElementCount;
  // if(elemId === '2') {
  for(var i = 1; i <= noMaps; i++ ){
    document.getElementById("map_" + i).style.transform = "translateX(" + (-100 * (elemId-1)) + "%)";
  }
  if(elemId === '2') {
    document.getElementById(elemId-1).classList.remove('circle-active');
    document.getElementById(elemId).classList.add('circle-active');
  } else {
    document.getElementById(parseInt(elemId)+1).classList.remove('circle-active');
    document.getElementById(elemId).classList.add('circle-active');
  }
}
function single_gallery(event) {
  let action = event;
  let elemId = document.getElementById('slide').childElementCount;
  let pagefrom = document.getElementById('pagefrom').innerHTML;
  // let pageto = document.getElementById('pageto');
  let page = 1;

  if(action === 'next') {
    for (let i = 1; i <= elemId; i++){
      document.getElementById(i).style.transform = "translateX(" + (-100 * (elemId-1)) + "%)";
    }
    if ( page <= elemId ) {
      page += 1;
    }
  } else if(action === 'prev') {
    for (let i = 1; i <= elemId; i++){
      document.getElementById(i).style.transform = "translateX(" + ( -100 * (elemId-2)) + "%)";
    }
    if (page > 1) {
      page -= 1;
    }
  }
  if( page < 10 ) {
    document.getElementById('pagefrom').innerHTML = "0" + page;
  }
}
function gallery_expand() {
  if(document.getElementById('gallerybody').classList.contains('gallery--body-less')){
    document.getElementById('gallerybody').classList.remove('gallery--body-less');
    document.getElementById('gallerybody').classList.add('gallery--body-more');
  } else {
    document.getElementById('gallerybody').classList.remove('gallery--body-more');
    document.getElementById('gallerybody').classList.add('gallery--body-less');
  }
}
