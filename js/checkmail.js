function checkmail() {
  var name = document.getElementById('imeprezime').value;
  var mail = document.getElementById('email').value;
  var subject = document.getElementById('naslov').value;
  var text = document.getElementById('poruka').value;
  var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  if( name == '' || mail == '' || subject == '' || text == '' || !re.test(mail)) {
    document.getElementById('errormail').classList.add('kontakt--inner-button--message-show');
    if(!re.test(mail)) {
      document.getElementById('email').focus();
    }
  } else {
    document.getElementById('errormail').classList.remove('kontakt--inner-button--message-show');
    document.getElementById('kontaktform').submit();
  }
}
