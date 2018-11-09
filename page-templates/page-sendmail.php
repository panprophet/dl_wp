<?php get_header(); ?>
<div class="response">
  <?php
    $to = "office@drvolux.rs";
    $from = $_POST["mail"];
    $imeprezime = $_POST["imeprezime"];
    $subject = $_POST["naslov"];
    $message = $_POST["message"];
    $message = 'Poruka od: '.$imeprezime.'\r\n'.$message;
    $headers = "From: <$from>"."\r\n"."Reply-to: <$from>"."\r\n"."X-Mailer: PHP/".phpversion();

    // if (mail($to, $subject, $message, $headers)) {
    //     echo  "<div class=\"response--message\"><div>Poruka uspešno poslata!</div><div>Javićemo vam se ubrzo.</div></div>";
    // } else {
    //     echo "<div class=\"response--message\"><div> NOT OK </div></div>";
    // }
    add_action('phpmailer_init', 'configure_smtp');
    function configure_smtp( PHPMailer $phpmailer ){
        $phpmailer->isSMTP(); //switch to smtp
        $phpmailer->Host = 'mail.drvolux.rs';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 465;
        $phpmailer->Username = 'office@drvolux.rs';
        $phpmailer->Password = 'officedrvolux2018';
        $phpmailer->SMTPSecure = false;
        $phpmailer->From = $from;
        $phpmailer->FromName= $imeprezime;
    }

    if(wp_mail($to, $subject, $message, $headers)) {

        wp_redirect(get_permalink('/'));
    } else {
        if(!$phpmailer -> Send()) {
            echo '<div>'
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' .$phpmailer->ErrorInfo;
            echo '</div>';
        }
        // wp_redirect(get_permalink(get_page_by_title('Kontakt')));
    }
?>
</div>
<?php get_footer(); ?>
