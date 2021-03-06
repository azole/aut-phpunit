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
    public $wasLastFileNameValid;

    public function isValidLogFileName(String $filename)
    {
        $this->wasLastFileNameValid = false;

        if(empty(trim($filename))) {
            throw new \Exception("filename has to be provided");
        }

        if (!preg_match('/\.SLF$/i', $filename)) {
            return false;
        }

        $this->wasLastFileNameValid = true;
        return true;
    }

}