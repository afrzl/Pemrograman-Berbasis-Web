<?php
session_start();
// not necessary but convenient
if (isset($_REQUEST['address'])) {
    $_SESSION['address'] = $_REQUEST['address'];
}

if(isset($_SESSION['expired'])) { //cek apabila session expired maka unset session
    if (time() > $_SESSION['expired']) {
        session_unset();
    }
}
?>
<!DOCTYPE html>
<html lang='en-GB'>

<head>
    <title>PHP10C</title>
</head>

<body>
    <?php
    echo $_SESSION['item'], '<br>';
    echo $_SESSION['address'];
    // Once we do not need the data anymore , get rid of it
    session_unset();
    session_destroy();
    ?>
</body>

</html>
