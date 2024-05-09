<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Meeting</title>
    <style>
    label {
        width: 50px;
        display: inline-block;
    }

    div {
        margin-bottom: 10px
    }
    </style>
</head>

<body>
    <h1>Form Mengubah Data Meeting</h1>
    <?php
    require 'DB_CON.php';
    $slot = $_GET['slot'];
    $pdo = new PDO($dsn, $db_username, $db_password, $opt);
    try {
        $query = 'SELECT * FROM meetings WHERE slot = :slot';
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':slot', $slot, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            $message = urlencode('Data tidak ditemukan');
            header('Location: php09F.php?color=red&msg=' . $message);
        }

        $name = $row['name'];
        $email = $row['email'];
        $pdo = null;
    } catch (PDOException $e) {
        exit('PDO Error: ' . $e->getMessage() . '<br>');
    }
    ?>
    <form action="php09G_action.php" method="POST">
        <div>
            <label for="slot">Slot:</label>
            <input type="number" value="<?= $slot ?>" readonly id="slot" name="slot">
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" value="<?= $name ?>" id="name" name="name">
        </div>
        <div>
            <label for="name">Email:</label>
            <input type="email" value="<?= $email ?>" id="email" name="email">
        </div>
        <input type="submit" value="Tambah">
    </form>
</body>

</html>