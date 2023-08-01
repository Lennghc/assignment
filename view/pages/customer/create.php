<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Klant toevoegen";
    include 'view/layout/header.php';
    ?>
</head>

<body>

    <?php
    include 'view/layout/navbar.php';
    ?>

    <div class="container">
        <div class="my-3">
            <h3>Klant toevoegen</h3>
        </div>

        <form method="POST" action="index.php?con=customer&op=create">
            <div class="mb-3">
                <label for="firstnameInput" class="form-label">Voornaam</label>
                <input type="text" class="form-control" name="firstname" id="firstnameInput" required>
            </div>
            <div class="mb-3">
                <label for="lastnameInput" class="form-label">Achternaam</label>
                <input type="text" class="form-control" name="lastname" id="lastnameInput" required>
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="emailInput" required>
            </div>

            <div class="mb-3">
                <?= !empty($options) ? $options : null ?>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="premiumcustomer" id="checkPremium">
                <label class="form-check-label" for="checkPremium">Premium klant</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Opslaan</button>
        </form>

    </div>


</body>

</html>