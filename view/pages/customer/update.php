<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Klant wijzigen";
    include 'view/layout/header.php';
    ?>
</head>

<body>

    <?php
    include 'view/layout/navbar.php';
    ?>

    <div class="container">
        <div class="my-3">
            <h3>Klant wijzigen</h3>
        </div>

        <form method="POST" action="index.php?con=customer&op=update&id=<?=$customerData['id']?>">
            <div class="mb-3">
                <label for="firstnameInput" class="form-label">Voornaam</label>
                <input type="text" class="form-control" name="firstname" id="firstnameInput" value="<?=$customerData['firstname']?>" required>
            </div>
            <div class="mb-3">
                <label for="lastnameInput" class="form-label">Achternaam</label>
                <input type="text" class="form-control" name="lastname" id="lastnameInput" value="<?=$customerData['lastname']?>" required>
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="emailInput" value="<?=$customerData['email']?>" required>
            </div>

            <div class="mb-3">
                <?= !empty($options) ? $options : null ?>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="premiumcustomer" id="checkPremium" <?=$customerData['premium_member'] == 1 ? 'checked' : ''?> >
                <label class="form-check-label" for="checkPremium">Premium klant</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Opslaan</button>
            <a class="btn btn-danger" href="index.php?con=customer&op=delete&id=<?=$customerData['id']?>">Verwijder deze klant</a>
        </form>

    </div>


</body>

</html>