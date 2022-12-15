<?php
    include __DIR__ . '/functions.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CDN CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- /Bootstrap CDN CSS -->
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <main class="ms-container">
        <div class="output-field rounded">
            <p class="my-5 p-3">
                Password: <?php echo randomPass($low_letters, $big_letters, $numbers, $symbols, $final_pass, $counter, $left_count) ?>
            </p>
        </div>
    </main>


    <!-- Botstrap CDN js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <!-- /Botstrap CDN js -->
</body>
</html>