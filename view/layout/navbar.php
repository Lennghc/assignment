<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none fs-5">
                Radjetoe
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="index.php" class="nav-link px-2 <?= isset($_GET['con']) ? 'text-secondary' : 'text-white'; ?>">Home</a></li>
                <li><a href="index.php?con=customer&op=create" class="nav-link px-2 <?= $_GET['con'] == 'customer' ? 'text-white' : 'text-secondary'; ?>">Klant toevoegen</a></li>
            </ul>

            <div class="text-end">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php?con=auth&op=logout" class="nav-link px-2 text-warning">Afmelden</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>