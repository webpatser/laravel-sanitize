<?php

use Webpatser\Sanitize\Sanitize;

class SanitizeTest extends \PHPUnit_Framework_TestCase {

    public function test_clean()
    {
        $url = Sanitize::string('some_string');
        $this->assertEquals('some_string', $url);

        $url = Sanitize::string('Some String');
        $this->assertEquals('some-string', $url);
    }
}
 