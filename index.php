<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Unlucky Coin</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="favicon.png">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold limelight" href="#">The Unlucky Coin 🪙</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="#">Home</a>
                    <a class="nav-link" href="#features">How It Works</a>
                    <a class="nav-link" href="#products">Order</a>
                </div>
            </div>
        </div>
    </nav>

    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <h1 class="cinzel gold">Manifest a Minor Inconvenience</h1>
        <p>For just €1, unleash a touch of chaos on someone who truly deserves it.</p>
        <a href="#products" class="btn-curse mt-3">Order a Curse</a>
    </section>

    <section id="features">
        <h2 class="cinzel gold">How It Works</h2>
        <div class="container">
            <div class="row justify-content-center align-items-center g-3">

                <div class="col-12 col-md">
                    <div class="step">
                        <span class="step-label">I</span>
                        <i class="bi bi-coin step-icon"></i>
                        <h5>Pay €1</h5>
                        <p>A small price for a small</p>
                    </div>
                </div>

                <div class="col-auto d-none d-md-block step-arrow">
                    <i class="bi bi-chevron-right"></i>
                </div>

                <div class="col-12 col-md">
                    <div class="step">
                        <span class="step-label">II</span>
                        <i class="bi bi-person step-icon"></i>
                        <h5>Name Your Target</h5>
                        <p>A name and a date of birth. That's all we need.</p>
                    </div>
                </div>

                <div class="col-auto d-none d-md-block step-arrow">
                    <i class="bi bi-chevron-right"></i>
                </div>

                <div class="col-12 col-md">
                    <div class="step">
                        <span class="step-label">III</span>
                        <i class="bi bi-stars step-icon"></i>
                        <h5>We Handle The Rest</h5>
                        <p>A mystery inconvenience will be sent their way.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="products">
        <h2 class="cinzel gold">Order</h2>
        <div class="d-flex justify-content-center">
            <div class="curse-card">
                <h3>A Random Curse</h3>
                <div class="price">€1</div>
                <p>A mystery inconvenience, hand-selected by fate (and us).</p>
                <script type='text/javascript' src='https://storage.ko-fi.com/cdn/widget/Widget_2.js'></script>
                <script type='text/javascript'>
                    kofiwidget2.init('Redirect to Ko-Fi', '#b09d7f', 'Z8Z11V11QA');
                    kofiwidget2.draw();
                </script>
            </div>
        </div>
    </section>

    <section id="disclaimer">
        <span class="text-danger text-uppercase fw-bold">! Disclaimer !</span><br>
        This site is for entertainment purposes only.<br>
        Purchases are non-refundable and not guaranteed to actually work.
    </section>

    <footer class="text-center">
        <div class="p-3">
            © <?php echo date("Y") ?> The Unlucky Coin
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>