<?php
session_start();
if (isset($_REQUEST['item'])) {
    $_SESSION['item'] = $_REQUEST['item'];
    $_SESSION['expired'] = time() + (1 * 60); //set session expired ke 1 menit
}
?>
<!DOCTYPE html>
<html lang='en-GB'>

<head>
    <title>PHP10B</title>
</head>

<body>
    <form action="php10C.php" method="post">
        <label>Address: <input type="text" name="address"></label>
        <!-- no hidden input required -->
        <input type="submit" value="Send">
    </form>
</body>

</html>
