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

    /**
     * @test
     */
    public function isValidLogFileName_GoodExtensionLowercase_ReturnTrue()
    {
        $analyzer = new \Aut\Chap2\LogAnalyzer();

        $result = $analyzer->isValidLogFileName("filewithgoodextension.slf");

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function isValidLogFileName_GoodExtensionUppercase_ReturnTrue()
    {
        $analyzer = new \Aut\Chap2\LogAnalyzer();

        $result = $analyzer->isValidLogFileName("filewithgoodextension.SLF");

        $this->assertTrue($result);
    }
}