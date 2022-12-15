<?php 
    if(!empty($_GET['pass-leng'])){
        $counter = floor(($_GET['pass-leng']) / 4);
    }
    $big_letters = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","U","V","W","X","Y","Z"];
    $low_letters = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","u","v","w","x","y","z"];
    $numbers = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
    $symbols = ['!', '@', '#', '-', '?', '_'];
    $final_pass = [];

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

        return implode($final_pass);
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password generator</title>
    <!-- Bootstrap CDN CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- /Bootstrap CDN CSS -->
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header class="container text-center pt-5">
        <h1>Strong Password Generator</h1>
        <h3 class="text-white">Genera una password sicura</h3>
    </header>
    <main class="ms-container mt-5">
        <div class="output-field px-3 py-4 rounded">
            <?php 
                echo !empty($_GET['pass-leng']) ? randomPass($low_letters, $big_letters, $numbers, $symbols, $final_pass, $counter) : "<p class=\"m-0\">Nessun parametro valido inserito</p>";
            ?>
        </div>
        <div class="tools-container rounded mt-3 p-4">
            <form action="index.php" method="GET">
                <!-- form left -->
                <div class="form-left">
                    <div class="mb-3">Lunghezza password: </div>
                    <div>Consenti ripetizioni di uno o più caratteri: </div>

                    <button class="btn btn-primary" type="submit">Invia</button>
                    <button class="btn btn-secondary" type="reset">Annulla</button>
                </div>
                <!-- /form left -->

                <!-- form right -->
                <div class="form-right">
                    <!-- lunghezza caratteri password -->
                    <div class="pass-len-input mb-3">
                        <input type="number" name="pass-leng" id="" min="4" required>
                    </div>

                    <!-- scegliere se avere caratteri tutti diversi o no -->
                    <div class="radio-input">
                        <div>
                            <input type="radio" name="repetition" id="repetition-true" value="true" checked>
                            <label for="repetition-true">Sì</label>
                        </div>
                        <div>
                            <input type="radio" name="repetition" id="repetition-false" value="false">
                            <label for="repetition-false">No</label>
                        </div>
                    </div>

                    <!-- Sceglier come comporre la password -->
                    <div class="check-input">
                        <div>
                            <input type="checkbox" name="char-type-letters" id="char-type-letters" value="true" checked>
                            <label for="char-type-letters">Lettere [a ~ z] [A ~ Z ]</label>
                        </div>
                        <div>
                            <input type="checkbox" name="char-type-numbers" id="char-type-numbers" value="true" checked>
                            <label for="char-type-numbers">Numeri</label>
                        </div>
                        <div>
                            <input type="checkbox" name="char-type-symbols" id="char-type-symbols" value="true" checked>
                            <label for="char-type-symbols">Simboli</label>
                        </div>
                    </div>
                </div>
                <!-- /form right -->
            </form>
        </div>
    </main>

    <div class="ms-info">
            <h6>La password conterrà minimo 4 caratteri:</h6>
            <ul>
                <li>Almeno una lettera maiuscola;</li>
                <li>Almeno una lettera minuscola;</li>
                <li>Almeno un numero;</li>
                <li>Almeno un simbolo speciale;</li>
            </ul>
        </div>

    <!-- Botstrap CDN js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <!-- /Botstrap CDN js -->
</body>
</html>