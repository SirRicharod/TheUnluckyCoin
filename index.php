<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Unlucky Coin</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">

    <!-- Bootstrap (grid + accordion) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Google Fonts: Cinzel + Cormorant Garamond -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700;900&family=Cormorant+Garamond:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid px-4">
            <a class="navbar-brand" href="#">The Unlucky Coin</a>
            <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <div class="navbar-nav ms-auto gap-1">
                    <a class="nav-link" href="#how-it-works">How It Works</a>
                    <a class="nav-link" href="#product">The Curse</a>
                    <a class="nav-link" href="#faq">FAQ</a>
                    <a class="nav-link btn-curse ms-2" href="order.php">Order</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section id="hero">
        <img class="svg-ornament svg-ornament-lg mb-4" src="images/moon.png" alt="moon" aria-hidden="true">
        <h1 class="gold-text">A Minor Inconvenience,<br>Delivered.</h1>
        <p class="hero-tagline">
            For €2, I will cast a small, targeted hex on someone of your choosing.
            Results are not guaranteed. Bad days happen regardless.
        </p>
        <a href="order.php" class="btn-curse btn-curse-lg">Order a Curse →</a>
    </section>

    <!-- Ornamental divider -->
    <div class="divider-ornament">
        ✦
    </div>

    <!-- LORE / DISCLAIMER -->
    <section id="lore">
        <h2 class="section-heading gold-text">What Is This?</h2>
        <div class="lore-body">
            <p>
                You know that feeling when someone does something irritating and there is nothing
                you can do about it. This is doing something about it.
            </p>
            <p>
                The hex is small by design. Stubbing your toe, a fruit fly in the kitchen,
                autocorrect misfiring... I am not dealing in catastrophe here.
                I leave that to people with more ambition.
            </p>
            <p>
                Fill in the form, pay €2, and I'll get to it.
                You will receive an email from me once it is done.
            </p>
            <img class="svg-ornament svg-ornament-sm my-3" src="images/stars.png" alt="" aria-hidden="true">
            <p class="lore-disclaimer">
                Offered as entertainment. No guarantees are made about outcomes. All sales are final.
            </p>
        </div>
    </section>

    <!-- HOW IT WORKS -->
    <section id="how-it-works">
        <h2 class="section-heading gold-text">How It Works</h2>
        <p class="section-sub">Simple enough.</p>
        <div class="container">
            <div class="row justify-content-center align-items-stretch g-3">

                <div class="col-12 col-md-3">
                    <div class="step-card">
                        <span class="step-numeral">Step I</span>
                        <div class="step-icon-wrap"><i class="bi bi-pencil-square"></i></div>
                        <h5>Name Your Target</h5>
                        <p>Their full name, date of birth, and your email address. That is all.</p>
                    </div>
                </div>

                <div class="col-auto d-none d-md-flex step-arrow">
                    <i class="bi bi-chevron-right"></i>
                </div>

                <div class="col-12 col-md-3">
                    <div class="step-card">
                        <span class="step-numeral">Step II</span>
                        <div class="step-icon-wrap"><i class="bi bi-coin"></i></div>
                        <h5>Pay €2</h5>
                        <p>Two euros, via Ko-fi. The spirits appreciate the gesture.</p>
                    </div>
                </div>

                <div class="col-auto d-none d-md-flex step-arrow">
                    <i class="bi bi-chevron-right"></i>
                </div>

                <div class="col-12 col-md-3">
                    <div class="step-card">
                        <span class="step-numeral">Step III</span>
                        <div class="step-icon-wrap"><i class="bi bi-moon-stars"></i></div>
                        <h5>Await Your Fate</h5>
                        <p>You'll get an email from me when it's done. Then it's out of both our hands.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Ornamental divider -->
    <div class="divider-ornament">
        ✦
    </div>

    <!-- PRODUCT CARD -->
    <section id="product">
        <h2 class="section-heading gold-text">The Curse</h2>
        <p class="section-sub">One product.</p>
        <div class="product-card">
            <img class="svg-ornament svg-ornament-md mb-3 eye" src="images/eye.png" aria-hidden="true">
            <p class="product-name">The Minor Inconvenience Hex</p>
            <div class="product-price gold-text">€2</div>
            <p class="product-desc">
                One small hex, worked within a few days of payment.
                Effects vary. Complaints are not accepted.
            </p>
            <a href="order.php" class="btn-curse btn-curse-lg">Order Now</a>
        </div>
    </section>

    <!-- Ornamental divider -->
    <div class="divider-ornament">
        ✦
    </div>

    <!-- FAQ -->
    <section id="faq">
        <h2 class="section-heading gold-text">Questions & Omens</h2>
        <p class="section-sub">Common questions.</p>
        <div class="container" style="max-width:680px;">
            <div class="accordion" id="faqAccordion">

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#faq1">
                            Will this actually work?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Probably not in any way you could prove. It will be cast with genuine effort.
                            Beyond that, I cannot speak for the universe and neither can you.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#faq2">
                            What counts as a minor inconvenience?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            A spilled drink, a delayed train, a phone that dies at 4%.
                            Something that ruins a Tuesday but not a life. That is the range I work in.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#faq3">
                            Does the target know?
                        </button>
                    </h2>
                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            No. And frankly, that's half the appeal.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#faq4">
                            How long does it take?
                        </button>
                    </h2>
                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            A few days, usually. I'll email you when it's done.
                            What happens after that is not something either of us can control.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#faq5">
                            Is this a real curse?
                        </button>
                    </h2>
                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Legally, this is entertainment. Practically, I do take it seriously.
                            Make of that what you will. No refunds either way.
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#faq6">
                            Can I curse myself?
                        </button>
                    </h2>
                    <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            I won't stop you.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <footer>
        <p>© <?php echo date('Y'); ?> The Unlucky Coin</p>
        <p class="footer-disclaimer">For entertainment purposes only. All sales final.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>