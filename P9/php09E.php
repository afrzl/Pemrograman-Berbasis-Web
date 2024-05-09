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
    <h1>Form Menambahkan Data Meeting</h1>
    <form action="php09E_action.php" method="POST">
        <div>
            <label for="slot">Slot:</label>
            <input type="number" id="slot" name="slot">
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="name">Email:</label>
            <input type="email" id="email" name="email">
        </div>
        <input type="submit" value="Tambah">
    </form>
</body>
</html>