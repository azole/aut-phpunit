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
    /**
     * @test
     */
    public function isValidFileName_BadExtension_ReturnFalse()
    {
        $analyzer = new \Aut\Chap2\LogAnalyzer();

        $result = $analyzer->isValidLogFileName("file_with_bad_extension.foo");

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
        $analyzer = new \Aut\Chap2\LogAnalyzer();

        $result = $analyzer->isValidLogFileName($filename);

        $this->assertTrue($result);
    }
}