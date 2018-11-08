<?php /* Template Name: Kontakt */ ?>

<?php
if( !is_front_page() || !is_home()) {
  get_header();
}
?>
  <div class="kontakt">
    <div class="kontakt--inner">
      <div class="kontakt--inner-title">Kontakt</div>
      <form class="kontakt--inner-form" method="POST" action="page-sendmail.php" id="kontaktform">
        <div class="kontakt--inner-form--left">
          <div>
            <label>Ime i Prezime</label>
            <input type="text" name="imeprezime"> </div>
          <div>
            <label>E-mail</label>
            <input type="email" name="mail" type="email"> </div>
        </div>
        <div class="kontakt--inner-form--right">
          <div>
            <label>Naslov</label>
            <input type="text"> </div>
          <div>
            <label>Poruka</label>
            <input type="text" name="message"> </div>
        </div>
      </form>
      <div class="kontakt--inner-button">
        <button onclick="document.getElementById('kontaktform').submit();">
          <p>Poslati</p>
        </button>
      </div>
    </div>
  </div>
<?php
if( !is_front_page() || !is_home()) {
  get_footer();
}
?>
