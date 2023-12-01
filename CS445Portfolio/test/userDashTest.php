<?php

use PHPUnit\Framework\TestCase;

class userDashTest extends TestCase
{
    public function testSessionVariableSet()
    {
        // Start the session for testing
        session_start();

        // Set a mock user session
        $_SESSION['userName'] = 'TestUser';
        $_SESSION['userType'] = 'Admin';

        // Include your PHP file
        require_once 'userDash.php';

        // Get the output buffer (what is displayed on the page)
        $output = ob_get_clean();

        // Assert that the session variables are displayed on the page
        $this->assertStringContainsString('Welcome user, TestUser!', $output);
        $this->assertStringContainsString('User Type: Admin', $output);
    }

    public function testSessionVariableNotSet()
    {
        // Start the session for testing
        session_start();

        // Unset the mock user session
        unset($_SESSION['userName']);
        unset($_SESSION['userType']);

        // Include your PHP file
        require_once 'userDash.php';

        // Get the output buffer (what is displayed on the page)
        $output = ob_get_clean();

        // Assert that the session variable not set message is displayed on the page
        $this->assertStringContainsString('Session username not set. Please log in.', $output);
    }
}
