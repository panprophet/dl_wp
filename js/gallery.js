window.addEventListener('load', function(){
  if(document.getElementById('megaslider')) {
    var mega = document.getElementById('megaslider'),
    picNo = document.getElementById('megaslider').childElementCount,
    startx,
    starty,
    distX = 0,
    distY = 0,
    touchobj = null,
    elem,
    elemId,
    go_to,
    sel;

    mega.addEventListener('touchstart', function(e) {
      touchobj = e.changedTouches[0];
      elem = e.target.closest('.slideshows-inner');
      elemId = elem.id;
      startx = parseInt(touchobj.clientX);
      starty = parseInt(touchobj.clientY);
      go_to = elemId.substring(6);
    }, false);


    mega.addEventListener('touchmove', function(e) {
      touchobj = e.changedTouches[0];
      distX = parseInt(touchobj.clientX) - startx;
      distY = parseInt(touchobj.clientY) - starty;
      if(Math.abs(distX) > Math.abs(distY) == true) {
          e.preventDefault();
      }
    }, false);

    mega.addEventListener('touchend', function(e) {
      if(Math.abs(distX) > Math.abs(distY) == true) {
          setTimeout(() => {
            var move = 0;
            if((go_to == 1 && distX > 0) || (go_to == picNo && distX < 0)){
              document.getElementById('megaslider').classList.remove('slideshows--shown');
              document.getElementById('megaslider').classList.add('slideshows--hidden');
            }
            for(let i = 1; i <= picNo; i++) {
              if(distX < 0){
                document.getElementById('slide_' + i).style.transform = "translateX("+ (-100 * (go_to)) +"%)";
              } else if (distX > 0) {
                document.getElementById('slide_' + i).style.transform = "translateX("+ (-100 * (go_to-2)) +"%)";
              }
            }
          }, 100);
      }
    },false);
  }
}, false);
