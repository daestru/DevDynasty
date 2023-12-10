<?php

use PHPUnit\Framework\TestCase;

class userDashTest extends TestCase
{

    private function normalizeString($str)
    {
        // Trim whitespace and replace multiple spaces with a single space
        return preg_replace('/\s+/', ' ', trim($str));
    }
    public function testSessionVariableSet()
    {
        // Start the session for testing
        session_start();

        // Set a mock user session
        $_SESSION['userName'] = 'TestUser';
        $_SESSION['userType'] = 'Admin';

        // Use output buffering to capture the output of the included file
        ob_start();

        // Include your PHP file
        require_once __DIR__ . '/../src/userDash.php';

        // Get the output buffer
        $output = ob_get_clean();

        // Normalize both expected and actual strings
        $output = $this->normalizeString($output);
        $expected = $this->normalizeString('
            <p>Welcome user, TestUser!</p>
        ');

        var_dump('Expected: ' . $expected);
        var_dump('Actual: ' . $output);
        // Assert that the session variables are displayed on the page
        $this->assertEquals($expected, $output);
    }
    

    public function testSessionVariableNotSet()
    {
        // Start the session for testing
        session_start();

        // Unset the mock user session
        unset($_SESSION['userName']);
        unset($_SESSION['userType']);

        // Use output buffering to capture the output of the included file
        ob_start();

        // Include your PHP file
        require_once __DIR__ . '/../src/userDash.php';

        // Get the output buffer (what is displayed on the page)
        $output = ob_get_clean();

        // Clean up whitespace and convert to lowercase for comparison
         // Normalize both expected and actual strings
         $output = $this->normalizeString($output);
         $expected = $this->normalizeString('
             <p>Session username not set. Please log in.</p>
         ');

         var_dump('Expected: ' . $expected);
         var_dump('Actual: ' . $output);
        // Assert that the session variable not set message is displayed on the page
        $this->assertEquals($expected, $output);
    
    }
}
