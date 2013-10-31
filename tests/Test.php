<?php

use midgardmvc_helper_urlize as Sanitize;

class SanitizeTest extends \PHPUnit_Framework_TestCase {

    /**
     * @expectedException InvalidArgumentException
     */
    public function test_empty()
    {
        $url = Sanitize::string('');
    }

    public function test_clean()
    {
        $string = 'hello_midgard';
        $url = Sanitize::string($string);
        $this->assertEquals($string, $url);

        $string2 = 'hello midgard';
        $url = Sanitize::string($string2);
        $this->assertEquals($string, $url);
    }

    public function test_scandinavian()
    {
        $string = 'älä lyö ääliö ööliä läikkyy';
        $url = Sanitize::string($string);
        $this->assertEquals('ala_lyo_aalio_oolia_laikkyy', $url);
    }

    public function test_russian()
    {
        $string = 'Контакты'; // Kontakty
        $url = Sanitize::string($string);
        $this->assertEquals('kontakty', $url);
    }

    public function test_arabic()
    {
        $string = 'العربي'; // al-ʿarabiyyah
        $url = Sanitize::string($string);
        $this->assertEquals('l_rby', $url);

        $string = 'عرب'; // ʿarabī
        $url = Sanitize::string($string);
        $this->assertEquals('rb', $url);
    }

    public function test_hebrew()
    {
        $string = 'עִבְרִית'; // Ivrit
        $url = Sanitize::string($string);
        $this->assertEquals('ib_riyt', $url);
    }

    public function test_turkish()
    {
        $string = 'Sanırım hepimiz aynı şeyi düşünüyoruz.';
        $url = Sanitize::string($string);
        $this->assertEquals('sanirim_hepimiz_ayni_seyi_dusunuyoruz', $url);
    }

    public function test_replacer()
    {
        $string = 'test, she said';
        $url = Sanitize::string($string, '-');
        $this->assertEquals($url, 'test-she-said');
    }

    public function test_double_convert()
    {
        $string = 'foo & bar';
        $clean1 = Sanitize::string($string);
        $clean2 = Sanitize::string($clean1);
        $this->assertEquals($clean1, $clean2);
    }
}
 