// show hide menu, change svg hamburger fill
function toggleMenu() {
  if(document.getElementById("dropdown").classList.contains("menu--wrap-hide")) {
    var timeout;

    if(document.getElementById('searchbox').classList.contains('search--expanded')) {
      toggleSearch();
      timeout = 850;
    } else {
      timeout = 0;
    }

    setTimeout(() => {
      document.getElementById("dropdown").classList.remove("menu--wrap-hide");
      document.getElementById("dropdown").classList.add("menu--wrap-show");
      document.getElementById("links").classList.remove("menu--top-links--closed")
      document.getElementById("links").classList.add("menu--top-links--opened")
      document.getElementById("ham").classList.remove("st0");
      document.getElementById("ham").classList.add("st1");

      if(document.getElementById("singlelinks")) {
        document.getElementById("singlelinks").classList.remove("menu--top-links-single--open");
        document.getElementById("singlelinks").classList.add("menu--top-links-single--close");
      }
    }, timeout);
  } else {
    document.getElementById("dropdown").classList.remove("menu--wrap-show");
    document.getElementById("dropdown").classList.add("menu--wrap-hide");
    document.getElementById("links").classList.remove("menu--top-links--opened")
    document.getElementById("links").classList.add("menu--top-links--closed")
    document.getElementById("ham").classList.remove("st1");
    document.getElementById("ham").classList.add("st0");

    setTimeout(function(){
      if(document.getElementById("singlelinks")){
        document.getElementById("singlelinks").classList.remove("menu--top-links-single--close");
        document.getElementById("singlelinks").classList.add("menu--top-links-single--open");
      }
    }, 850);
  }
}
function toggleMobileMenu() {
  if(document.getElementById("dropdownmob").classList.contains("mobilemenu--bottom-hide")) {
    var timeout;

    if(document.getElementById('searchbox').classList.contains('search--expanded')) {
      toggleSearch();
      timeout = 850;
    } else {
      timeout = 0;
    }
    setTimeout(() => {
      document.getElementById("dropdownmob").classList.remove("mobilemenu--bottom-hide");
      document.getElementById("dropdownmob").classList.add("mobilemenu--bottom-show");
      document.getElementById("hammobile").classList.remove("st0");
      document.getElementById("hammobile").classList.add("st1");
      document.getElementById("contact").classList.remove("mobilemenu--top-choice--contact-hide");
      document.getElementById("contact").classList.add("mobilemenu--top-choice--contact-show");
    }, timeout);

  } else {
    document.getElementById("dropdownmob").classList.remove("mobilemenu--bottom-show");
    document.getElementById("dropdownmob").classList.add("mobilemenu--bottom-hide");
    document.getElementById("hammobile").classList.remove("st1");
    document.getElementById("hammobile").classList.add("st0");
    document.getElementById("contact").classList.remove("mobilemenu--top-choice--contact-show");
    document.getElementById("contact").classList.add("mobilemenu--top-choice--contact-hide");
    // setTimeout(function(){
    //   document.getElementById("singlelinks").classList.remove("mobilemenu--top-links-single--close");
    //   document.getElementById("singlelinks").classList.add("mobilemenu--top-links-single--open");
    // }, 850);

  }
}
// change tab in submenu
function changeTab(event) {
  let tab_id = event.target.id;

  if(tab_id === 'tab1' && document.getElementById("tab2").classList.contains("tab-red")){
    document.getElementById("tab2").classList.remove("tab-red");
    document.getElementById("tab1").classList.add("tab-red");
    document.getElementById("galleryFizicka").classList.remove("gallery-hide");
    // setTimeout(function() {
    document.getElementById("galleryProf").classList.add("gallery-hide");
    document.getElementById("markerfiz").classList.remove("dots--none");
    document.getElementById("markerprof").classList.add("dots--none");
    // }, 1600);
  } else if(tab_id === 'tab2' && document.getElementById("tab1").classList.contains("tab-red")) {
    document.getElementById("tab1").classList.remove("tab-red");
    document.getElementById("tab2").classList.add("tab-red");
    document.getElementById("galleryProf").classList.remove("gallery-hide");
    document.getElementById("galleryFizicka").classList.add("gallery-hide");
    document.getElementById("markerprof").classList.remove("dots--none");
    document.getElementById("markerfiz").classList.add("dots--none");
  }
}
// submenu animation
function subMenu(section) {
  var section = section;
  var noSubMenus = document.getElementById('submenu').childElementCount;
  var noSubMenus2 = document.getElementById('submob').childElementCount;

  for(var i = 1; i <= noSubMenus; i++ ){
    document.getElementById('submenu_' + i).style.transform = "translateX(" + (-100 * (section-1))  + "%)";
    document.getElementById('submob_' + i).style.transform = "translateX(" + (-100 * (section-1))  + "%)";
  }
  subLinkActive(section);
}
function subLinkActive(section) {
  var noSubLinks = document.getElementById('subLink').childElementCount;
  var noSubLinks2 = document.getElementById('subLink2').childElementCount;
  for(var i = 1; i <= noSubLinks; i++) {
   if(document.getElementById('mat_' + i).classList.contains('menu--wrap-midd-container--top-link--active')){
     document.getElementById('mat_' + i).classList.remove('menu--wrap-midd-container--top-link--active');
     document.getElementById('matmob_' + i).classList.remove('mobilemenu--bottom-container--top-link--active');
   }
  }
  document.getElementById('mat_' + section).classList.add('menu--wrap-midd-container--top-link--active');
  document.getElementById('matmob_' + section).classList.add('mobilemenu--bottom-container--top-link--active');
}
function expand_decription(idelem) {
  var noElem = document.getElementsByClassName('elements-description--element').length;
  for(var i = 1; i <= noElem; i++) {
    if(document.getElementById('material_' + i + '').classList.contains('elements-description--material--expanded')){
      document.getElementById('material_' + i + '').classList.remove('elements-description--material--expanded');
      document.getElementById('material_' + i + '').classList.add('elements-description--material--collapsed');
    }
  }
  setTimeout(() => {
    document.getElementById('material_' + idelem + '' ).classList.remove('elements-description--material--collapsed');
    document.getElementById('material_' + idelem + '' ).classList.add('elements-description--material--expanded');
  }, 800);

}

function setBorder(id) {
  document.getElementById(id).style.borderBottom = "1px solid #840505";
}
function removeBorder(id) {
  document.getElementById(id).style.borderBottom = "1px solid rgba(196, 196, 196, 0.2)";
}
