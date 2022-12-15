<?php
    function randomPass($char, $CHAR, $numbers, $symbols, $final_pass, $counter) {
        $pick_char = array_rand($char, $counter);
        if($counter == 1){
            $final_pass[] = $char[$pick_char];
        } else {
            foreach ($pick_char as $letter) {
                $final_pass[] = $char[$letter];
            }
        }

        $pick_CHAR = array_rand($CHAR, $counter);
        if($counter == 1){
            $final_pass[] = $CHAR[$pick_CHAR];
        } else {
            foreach ($pick_CHAR as $LETTER) {
                $final_pass[] = $CHAR[$LETTER];
            }
        }

        $pick_numbers = array_rand($numbers, $counter);
        if($counter == 1){
            $final_pass[] = $numbers[$pick_numbers];
        } else {
            foreach ($pick_numbers as $number) {
                $final_pass[] = $numbers[$number];
            }
        }

        $letters_left = $_GET['pass-leng'] - (floor(($_GET['pass-leng']) / 4) * 3);

        $pick_symbols = array_rand($symbols, $letters_left);
        if($letters_left == 1){
            $final_pass[] = $symbols[$pick_symbols];
        } else {
            foreach ($pick_symbols as $symbol) {
                $final_pass[] = $symbols[$symbol];
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