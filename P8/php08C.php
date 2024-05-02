<!DOCTYPE html>
<html>

<head>
    <title>PHP 08C</title>
</head>

<body>
    <h1>Array Operators and Regular Expressions</h1>
    <?php
    echo "<h2>Exercise 2A</h2>\n";
    $planets = ['earth'];
    array_unshift($planets, 'mercury', 'venus');
    array_push($planets, 'mars', 'jupiter', 'saturn');
    echo "(1) \$planets = [", join(', ', $planets), "]<br>\n";
    $last = array_pop($planets);
    echo "(2) \$planets = [", join(', ', $planets), "]<br>\n";
    $first = array_shift($planets);
    echo "(3) \$planets = [", join(', ', $planets), "]<br>\n";
    echo "(4) \$first = $first, \$last = $last<br>\n";
    
    echo "<h2>Exercise 2B</h2>\n";
    $spheres = $planets;
    echo "(5) \$spheres = [", join(', ', $spheres), "]<br>\n";
    $planets[1] = 'midgard';
    echo "(6) \$planets = [", join(', ', $planets), "]<br>\n";
    echo "(6) \$spheres = [", join(', ', $spheres), "]<br>\n";
    $spheres = &$planets;
    echo "(7) \$spheres = [", join(', ', $spheres), "]<br>\n";
    $planets[0] = 'friga';
    echo "(8) \$planets = [", join(', ', $planets), "]<br>\n";
    echo "(8) \$spheres = [", join(', ', $spheres), "]<br>\n";
    
    $arr = $planets;
    foreach ($arr as $key => $value) {
        echo 'Removed: ' . array_shift($arr) . ' Remaining: ' . '[', join(', ', $arr), "]<br>\n";
    }
    
    echo "<h2>Exercise 2C</h2>\n";
    $names = ['Dave Shield', 'Mr Andy Roxburgh', 'Dr George Christodoulou', 'Dr Ullrich Hustadt', 'Dr David Jackson'];
    foreach ($names as $name) {
        echo "(1) Name: $name<br>\n";
    }
    
    // Your own code here
    $names = str_replace(['Mr ', 'Dr '], '', $names);
    foreach ($names as $key => $name) {
        $name = explode(" ", $name);
        $names[$key] = strtoupper($name[1]) . ', ' . $name[0];
    }

    foreach ($names as $name) 
        echo "(2) Name: $name<br>\n"
    ?>
</body>

</html>
