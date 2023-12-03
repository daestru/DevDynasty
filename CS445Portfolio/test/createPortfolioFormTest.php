<?php

use PHPUnit\Framework\TestCase;

class createPortfolioFormTest extends TestCase

{
    public function testFormSubmission()
    {
        // Simulate form data
        $formData = [
            'firstlastname' => 'John Doe',
            'experience' => 'Web Developer',
            'skills' => 'PHP, HTML, CSS',
            'description' => 'Experienced web developer',
            'templateSelection' => '2',
        ];

        // Simulate POST request
        $_POST = $formData;

        // Start output buffering to capture the output of the included PHP file
        ob_start();
        include './DB/createPortfolioDB.php';
        $output = ob_get_clean();

        // Check for a redirect header
        $headers = headers_list();
        $hasLocationHeader = false;

        foreach ($headers as $header) {
            if (stripos($header, 'Location:') !== false) {
                $hasLocationHeader = true;
                break;
            }
        }

        // Assert that a Location header is present
        $this->assertTrue($hasLocationHeader);
    }
}