<!DOCTYPE html>
<html lang='en-GB'>

<head>
    <title>PHP11 F</title>
    <style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
    }

    nav {
        background-color: #010417;
        overflow: hidden;
    }

    nav ul {
        list-style: none;
        width: 100%;
        margin: 0;
    }

    nav li {
        float: left;
        margin: 0;
    }

    nav a {
        display: flex;
        height: 30px;
        padding: 5px 1.5em;
        color: white !important;
        text-decoration: none !important;
    }

    .active,
    nav a:hover {
        background-color: #c74451;
    }
    </style>
</head>

<body>
    <h1>PHP and Databases</h1>
    <?php include 'php11F_header.php'; ?>

    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: php11D.php');
    }
    require '../DB_CON.php';
    try {
        $pdo = new PDO($dsn, $db_username, $db_password, $opt);
        $stmt = $pdo->query('select * from meetings order by slot');

        $pdo = null;
    } catch (PDOException $e) {
        exit('PDO Error: ' . $e->getMessage() . '<br>');
    }
    ?>

    <h2>Data in meeting table</h2>
    <?php if (isset($_GET['msg'])) {
        echo "<p style='color: " .
            $_GET['color'] .
            "'>" .
            $_GET['msg'] .
            '</p>';
    } ?>
    Rows retrieved: <?= $stmt->rowCount() ?><br><br>

    <a href='php09E.php'><button style="margin-bottom: 10px">Tambah Data</button></a>
    <form action="">
        Cari Nama: <input type="text" id="txt1" onkeyup="showHint(this.value)">
    </form>
    <p>Suggestions: <span id="txtHint"></span></p>

    <table style='margin-top: 10px'>
        <thead>
            <tr>
                <th>Slot</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch()) { ?>
            <tr>
                <td><?= $row['slot'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><a style="margin-right: 15px" href="php09G.php?slot=<?= $row[
                    'slot'
                ] ?>"><img src="edit.svg" style="width: 30px; height: 30px"></img></a>
                    <a onclick="return confirm(`Apakah kamu yakin akan menghapus data?`)" href="php09H.php?slot=<?= $row[
                        'slot'
                    ] ?>"><img src="delete.svg" style="width: 30px; height: 30px"></img></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <script src="page11A_suggestion.js"></script>
</body>

</html>