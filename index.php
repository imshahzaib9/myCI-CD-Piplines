<?php
// Configuration
$app_name = "PHP CI/CD Demo Application";
$version = "1.0.0";
$environment = getenv('APP_ENV') ?: 'production';

// Get deployment info
$deploy_time = file_exists('deploy_info.txt') ? file_get_contents('deploy_info.txt') : 'Unknown';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $app_name; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>🚀 <?php echo $app_name; ?></h1>
            <p class="subtitle">Automated Deployment with GitHub Actions</p>
        </header>

        <div class="info-cards">
            <div class="card">
                <h3>📦 Version</h3>
                <p><?php echo $version; ?></p>
            </div>
            <div class="card">
                <h3>🌍 Environment</h3>
                <p><?php echo strtoupper($environment); ?></p>
            </div>
            <div class="card">
                <h3>⏰ Last Deployed</h3>
                <p><?php echo $deploy_time; ?></p>
            </div>
            <div class="card">
                <h3>💻 Server Info</h3>
                <p><?php echo php_uname('n'); ?></p>
            </div>
        </div>

        <div class="features">
            <h2>✨ Features Demonstrated</h2>
            <ul>
                <li>✅ Automated CI/CD Pipeline</li>
                <li>✅ GitHub Actions Workflow</li>
                <li>✅ Automated Testing</li>
                <li>✅ Automated Deployment</li>
                <li>✅ Environment Variables</li>
            </ul>
        </div>

        <div class="api-section">
            <h2>🔌 API Endpoint Test</h2>
            <button onclick="testAPI()">Test API</button>
            <pre id="api-response"></pre>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>