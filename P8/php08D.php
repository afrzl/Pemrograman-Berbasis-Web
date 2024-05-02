<!DOCTYPE html>
<html>

<head>
    <title>PHP 08D</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h1>Associative Arrays</h1>
    <?php 
        $dict1 = array('a' => 1, 'b' => 2); 
        $dict2 = $dict1; 
        $dict1['b'] = 4; 
        echo "\$dict1['b'] = ", $dict1['b'],"<br>\n"; 
        echo "\$dict2['b'] = ", $dict2['b'],"<br>\n"; 
        //4b
        foreach ($dict1 as $key => $value) {
            echo "\$dict1['". $key ."'] = ", $value,"<br>\n"; 
        }

        $text = 'lorem ipsum elit congue auctor inceptos taciti suscipit tortor auctor integer congue hac nullam hac auctor tellus nullam inceptos nullam integer tellus nullam auctor elit lorem ipsum elit';
        $word = str_word_count($text, 1);
        $dict3 = array_count_values($word);
        
        krsort($dict3);
        arsort($dict3);
        foreach ($dict3 as $word => $count) {
            echo "$word -> $count <br>\n";
        }
    ?>

    <table>
        <thead>
            <tr>
                <th style="width: 20%">Kata</th>
                <th style="width: 50%">Jumlah Kemunculan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dict3 as $word => $count) { ?>
                <tr>
                    <td><?= $word ?></td>
                    <td style="text-align: right"><?= $count ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>