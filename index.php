<?php
/**
 * PHP CI/CD Demo Application
 * Main entry point with visitor counter
 */

// Configuration
$countFile = 'visitor_count.txt';

// Initialize visitor count file if it doesn't exist
if (!file_exists($countFile)) {
    file_put_contents($countFile, '0');
}

// Read and increment visitor count
$count = (int)file_get_contents($countFile);
$count++;
file_put_contents($countFile, $count);

// Get server information
$phpVersion = phpversion();
$serverSoftware = $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown';
$deploymentTime = date('Y-m-d H:i:s');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CI/CD Demo Application</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>🚀 Welcome to CI/CD Demo App</h1>
            <p class="subtitle">This application was automatically deployed using GitHub Actions!</p>
        </header>

        <div class="stats-grid">
            <div class="stat-card primary">
                <h2>Visitor Count</h2>
                <p class="stat-number"><?php echo number_format($count); ?></p>
                <p class="stat-label">Total Visits</p>
            </div>

            <div class="stat-card secondary">
                <h2>Deployment Info</h2>
                <p class="stat-text"><?php echo $deploymentTime; ?></p>
                <p class="stat-label">Last Deployed</p>
            </div>
        </div>

        <div class="info-section">
            <h3>📊 System Information</h3>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">PHP Version:</span>
                    <span class="info-value"><?php echo $phpVersion; ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Server:</span>
                    <span class="info-value"><?php echo $serverSoftware; ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Status:</span>
                    <span class="info-value status-active">✓ Active</span>
                </div>
            </div>
        </div>

        <div class="features">
            <h3>✨ Pipeline Features</h3>
            <ul>
                <li>✅ Automated Testing with PHPUnit</li>
                <li>✅ Code Quality Checks</li>
                <li>✅ Continuous Integration</li>
                <li>✅ Automatic Deployment</li>
                <li>✅ Version Control with Git</li>
            </ul>
        </div>

        <footer>
            <p>Powered by GitHub Actions | PHP <?php echo $phpVersion; ?></p>
        </footer>
    </div>
</body>
</html>