  <?php
    $to = "info@drvolux.rs";
    $from = $_POST["mail"];
    $imeprezime = $_POST["imeprezime"];
    // pitaj za subject
    $subject = "Kontakt";
    $message = $_POST["message"];
    $message = 'Poruka od: '.$imeprezime.'\r\n'.$message;
    $headers = "From: <$from>";

    if (mail($to, $subject, $message, $headers)) {
        echo  "<div class=\"response\"><div>Poruka uspešno poslata!</div><div>Javićemo vam se ubrzo.</div></div>";
    } else {
        echo "<div class=\"response\"><div> NOT OK </div></div>";
    }
?>