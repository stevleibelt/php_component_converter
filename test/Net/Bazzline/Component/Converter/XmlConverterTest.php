<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-02 
 */

namespace Net\Bazzline\Component\Converter;

use PHPUnit_Framework_TestCase;
use SimpleXMLElement;
use stdClass;

/**
 * Class XmlConverterTest
 *
 * @package Net\Bazzline\Component\Converter
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-02
 */
class XmlConverterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    private $array;

    /**
     * @var XmlConverter
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    private $converter;

    /**
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    private $source;

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    protected function setUp()
    {
        $this->array = array(
            'test' => array(
                'first' => array(
                    'firstChild' => 'firstChildValue'
                ),
                'second' => 'secondValue'
            )
        );

        $this->source = '<?xml version="1.0" encoding="utf-8"?>' . PHP_EOL .
            '<test>' .
                '<first>' .
                    '<firstChild>firstChildValue</firstChild>' .
                '</first>' .
                '<second>secondValue</second>' .
            '</test>';

        $this->converter = new XmlConverter();
    }

    /**
     * Returns invalid source
     *
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    static public function invalidSourceDataProvider()
    {
        return array(
            array(null),
            array(array(1)),
            array(1),
            array('1'),
            array(array('1')),
            array(new stdClass())
        );
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage No xml given as source
     * @dataProvider invalidSourceDataProvider
     * @param mixed $source
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    public function testFromSourceWithInvalidSource($source)
    {
        $this->converter->fromSource($source);
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    public function testFromSourceWithValidSource()
    {
        $this->converter->fromSource($this->source);

        $this->assertEquals(
            $this->source,
            $this->converter->toSource()
        );
        $this->assertEquals(
            $this->array,
            $this->converter->toPhpArray()
        );
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-03
     */
    public function testFromPhpArrayWithValidSource()
    {
        $this->converter->fromPhpArray($this->array);

        $this->assertEquals(
            $this->source,
            $this->converter->toSource()
        );
        $this->assertEquals(
            $this->array,
            $this->converter->toPhpArray()
        );
    }
}