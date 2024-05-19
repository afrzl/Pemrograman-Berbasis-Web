<?php
//menggunakan file get contents
$data = file_get_contents('https://reqres.in/api/users?page=1');
var_dump($data);

//menggunakan curl
echo '<br/><br/>Menggunakan cURL<br/>';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://reqres.in/api/users?page=1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);
echo $output;
// $data = json_decode($output, true);
// echo '<br/><br/>';
// var_dump($data);

$parse_data = json_decode($data, true);
echo '<br/><br/>';
var_dump($parse_data);
echo '<br/><br/>';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php11A</title>
    <style>
    table,
    th,
    td {
        padding: 10px;
        border: 1px solid black;
        border-collapse: collapse;
    }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Avatar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parse_data['data'] as $value) { ?>
            <tr>
                <td><?= $value['id'] ?></td>
                <td><?= $value['email'] ?></td>
                <td><?= $value['first_name'] ?></td>
                <td><?= $value['last_name'] ?></td>
                <td><img src="<?= $value['avatar'] ?>" alt=""></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>