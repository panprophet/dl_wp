<?php /* Template Name: Mail sent */ ?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
get_header();
?>
<div class="response">
  <?php
    $to = "office@drvolux.rs";
    $from = $_POST["usermail"];
    $imeprezime = $_POST["imeprezime"];
    $subject = $_POST["naslov"];
    $message = $_POST["message"];
    $message = "Poruka od:" .$imeprezime. "\r\n" .$message;
    $headers = "From: $imeprezime <$from>"."\r\n"."Reply-to: $from"."\r\n"."X-Mailer: PHP/".phpversion();

    if(wp_mail($to, $subject, $message, $headers)) {
  ?>
    <div class="response--container">
      <div class="response--container-logo" style="background-image: url(<?php echo '../../wp-content/uploads/2018/10/drvo_lux_logo.png'; ?>); background-repeat: no-repeat;"></div>
      <div class="response--container-text">
        <p class="response--container-text--big">Hvala što ste poslali E-mail</p>
        <p class="response--container-text--small">Uskoro cemo Vas kontaktirati</p>
      </div>
      <div class="response--container-link">
        <a href="<?php home_url('/');?>">Home</a>
      </div>
    </div>
  <?php
    } else {
  ?>
  <div class="response--container">
    <div class="response--container-logo" style="background-image: url(<?php echo '../../wp-content/uploads/2018/10/drvo_lux_logo.png'; ?>); background-repeat: no-repeat;"></div>
    <div class="response--container-text">
        <p class="response--container-text--big">Došlo je do greške prilikom slanja</p>
        <p class="response--container-text--small">Molimo vas pokušajte kasnije</p>
    </div>
    <div class="response--container-link">
        <a href="<?php echo home_url('/');?>">Home</a>
    </div>
  </div>
<?php
    }
?>
</div>
<?php get_footer(); ?>
