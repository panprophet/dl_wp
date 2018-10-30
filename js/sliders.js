var no = 0;
// images slider
window.addEventListener('load', function(){
    var car1 = document.getElementById('galleryFizicka'),
    car2 = document.getElementById('galleryProf'),
    startx,
    starty,
    distX = 0,
    distY = 0,
    touchobj = null,
    sel;
    var dotsFiz = document.getElementById("innerdotsfiz").childElementCount;
    var dotsProf = document.getElementById("innerdotsprof").childElementCount;

    car1.addEventListener('touchstart', function(e) {
        touchobj = e.changedTouches[0];
        startx = parseInt(touchobj.clientX);
        starty = parseInt(touchobj.clientY);
    }, false);

    car1.addEventListener('touchmove', function(e) {
        touchobj = e.changedTouches[0];
        distX = parseInt(touchobj.clientX) - startx;
        distY = parseInt(touchobj.clientY) - starty;
        if(Math.abs(distX) > Math.abs(distY) == true) {
            e.preventDefault();
        }
    }, false);
    car1.addEventListener('touchend', function(e) {
    if(Math.abs(distX) > Math.abs(distY) == true) {
        setTimeout(() => {
            var move = 0;

            for(let i = 1; i <= dotsFiz; i++) {
                if (document.getElementById('dotfiz_' + i).classList.contains("focus")){
                    document.getElementById('dotfiz_' + i).classList.remove("focus");
                    sel = i;
                }
            }
            for(let i = 1; i <= dotsFiz; i++) {
                if(distX < 0 && sel < dotsFiz){
                    move = sel;
                    // moveSection(move, i);
                    document.getElementById('pic_' + i).style.transform = "translateX("+ (-100 * (move)) +"%)";
                } else if (distX > 0 && sel > 1) {
                    move = sel - 2;
                    // moveSection(move, i);
                    document.getElementById('pic_' + i).style.transform = "translateX("+ (-100 * (move)) +"%)";

                }
            }

            if(distX < 0 && sel < dotsFiz) {
                document.getElementById('dotfiz_' + (sel+1)).classList.add("focus");
            } else if(distX > 0 && sel > 1){
                document.getElementById('dotfiz_' + (sel-1)).classList.add("focus");
            } else {
                document.getElementById('dotfiz_' + sel).classList.add("focus");
            }
        }, 100);
    }

    },false);

    car2.addEventListener('touchstart', function(e) {
        touchobj = e.changedTouches[0];
        startx = parseInt(touchobj.clientX);
        starty = parseInt(touchobj.clientY);
    }, false);

    car2.addEventListener('touchmove', function(e) {
        touchobj = e.changedTouches[0];
        distX = parseInt(touchobj.clientX) - startx;
        distY = parseInt(touchobj.clientY) - starty;
        if(Math.abs(distX) > Math.abs(distY) == true) {
            e.preventDefault();
        }
    }, false);
    car2.addEventListener('touchend', function(e) {
    if(Math.abs(distX) > Math.abs(distY) == true) {
        setTimeout(() => {
            var move = 0;

            for(let i = 1; i <= dotsProf; i++) {
                if (document.getElementById('dotprof_' + i).classList.contains("focus")){
                    document.getElementById('dotprof_' + i).classList.remove("focus");
                    sel = i;
                }
            }
            for(let i = 1; i <= dotsProf; i++) {
                if(distX < 0 && sel < dotsProf){
                    move = sel;
                    // moveSection(move, i);
                    document.getElementById('prof_' + i).style.transform = "translateX("+ (-100 * (move)) +"%)";
                } else if (distX > 0 && sel > 1) {
                    move = sel - 2;
                    // moveSection(move, i);
                    document.getElementById('prof_' + i).style.transform = "translateX("+ (-100 * (move)) +"%)";

                }
            }

            if(distX < 0 && sel < dotsProf) {
                document.getElementById('dotprof_' + (sel+1)).classList.add("focus");
            } else if(distX > 0 && sel > 1){
                document.getElementById('dotprof_' + (sel-1)).classList.add("focus");
            } else {
                document.getElementById('dotprof_' + sel).classList.add("focus");
            }
        }, 100);
    }
    },false);
}, false);
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
function go_to_slide(arg1, arg2) {
  let difference = arg1 - arg2;
  let slides = document.getElementById('megaslider').childElementCount;

  if( arg2 > 0 && document.getElementById('megaslider').classList.contains('slideshows--hidden') ) {
    document.getElementById('megaslider').classList.remove('slideshows--hidden');
    document.getElementById('megaslider').classList.add('slideshows--shown');
    for(let i = 1; i <= slides; i++) {
      // console.log(100 * difference * i);

      document.getElementById('slide_' + i).style.transform = "translateX(" + (-100 * ((arg2 - 1))) + "%)";
    }
  }
  if( arg1 === 0 && arg2 === 0 && document.getElementById('megaslider').classList.contains('slideshows--shown') ) {
    document.getElementById('megaslider').classList.remove('slideshows--shown');
    document.getElementById('megaslider').classList.add('slideshows--hidden');
  }
  if ( arg2 !== 0 && document.getElementById('megaslider').classList.contains('slideshows--shown') ) {

    console.log(difference);

    for(let i = 1; i <= slides; i++) {
      document.getElementById('slide_' + i).style.transform = "translateX(" + (-100 * ((arg2 - 1))) + "%)";
      if( arg2 > slides ) {
        setTimeout(() => {
          document.getElementById('megaslider').classList.remove('slideshows--shown');
          document.getElementById('megaslider').classList.add('slideshows--hidden');
        }, 800);
      }
    }
  }

}
