<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $title = "Registreren";
    include 'view/layout/header.php';
    ?>
</head>

<body>

    <?php
    require_once 'view/layout/header.php';
    ?>

    <div class="container">
        <div class="card my-5 mx-auto" style="width: 18rem">
            <div class="card-body">
                <div class="text-center">
                    <h3>Registreren</h3>
                </div>
                <form method="POST" action="?con=auth&op=register">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Wachtwoord</label>
                        <input name="password" type="text" class="form-control" id="password" required>
                    </div>

                    <?php if (isset($_SESSION['message']) && !empty($_SESSION['message'])) : ?>
                        <div class="mb-3 text-center bg-primary-subtle border border-primary-subtle rounded-3">
                            <span class="text-primary"><?= $_SESSION['message'] ?></span>
                        </div>
                        <?php unset($_SESSION['message']); ?>
                    <?php endif; ?>
                    
                    <div class="text-center">
                        <button name="submit" type="submit" class="btn btn-primary">Registreren</button>

                    </div>

                </form>
                <div class="text-center border-top mt-2">
                    Heb je al een account? <a href="?con=auth&op=login">Meld je dan aan!</a>
                </div>
            </div>
        </div>
    </div>



</body>

</html>