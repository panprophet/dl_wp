<?php /* Template Name: Sent mail */ ?>

<?php get_header(); ?>
<div class="response">
  <?php
    $to = "office@drvolux.rs";
    $from = $_POST["mail"];
    $imeprezime = $_POST["imeprezime"];
    // pitaj za subject
    $subject = $_POST["naslov"];
    $message = $_POST["message"];
    $message = 'Poruka od: '.$imeprezime.'\r\n'.$message;
    $headers = "From: <$from>"."\r\n"."Reply-to: <$from>"."\r\n".'X-Mailer: PHP/'.phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo  "<div class=\"response--message\"><div>Poruka uspešno poslata!</div><div>Javićemo vam se ubrzo.</div></div>";
    } else {
        echo "<div class=\"response--message\"><div> NOT OK </div></div>";
    }

?>
</div>
<?php get_footer(); ?>
