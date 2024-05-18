<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        header('Location: php10F.php');
    }

    $message = $_GET['msg'] ?? '';
    echo '<p style="color: red">' . $message . '</p>';
    ?>
    <form action="php10D_action.php" method="post">
        <table>
            <tr>
                <td><label>Username:</label></td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td><label>Password:</label></td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Login"></td>
                <td></td>
            </tr>
        </table>
    </form>
</body>

</html>