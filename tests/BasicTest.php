<?php

class BasicTest
{
    private $passed = 0;
    private $failed = 0;

    public function run()
    {
        echo "Running PHP Application Tests...\n";
        echo "================================\n\n";

        $this->testIndexFileExists();
        $this->testApiFileExists();
        $this->testPhpVersion();
        $this->testApiResponse();

        echo "\n================================\n";
        echo "Tests Completed!\n";
        echo "Passed: {$this->passed}\n";
        echo "Failed: {$this->failed}\n";

        return $this->failed === 0;
    }

    private function testIndexFileExists()
    {
        echo "Test: index.php exists... ";
        if (file_exists('index.php')) {
            echo "✅ PASSED\n";
            $this->passed++;
        } else {
            echo "❌ FAILED\n";
            $this->failed++;
        }
    }

    private function testApiFileExists()
    {
        echo "Test: api.php exists... ";
        if (file_exists('api.php')) {
            echo "✅ PASSED\n";
            $this->passed++;
        } else {
            echo "❌ FAILED\n";
            $this->failed++;
        }
    }

    private function testPhpVersion()
    {
        echo "Test: PHP version >= 7.4... ";
        if (version_compare(PHP_VERSION, '7.4.0') >= 0) {
            echo "✅ PASSED (PHP " . PHP_VERSION . ")\n";
            $this->passed++;
        } else {
            echo "❌ FAILED (PHP " . PHP_VERSION . ")\n";
            $this->failed++;
        }
    }

    private function testApiResponse()
    {
        echo "Test: API returns valid JSON... ";
        ob_start();
        include 'api.php';
        $output = ob_get_clean();
        
        $data = json_decode($output, true);
        if ($data && isset($data['status'])) {
            echo "✅ PASSED\n";
            $this->passed++;
        } else {
            echo "❌ FAILED\n";
            $this->failed++;
        }
    }
}

// Run tests
$test = new BasicTest();
$success = $test->run();
exit($success ? 0 : 1);