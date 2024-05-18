<!DOCTYPE html>
<html lang='en-GB'>

<head>
    <title>PHP10 F</title>
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
    <?php include 'php10F_header.php'; ?>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: php10D.php');
    }
    $db_hostname = 'localhost'; // Write your own db server here
    $db_database = 'pbw'; // Write your own db name here
    $db_username = 'root'; // Write your own username here
    $db_password = ''; // Write your own password here
    // For the best practice, don’t  use your “real” password when  submitting your work
    $db_charset = 'utf8mb4'; // Optional
    $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=$db_charset";
    $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    try {
        $pdo = new PDO($dsn, $db_username, $db_password, $opt);
        echo "<h2>Data in meeting table</h2>\n";
        if (isset($_GET['msg'])) {
            echo "<p style='color: " .
                $_GET['color'] .
                "'>" .
                $_GET['msg'] .
                '</p>';
        }
        $stmt = $pdo->query('select * from meetings order by slot');
        echo 'Rows retrieved: ' . $stmt->rowcount() . "<br><br>\n";

        echo "<a href='php09E.php'><button>Tambah Data</button></a>";
        echo "<table style='margin-top: 10px'>
                <thead>
                    <tr>
                        <th>Slot</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
            <tbody>";

        while ($row = $stmt->fetch()) {
            echo '<tr><td>' .
                $row['slot'] .
                '</td><td>' .
                $row['name'] .
                '</td><td>' .
                $row['email'] .
                '</td> ' .
                '<td> ' .
                '<a style="margin-right: 15px" href="php09G.php?slot=' .
                $row['slot'] .
                '"><img src="edit.svg" style="width: 30px; height: 30px"></img></a>' .
                '<a onclick="return confirm(`Apakah kamu yakin akan menghapus data?`)" href="php09H.php?slot=' .
                $row['slot'] .
                '"><img src="delete.svg" style="width: 30px; height: 30px"></img></a>' .
                '</td></tr>';
        }

        echo '</tbody></table>';
        $pdo = null;
    } catch (PDOException $e) {
        exit('PDO Error: ' . $e->getMessage() . '<br>');
    }
    ?>
</body>

</html>