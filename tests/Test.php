<?php

use \Webpatser\Sanitize\Sanitize as Sanitize;

class SanitizeTest extends \PHPUnit_Framework_TestCase {

    /**
     * @expectedException InvalidArgumentException
     */
    public function test_empty()
    {
        Sanitize::string('');
    }

    public function test_clean()
    {
        $string = 'sanitize-me-please';
        $url = Sanitize::string($string);
        $this->assertEquals($string, $url);
    }

    public function test_basic()
    {
        $string = 'Hello String';
        $url = Sanitize::string($string);
        $this->assertEquals('hello-string', $url);
    }

    public function test_long_sentence_with()
    {
        $string = 'Gödöllön pöllö töllöttää, möllöttää, köllöttää ja ööliä löllöttää';
        $url = Sanitize::string($string);
        $this->assertEquals('godollon-pollo-tollottaa-mollottaa-kollottaa-ja-oolia-lollottaa', $url);
    }

    public function test_sentence_with_punctuation()
    {
        $string = 'Run, Forrest Run!';
        $url = Sanitize::string($string);
        $this->assertEquals('run-forrest-run', $url);
    }

    public function test_double_sanitize()
    {
        $string = 'foo & bar';
        $clean1 = Sanitize::string($string);
        $clean2 = Sanitize::string($clean1);
        $this->assertEquals($clean1, $clean2);
    }
}
 