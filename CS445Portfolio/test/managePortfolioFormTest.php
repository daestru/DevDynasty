<php?

use PHPUnit\Framework\TestCase;

class managePortfolioTest extends TestCase
{
    public function testGetAllPortfolios()
    {
     
        $_SESSION['userName'] = 'TestUser';

        $mockConnection = $this->getMockBuilder(mysqli::class)
                              ->disableOriginalConstructor()
                              ->getMock();
        $mockResult = $this->getMockBuilder(stdClass::class)
                          ->setMethods(['fetch_assoc'])
                          ->getMock();

        // Set up the expected SQL query
        $expectedQuery = "SELECT * FROM portfolioTestUser";

        // Expect the query to be executed
        $mockConnection->expects($this->once())
                       ->method('query')
                       ->with($this->equalTo($expectedQuery))
                       ->willReturn($mockResult);

        // Set up a mock row to be returned by fetch_assoc
        $mockRow = [
            'portfolioID' => 1,
            'name' => 'TestPortfolio',
            'description' => 'Test description',
            'skills' => 'PHP, HTML, CSS',
            'experience' => 'Test experience',
            'templateSelection' => '1',
        ];

        // Expect fetch_assoc to be called and return the mock row
        $mockResult->expects($this->once())
                   ->method('fetch_assoc')
                   ->willReturn($mockRow);

        // Mock the Portfolio class
        $mockPortfolio = $this->getMockBuilder(Portfolio::class)
                             ->disableOriginalConstructor()
                             ->getMock();

        // Expect the Portfolio constructor to be called with the mock row
        $mockPortfolio->expects($this->once())
                      ->method('__construct')
                      ->with(
                          $this->equalTo($mockRow['portfolioID']),
                          $this->equalTo($mockRow['name']),
                          $this->equalTo($mockRow['description']),
                          $this->equalTo($mockRow['skills']),
                          $this->equalTo($mockRow['experience']),
                          $this->equalTo($mockRow['templateSelection'])
                      );

        // Set up the mock portfolios array
        $expectedPortfolios = [$mockPortfolio];

        // Expect the mysqli_close method to be called
        $mockConnection->expects($this->once())
                       ->method('close');

        // Create an instance of the class under test
        $portfolioInstance = new Portfolio();

        // Call the function being tested
        $portfolios = $portfolioInstance->getAllPortfolios($mockConnection);

        // Assert that the portfolios returned match the expected portfolios
        $this->assertEquals($expectedPortfolios, $portfolios);
    }
}
