<?php
    $big_letters = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","U","V","W","X","Y","Z"];
    $low_letters = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","u","v","w","x","y","z"];
    $numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    $symbols = ['!', '@', '#', '-', '?', '_', '$', '&', '/'];
    $final_pass = [];
    $counter = !empty($_GET['pass-leng']) ? (int)($_GET['pass-leng'] / char_type_generated()) : '';
    $left_count = !empty($_GET['pass-leng']) ? (int)$_GET['pass-leng'] : '';

    function randomPass($char, $CHAR, $numbers, $symbols, $final_pass, $counter, $left_count) {

        if(!empty($_GET['char-type-letters'])){
            if($_GET['repetition'] === 'false'){
                $pick_char = array_rand($char, $counter);
                $left_count -= $counter;
                if($counter == 1){
                    $final_pass[] = $char[$pick_char];
                } else {
                    foreach ($pick_char as $letter) {
                        $final_pass[] = $char[$letter];
                    }
                }
            } elseif ($_GET['repetition'] === 'true'){
                for ($i=0; $i < $counter; $i++) {
                    $final_pass[] = $char[rand(0, count($char) - 1)];
                }
                $left_count -= $counter;
            }
        } 

        if(!empty($_GET['char-type-letters'])){
            if($_GET['repetition'] === 'false'){
                $pick_CHAR = array_rand($CHAR, $counter);
                $left_count -= $counter;
                if($counter == 1){
                    $final_pass[] = $CHAR[$pick_CHAR];
                } else {
                    foreach ($pick_CHAR as $LETTER) {
                        $final_pass[] = $CHAR[$LETTER];
                    }
                }
            } elseif ($_GET['repetition'] === 'true'){
                for ($i=0; $i < $counter; $i++) {
                    $final_pass[] = $CHAR[rand(0, count($CHAR) - 1)];
                }
                $left_count -= $counter;
            }
        } 

        if (!empty($_GET['char-type-numbers'])){
            if($_GET['repetition'] === 'false'){
                $pick_numbers = array_rand($numbers, $counter);
                $left_count -= $counter;
                if($counter == 1){
                    $final_pass[] = $numbers[$pick_numbers];
                } else {
                    foreach ($pick_numbers as $number) {
                        $final_pass[] = $numbers[$number];
                    }
                }
            } elseif ($_GET['repetition'] === 'true'){
                for ($i=0; $i < $counter; $i++) {
                    $final_pass[] = $numbers[rand(0, count($numbers) - 1)];
                }
                $left_count -= $counter;
            }
        } 

        if (!empty($_GET['char-type-symbols'])){
            if($_GET['repetition'] === 'false'){
                $pick_symbols = array_rand($symbols, $left_count);
                if($left_count == 1){
                    $final_pass[] = $symbols[$pick_symbols];
                } else {
                    foreach ($pick_symbols as $symbol) {
                        $final_pass[] = $symbols[$symbol];
                    }
                }
            } elseif ($_GET['repetition'] === 'true'){
                for ($i=0; $i < $left_count; $i++) {
                    $final_pass[] = $symbols[rand(0, count($symbols) - 1)];
                }
            }
        }
        return implode(mergePassword($final_pass));
    };

    // Funzione che scambia la posizione di tutti i caratteri della password
    // in modo dinamico
    function mergePassword($final_pass){
        $a = 0;
        $pass= [];
        $final_pass_len = count($final_pass) - 1;
        while ($a < count($final_pass)) {
            $n = rand(0, $final_pass_len);
            if (!in_array($final_pass[$n], $pass)){
                $pass[] = $final_pass[$n];
                $a++;
            }
        }
        return $final_pass = $pass;
    }

    // Troviamo il valore per cui dividere i tipi di dato: char, CHAR, numbers e symbols
    function char_type_generated(){
        $count = 0;
        if(!empty($_GET['char-type-letters'])){
            $count = $count + 2;
        } 
        if (!empty($_GET['char-type-numbers'])){
            $count = $count + 1;
        } 
        if (!empty($_GET['char-type-symbols'])){
            $count = $count + 1;
        }
        return $count;
    }