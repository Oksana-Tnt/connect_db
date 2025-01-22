<?php
include_once "./productClass.php";

$product = new Product();
$name = $_POST['name'] ?? '';
$allProducts = $product->showProducts($name);
$columns = $product->createColumns($allProducts);
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
        <h1>Products list</h1>

        <table class="table">
            <caption>Trovati n°<?= count($allProducts) ?> elementi</caption>
            <thead>
                <tr>
                    <?php foreach ($columns as $key): ?>
                        <td><?= $key ?></td>
                    <?php endforeach; ?>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($allProducts as $utente): ?>
                    <tr>
                        <?php foreach ($utente as $dato): ?>
                            <td><?= $dato ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


        <div class="row">
            <div class="col">

                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

                    <input type="text" value="<?= $name ?>" name="name" placeholder="Cerca utenti per nome" class="form-control">
                    <button class="btn btn-primary" type="submit">Cerca</button>

                </form>

            </div>
        </div>

    </div>
</body>

</html>