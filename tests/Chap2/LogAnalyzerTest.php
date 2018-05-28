<?php
/**
 * Created by PhpStorm.
 * User: azole
 * Date: 2018/5/27
 * Time: 17:33
 */

namespace Tests\Chap2;

use PHPUnit\Framework\TestCase;

final class LogAnalyzerTest extends TestCase
{
    // 採用工廠方法
    private function makeAnalyzer()
    {
        return new \Aut\Chap2\LogAnalyzer();
    }

    /**
     * @test
     */
    public function isValidFileName_BadExtension_ReturnFalse()
    {
        // Arrange
        $analyzer = $this->makeAnalyzer();

        // Act
        $result = $analyzer->isValidLogFileName("file_with_bad_extension.foo");

        // Assert
        $this->assertFalse($result);
    }

    public function goodExtension_Provider()
    {
        return array(["filewithgoodextension.slf"], ["filewithgoodextension.SLF"]);
    }

    /**
     * @test
     * @dataProvider goodExtension_Provider
     */
    public function isValidLogFileName_ValidExtensions_ReturnTrue($filename)
    {
        $analyzer = $this->makeAnalyzer();

        $result = $analyzer->isValidLogFileName($filename);

        $this->assertTrue($result);
    }

    /**
     * @test
     * @expectedException  \Exception
     * @expectedExceptionMessage filename has to be provided
     */
    public function isValidFileName_EmptyFileName_ThrowException()
    {
        $analyzer = $this->MakeAnalyzer();
        $analyzer->isValidLogFileName("");
    }

    public function filename_Provider()
    {
        return array(["badfile.foo", false], ["goodfile.slf", true]);
    }

    /**
     * @test
     * * @dataProvider filename_Provider
     */
    public function isValidFileName_WhenCalled_ChangesWasLastFileNameValid($filename, $expected)
    {
        $analyzer = $this->makeAnalyzer();

        $analyzer->isValidLogFileName($filename);

        $this->assertEquals($expected, $analyzer->wasLastFileNameValid);
    }
}