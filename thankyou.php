<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Received | The Unlucky Coin</title>
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css?v=<?= filemtime(__DIR__ . '/style.css') ?>">
</head>

<body>

    <!-- Minimal navbar -->
    <nav class="navbar sticky-top">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="index.php">The Unlucky Coin</a>
        </div>
    </nav>

    <main class="thankyou-page">
        <img class="svg-ornament svg-ornament-lg mb-4" src="images/thesun.png" alt="" aria-hidden="true">

        <h1 class="gold-text">Order received.</h1>

        <p>
            Your payment went through and I have your order.
        </p>
        <p>
            I'll get to it within a few days and send you an email when it's done.
        </p>

        <!-- Ornamental divider -->
        <div class="divider-ornament">
            ✦
        </div>

        <a href="index.php" class="btn-curse">Back to the homepage</a>

    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> The Unlucky Coin</p>
        <p class="footer-disclaimer">For entertainment purposes only. All sales final.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>