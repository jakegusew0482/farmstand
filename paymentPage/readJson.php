<?php
    $students = json_decode($_POST['students']);
    foreach($students as $student){
        echo $student->name . "\n";
    }
    // print_r($students);