<?php
    // output commands
    // echo '<h1>Helloooooo</h1>';
    // print('<h1>Hellooo my people</h1>');
    // print_r('<h1>Hellooo  SQI</h1>');

    // variables in php
    $name = 'Arise Damilare';
    $occupation = 'Sofware Engineer';
    $isMarried = false;
    $age = 25;

    // echo $name;

    // concatenation

    // echo 'My name is ' . $name . ' I am a '. $occupation;
    // echo "<h2>My name is $name. I am a $occupation.</h2>"

    // conditional statement
    // if ($age > 18) {
    //     echo 'You are an adult</br>';
    // } else {
    //     echo 'You are a child</br>';
    // }

    // if ($isMarried){
    //     echo 'You be man';
    // }
    // elseif ($isMarried == 'soon'){
    //     echo 'You sef dey try';
    // }
    // else{
    //     echo 'Dey play oo';
    // }   


    // arrays
    $fruits = array('apple', 'banana', 'cherry');
    // echo $fruits;
    $students = ['Emmanuel', 'Shola', 'Olumide', 'Aisha'];
    // print_r($students);
    // echo "<h2>$students[0]</h2>";

    // array functions
    
    array_push($students, 'Damilare');
    // $num  = array_count_values($students);
    // echo $num['Damilare'];  
    // echo count($students)
    

    // array_pop($students);
    // array_shift($students);
    // array_unshift($students, 'aliu');
    // print_r($students);

    // Associative array (== object in js)
    // $person = array('name' => 'Emmanuel', 'age' => 25, 'isMarried'=>'In a moment');
    $person = ['name' => 'Emmanuel', 'age' => 25, 'isMarried'=>'In a moment'];
    // print_r($person['name']);

    // multidimensional array (== array of object in js)
    $students = [
        ['name' => 'Emmanuel', 'age' => 25, 'possession'=>['Iphone xr', 'powerbank']],
        ['name' => 'Shola', 'age' => 25, 'possession'=>['Samsung']],
        ['name' => 'Olumide', 'age' => 25, 'possession'=>['Iphone 14promax', 'Hp laptop']],
        ['name' => 'Aisha', 'age' => 25, 'possession'=>['Infinix', 'Gold WristWatch']]
    ];

    // print_r($students[0]['name'] === 'Emmanuel');

    // for each loop
    for ($i=0; $i < count($students); $i++) { 
    //   echo $students[$i]['name'] . '<br>';
      for ($y=0; $y < count($students[$i]['possession']); $y++) { 
        // echo $students[$i]['possession'][$y] . '<br>';
      }
    }

    foreach($fruits as $fruit){
        // echo $fruit . '<br>';
    }

    function callMyName(){
        echo 'Damilare';
    }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome everyone! <?php echo "My name is $name. I am a $occupation." ?> </h1>
    <!-- <h2>My name is <?php callMyName() ?> </h2> -->

    <h1>
        <?php foreach($fruits as $fruit){?>
            <h1> <?php echo $fruit ?> </h1>
        <?php } ?>
    </h1>


</body>
</html>