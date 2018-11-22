window.addEventListener('load', function(){
    var mega = document.getElementById('submenu'),
    mini = document.getElementById('submob'),
    subNo = document.getElementById('submenu').childElementCount,
    subNoMin = document.getElementById('submob').childElementCount,
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
      elem = e.target.closest('.menu--wrap-midd-container--bottom-wrapper');
      elemId = elem.id;
      startx = parseInt(touchobj.clientX);
      starty = parseInt(touchobj.clientY);
      go_to = elemId.substring(8);

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
          if((go_to == 1 && distX < 0) || (go_to == subNo && distX > 0)){
            for(let i = 1; i <= subNo; i++) {
              if(distX < 0){
                document.getElementById('submenu_' + i).style.transform = "translateX("+ (-100 * (go_to)) +"%)";
                document.getElementById('submenu_' + i).style.opacity = "0";
                if(i == parseInt(go_to) + 1) {
                  document.getElementById('submenu_' + i).style.opacity = "1";
                }
              } else if (distX > 0) {
                document.getElementById('submenu_' + i).style.transform = "translateX("+ (-100 * (go_to-2)) +"%)";
                document.getElementById('submenu_' + i).style.opacity = "0";
                if(i == parseInt(go_to) - 1) {
                  document.getElementById('submenu_' + i).style.opacity = "1";
                }
              }
              if(document.getElementById('mat_' + i).classList.contains('menu--wrap-midd-container--top-link--active')) {
                document.getElementById('mat_' + i).classList.remove('menu--wrap-midd-container--top-link--active');
              } else {
                document.getElementById('mat_' + i).classList.add('menu--wrap-midd-container--top-link--active');
              }
            }
        }
        }, 100);
      }
    },false);

    mini.addEventListener('touchstart', function(e) {
      touchobj = e.changedTouches[0];
      elem = e.target.closest('.mobilemenu--bottom-container--bottom-wrapper');
      elemId = elem.id;
      startx = parseInt(touchobj.clientX);
      starty = parseInt(touchobj.clientY);
      go_to = elemId.substring(7);

    }, false);
    mini.addEventListener('touchmove', function(e) {
      touchobj = e.changedTouches[0];
      distX = parseInt(touchobj.clientX) - startx;
      distY = parseInt(touchobj.clientY) - starty;
      if(Math.abs(distX) > Math.abs(distY) == true) {
          e.preventDefault();
      }
    }, false);
    mini.addEventListener('touchend', function(e) {
      if(Math.abs(distX) > Math.abs(distY) == true) {
        setTimeout(() => {
          var move = 0;
          if((go_to == 1 && distX < 0) || (go_to == subNo && distX > 0)){
            for(let i = 1; i <= subNoMin; i++) {
              if(distX < 0){
                document.getElementById('submob_' + i).style.transform = "translateX("+ (-100 * (go_to)) +"%)";
                document.getElementById('submob_' + i).style.opacity = "0";
                if(i == parseInt(go_to) + 1) {
                  document.getElementById('submob_' + i).style.opacity = "1";
                }
              } else if (distX > 0) {
                document.getElementById('submob_' + i).style.transform = "translateX("+ (-100 * (go_to-2)) +"%)";
                document.getElementById('submob_' + i).style.opacity = "0";
                if(i == parseInt(go_to)-1) {
                  document.getElementById('submob_' + i).style.opacity = "1";
                }
              }
              if(document.getElementById('matmob_' + i).classList.contains('mobilemenu--bottom-container--top-link--active')) {
                setTimeout(() => {
                  document.getElementById('matmob_' + i).classList.remove('mobilemenu--bottom-container--top-link--active');
                }, 80);
              } else {
                setTimeout(() => {
                  document.getElementById('matmob_' + i).classList.add('mobilemenu--bottom-container--top-link--active');
                }, 80);
              }
            }
        }
        }, 100);
      }
    },false);
}, false)

window.addEventListener('load', function(){
if(document.getElementById('maps')) {
  var maps = document.getElementById('maps'),
  mapscount = document.getElementById('maps').childElementCount,
  startx,
  starty,
  distX = 0,
  distY = 0,
  touchobj = null,
  elem,
  elemId,
  go_to;

  maps.addEventListener('touchstart', function(e) {
    touchobj = e.changedTouches[0];
    elem = e.target.closest('.map');
    elemId = elem.id;
    startx = parseInt(touchobj.clientX);
    starty = parseInt(touchobj.clientY);
    go_to = elemId.substring(4);
  console.log(maps, mapscount, go_to, elemId);

  }, false);

  maps.addEventListener('touchmove', function(e) {
    touchobj = e.changedTouches[0];
    distX = parseInt(touchobj.clientX) - startx;
    distY = parseInt(touchobj.clientY) - starty;
    if(Math.abs(distX) > Math.abs(distY) == true) {
        e.preventDefault();
    }
  }, false);

  maps.addEventListener('touchend', function(e) {
    if(Math.abs(distX) > Math.abs(distY) == true) {
      setTimeout(() => {
        var move = 0;
        if((go_to == 1 && distX < 0) || (go_to == mapscount && distX > 0)){
          for(let i = 1; i <= mapscount; i++) {
            if(distX < 0){
              document.getElementById('map_' + i).style.transform = "translateX("+ (-100 * (go_to)) +"%)";
              document.getElementById('map_' + i).style.opacity = "0";
              if(i == parseInt(go_to) + 1) {
                document.getElementById('map_' + i).style.opacity = "1";
              }
            } else if (distX > 0) {
              document.getElementById('map_' + i).style.transform = "translateX("+ (-100 * (go_to-2)) +"%)";
              document.getElementById('map_' + i).style.opacity = "0";
              if(i == parseInt(go_to) - 1) {
                document.getElementById('map_' + i).style.opacity = "1";
              }
            }
            if(document.getElementById('' + i).classList.contains('circle-active')) {
              document.getElementById('' + i).classList.remove('circle-active');
            } else {
              document.getElementById('' + i).classList.add('circle-active');
            }
          }
      }
      }, 100);
    }
  },false);
}
}, false);
