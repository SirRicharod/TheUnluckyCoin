<?php
session_start();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetName     = trim($_POST['target_name'] ?? '');
    $targetBirthday = trim($_POST['target_birthday'] ?? '');
    $senderName     = trim($_POST['sender_name'] ?? 'Anonymous');

    if ($targetName === '') {
        $errors[] = 'Target name is required.';
    }
    if ($targetBirthday === '') {
        $errors[] = 'Target date of birth is required.';
    }

    if (empty($errors)) {
        // Save order in session in case you want to reference it later
        $_SESSION['pending_order'] = [
            'target_name'     => $targetName,
            'target_birthday' => $targetBirthday,
            'sender_name'     => $senderName,
            'submitted_at'    => date('Y-m-d H:i:s'),
        ];

        // Email the order details via PHPMailer + Gmail SMTP
        require 'vendor/autoload.php';

        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'sirricharod@gmail.com';
            $mail->Password   = $_ENV['GMAIL_APP_PASSWORD'];
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('sirricharod@gmail.com', 'Hexes 4 U');
            $mail->addAddress('sirricharod@gmail.com');
            $mail->CharSet = 'UTF-8';

            $mail->Subject = 'New Curse Order';
            $mail->Body    = "New curse order received!\n\n"
                           . "Sender:   $senderName\n"
                           . "Target:   $targetName\n"
                           . "Birthday: $targetBirthday\n"
                           . "Time:     " . date('Y-m-d H:i:s') . "\n\n"
                           . "Awaiting Ko-fi payment confirmation.";

            $mail->send();
        } catch (Exception $e) {
            // Log silently — don't block the buyer from proceeding
            error_log('Mailer error: ' . $mail->ErrorInfo);
        }

        // Send buyer to Ko-fi to pay
        header('Location: https://ko-fi.com/s/2e828bfbdc');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order a Curse &mdash; Hexes 4 U</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .order-form {
            width: 100%;
            max-width: 460px;
        }
        .order-form .form-label {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
        }
        .order-form .form-control {
            background-color: var(--bg-surface);
            border: var(--border-style);
            color: var(--text-main);
            border-radius: 0.3rem;
        }
        .order-form .form-control:focus {
            background-color: var(--bg-surface);
            border-color: var(--color-gold-glow);
            color: var(--text-main);
            box-shadow: 0 0 0 0.2rem var(--accent-glow);
        }
        .order-form .form-control::placeholder {
            color: var(--text-muted);
            opacity: 0.6;
        }
        /* Fix date input icon colour on dark background */
        .order-form input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(0.7);
            cursor: pointer;
        }
        .btn-curse.w-100 {
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold cinzel" href="index.php">Hexes 4 U</a>
        </div>
    </nav>

    <section class="d-flex flex-column justify-content-center align-items-center" style="padding: 4rem 1rem;">

        <h2 class="cinzel gold mb-1">Order a Curse</h2>
        <p class="mb-4" style="color: var(--text-muted);">
            Tell us who deserves it. Then complete your &euro;1 payment on Ko-fi.
        </p>

        <?php if (!empty($errors)): ?>
            <div class="mb-3 w-100" style="max-width:460px;">
                <?php foreach ($errors as $e): ?>
                    <div class="text-danger" style="font-size:0.9rem;">&#9888; <?= htmlspecialchars($e) ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="payment.php" class="order-form">

            <div class="mb-3">
                <label for="sender_name" class="form-label">
                    Your name <span style="color: var(--text-muted);">(optional)</span>
                </label>
                <input type="text" class="form-control" id="sender_name" name="sender_name"
                       placeholder="Anonymous"
                       value="<?= htmlspecialchars($_POST['sender_name'] ?? '') ?>">
            </div>

            <div class="mb-3">
                <label for="target_name" class="form-label">
                    Target&rsquo;s full name <span class="text-danger">*</span>
                </label>
                <input type="text" class="form-control" id="target_name" name="target_name"
                       placeholder="John Doe" required
                       value="<?= htmlspecialchars($_POST['target_name'] ?? '') ?>">
            </div>

            <div class="mb-4">
                <label for="target_birthday" class="form-label">
                    Target&rsquo;s date of birth <span class="text-danger">*</span>
                </label>
                <input type="date" class="form-control" id="target_birthday" name="target_birthday" required
                       value="<?= htmlspecialchars($_POST['target_birthday'] ?? '') ?>">
            </div>

            <button type="submit" class="btn-curse w-100">
                Continue to payment &rarr;
            </button>

            <p class="mt-3 text-center" style="color: var(--text-muted); font-size: 0.82rem;">
                You will be redirected to Ko-fi to complete your &euro;1 payment.
            </p>

        </form>
    </section>

    <footer class="text-center">
        <div class="p-3">&copy; <?php echo date("Y") ?> Hexes4U</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>

 