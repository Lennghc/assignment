<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Inloggen";
    include 'view/layout/header.php';
    ?>
</head>

<body>

    <div class="card my-5 mx-auto" style="width: 18rem">
        <div class="card-body">
            <div class="text-center">
                <h3>Inloggen</h3>
            </div>
            <form method="POST" action="index.php?con=auth&op=login">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="example@mail.nl" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Wachtwoord</label>
                    <input name="password" type="password" class="form-control" id="password" required>
                </div>

                <?php if (isset($_SESSION['message']) && !empty($_SESSION['message'])) : ?>
                    <div class="mb-3 text-center bg-primary-subtle border border-primary-subtle rounded-3">
                        <span class="text-primary"><?= $_SESSION['message'] ?></span>
                    </div>
                    <?php unset($_SESSION['message']); ?>
                <?php endif; ?>

                <div class="text-center">
                    <button name="submit" type="submit" class="btn btn-primary">Inloggen</button>
                </div>
            </form>

            <div class="text-center border-top mt-2">
                Nog geen account? <a href="?con=auth&op=register">Maak een account aan</a>
            </div>
        </div>
    </div>

</body>

</html>
