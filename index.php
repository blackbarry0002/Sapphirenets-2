<?php
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sapphire - Welcome</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="container">
                <div class="logo">
                    <h1>Sapphire</h1>
                </div>
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="pages/about.php">About</a></li>
                    <li><a href="pages/services.php">Services</a></li>
                    <li><a href="pages/contact.php">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h2>Welcome to Sapphire</h2>
                <p>Your premier destination for quality and excellence</p>
                <a href="#" class="btn btn-primary">Get Started</a>
            </div>
        </section>

        <section class="features">
            <div class="container">
                <h2>Our Features</h2>
                <div class="feature-grid">
                    <div class="feature-card">
                        <h3>Fast</h3>
                        <p>Lightning-quick performance for seamless experience</p>
                    </div>
                    <div class="feature-card">
                        <h3>Secure</h3>
                        <p>Enterprise-grade security to protect your data</p>
                    </div>
                    <div class="feature-card">
                        <h3>Reliable</h3>
                        <p>99.9% uptime guarantee for uninterrupted service</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2026 Sapphire. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>