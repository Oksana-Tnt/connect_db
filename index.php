<?php
require_once "./user.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1>Add User</h1>
        <form class="pt-5" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="form-group">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="form-group mb-2">
                <label for="formGroupExampleInput2">Surname</label>
                <input type="text" name="surname" class="form-control" placeholder="Surname">
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Add User</button>
            </div>
        </form>

        <?php

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = htmlspecialchars($_POST["name"]);
            $surname = htmlspecialchars($_POST["surname"]);

            $error = false;

            if (empty($name) || empty($surname)) {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Fill in all fields!</div>";
                $error = true;
            }

            if (!$error) {
                $user = new User($name, $surname);
                $user->addToDb();
            }
        }
        ?>

    </div>

</body>

</html>