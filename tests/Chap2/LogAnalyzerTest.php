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
    private $analyzer;

    // AUT作者建議：不要用 setUp 來初始化被測試的類別，建議採用工廠方法
    protected function setUp()
    {
        $this->analyzer = new \Aut\Chap2\LogAnalyzer();
    }

    protected function tearDown()
    {
        // 反模式，實務上不要這樣做
        $this->analyzer = null;
    }

    /**
     * @test
     */
    public function isValidFileName_BadExtension_ReturnFalse()
    {
        $result = $this->analyzer->isValidLogFileName("file_with_bad_extension.foo");

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
        $result = $this->analyzer->isValidLogFileName($filename);

        $this->assertTrue($result);
    }
}