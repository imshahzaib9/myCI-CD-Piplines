assertFileExists('index.php');
    }

    public function testStyleFileExists()
    {
        $this->assertFileExists('style.css');
    }

    public function testIndexContainsTitle()
    {
        $content = file_get_contents('index.php');
        $this->assertStringContainsString('CI/CD Demo', $content);
    }

    public function testPhpVersion()
    {
        $this->assertGreaterThanOrEqual('7.4', phpversion());
    }
}