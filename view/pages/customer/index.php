<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Klanten";
    include 'view/layout/header.php';
    ?>

    <style>
        table tr>*:nth-child(1) {
            display: none;
        }
    </style>
</head>

<body>

    <?php
    include 'view/layout/navbar.php';
    ?>

    <div class="container">

        <div class="my-3 d-flex justify-content-between">
            <h3>Klanten</h3>
            <a href="index.php?con=customer&op=create" class="btn btn-primary">+ Toevoegen</a>

        </div>
        <?= !empty($table) ? $table : null ?>

    </div>



</body>

</html>