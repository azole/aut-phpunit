<?php
/**
 * Created by PhpStorm.
 * User: azole
 * Date: 2018/5/27
 * Time: 17:28
 */

namespace Aut\Chap2;


class LogAnalyzer
{
    public function isValidLogFileName(String $filename)
    {
        if (!preg_match('/\.SLF$/', $filename)) {
            return false;
        }
        return true;
    }

}