<?php /* Template Name: Sent mail */ ?>

<?php get_header(); ?>
<div class="response">
  <?php
    $to = "office@drvolux.rs";
    $from = $_POST["mail"];
    $imeprezime = $_POST["imeprezime"];
    $subject = $_POST["naslov"];
    $message = $_POST["message"];
    $message = 'Poruka od: '.$imeprezime.'\r\n'.$message;
    $headers = "From: <$from>"."\r\n"."Reply-to: <$from>"."\r\n".'X-Mailer: PHP/'.phpversion();

    // if (mail($to, $subject, $message, $headers)) {
    //     echo  "<div class=\"response--message\"><div>Poruka uspešno poslata!</div><div>Javićemo vam se ubrzo.</div></div>";
    // } else {
    //     echo "<div class=\"response--message\"><div> NOT OK </div></div>";
    // }
    if(wp_mail($to, $subject, $message, $headers)) {
        wp_redirect(get_permalink(get_page_by_title('Kontakt')));
    } else {
        echo "ne valja ne valja";
    }
?>
</div>
<?php get_footer(); ?>
