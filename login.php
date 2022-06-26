<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="assets/css/login/style.css">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta charset="UTF-8">
    </head>
    <body>

    <nav class="navbar">
        <form class="logout" method="post" action="./controller/Users.php">
            <input type="hidden" name="type" value="logout">
            <h1> Facebook </h1>
            <button> logout </button>
        </form>
    </nav>

    <section>
         <?php echo "<h1> Welcome ". $_SESSION['usersFname'] ."</h1>" ; ?>
    </section>

    </body>
</html>