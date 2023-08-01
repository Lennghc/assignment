<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Home";
    include 'view/layout/header.php';
    ?>

    <style>
        table tr>*:nth-child(1)  {
            display: none;
        }

        table tr>*:nth-child(2)  {
            display: none;
        }
    </style>
</head>

<body>

    <?php
    include 'view/layout/navbar.php';
    ?>

    <div class="container">

        <div class="my-3">
            <h3><?= isset($customerData['firstname']) ? $customerData['firstname'] . " " . $customerData['lastname'] : '' ?></h3>

            <form method="POST" action="index.php?con=game&op=update&id=<?= $customerData['id'] ?>">
                <div class="mb-3">
                    <?= !empty($options) ? $options : null ?>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Game toevoegen</button>

            </form>

        </div>
        <?= !empty($table) ? $table : null ?>

    </div>



</body>

</html>