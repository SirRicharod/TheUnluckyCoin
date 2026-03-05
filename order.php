<?php
session_start();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senderEmail    = trim($_POST['sender_email']    ?? '');
    $targetName     = trim($_POST['target_name']     ?? '');
    $targetBirthday = trim($_POST['target_birthday'] ?? '');
    $notes          = trim($_POST['notes']           ?? '');

    // Validation
    if ($senderEmail === '') {
        $errors[] = 'Your email is required so we can confirm the curse.';
    } elseif (!filter_var($senderEmail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'That email address does not look quite right.';
    }
    if ($targetName === '') {
        $errors[] = 'The target\'s name is required.';
    }
    if ($targetBirthday === '') {
        $errors[] = 'The target\'s date of birth is required.';
    }

    if (empty($errors)) {
        $_SESSION['pending_order'] = [
            'sender_email'    => $senderEmail,
            'target_name'     => $targetName,
            'target_birthday' => $targetBirthday,
            'notes'           => $notes,
            'submitted_at'    => date('Y-m-d H:i:s'),
        ];

        // Send notification email via PHPMailer + Gmail SMTP
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

            $mail->setFrom('sirricharod@gmail.com', 'The Unlucky Coin');

            $mail->addReplyTo($senderEmail, 'Client');

            $mail->addAddress('sirricharod@gmail.com');
            $mail->CharSet = 'UTF-8';

            $mail->Subject = '🪙 New Curse Order — ' . $targetName;

            $notesLine = $notes !== '' ? $notes : '(none)';
            $mail->Body =
                "A new curse order has arrived.\n\n"
              . "─────────────────────────────\n"
              . "CLIENT EMAIL : {$senderEmail}\n"
              . "─────────────────────────────\n"
              . "TARGET NAME  : {$targetName}\n"
              . "TARGET DOB   : {$targetBirthday}\n"
              . "NOTES        : {$notesLine}\n"
              . "─────────────────────────────\n"
              . "Submitted    : " . date('Y-m-d H:i:s') . "\n\n"
              . "Payment is pending Ko-fi confirmation.\n"
              . "Reply to this email to reach the client directly.";

            $mail->send();
        } catch (Exception $e) {
            error_log('Mailer error: ' . $mail->ErrorInfo);
        }

        // Redirect to Ko-fi for payment
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
    <title>Order a Curse | The Unlucky Coin</title>
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

    <main class="order-page">
        <div class="order-card">
            <h1 class="gold-text">Order a Curse</h1>
            <p class="order-sub">
                Fill in the details below. You'll be taken to Ko-fi to pay €2 after submitting.
            </p>

            <?php if (!empty($errors)): ?>
                <ul class="form-error">
                    <?php foreach ($errors as $e): ?>
                        <li><?= htmlspecialchars($e) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <form method="POST" action="order.php" novalidate>

                <div class="mb-4">
                    <label for="sender_email" class="form-label">
                        Your email <span style="color:#e07b7b;">*</span>
                    </label>
                    <input type="email" class="form-control" id="sender_email" name="sender_email"
                           placeholder="you@example.com"
                           value="<?= htmlspecialchars($_POST['sender_email'] ?? '') ?>">
                    <p class="field-note">This is where I'll email you when it's done.</p>
                </div>

                <div class="mb-4">
                    <label for="target_name" class="form-label">
                        Target's full name <span style="color:#e07b7b;">*</span>
                    </label>
                    <input type="text" class="form-control" id="target_name" name="target_name"
                           placeholder="John Doe"
                           value="<?= htmlspecialchars($_POST['target_name'] ?? '') ?>">
                </div>

                <div class="mb-4">
                    <label for="target_birthday" class="form-label">
                        Target's date of birth <span style="color:#e07b7b;">*</span>
                    </label>
                    <input type="date" class="form-control" id="target_birthday" name="target_birthday"
                           value="<?= htmlspecialchars($_POST['target_birthday'] ?? '') ?>">
                </div>

                <div class="mb-4">
                    <label for="notes" class="form-label">
                        Anything else we should know?
                        <span style="font-size:0.75em;letter-spacing:0;text-transform:none;font-style:italic;">(optional)</span>
                    </label>
                    <textarea class="form-control" id="notes" name="notes"
                              rows="3"
                              placeholder="Context, grudges, relevant backstory..."><?= htmlspecialchars($_POST['notes'] ?? '') ?></textarea>
                </div>

                <button type="submit" class="btn-curse btn-curse-block">
                    Continue to payment →
                </button>

                <p class="mt-3 text-center field-note" style="font-size:0.8rem;">
                    After submitting you'll be redirected to Ko-fi to pay €2.
                    Nothing is charged on this page.
                </p>

            </form>

        </div>
    </main>

    <footer>
        <p>© <?php echo date('Y'); ?> The Unlucky Coin</p>
        <p class="footer-disclaimer">For entertainment purposes only. All sales final.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
