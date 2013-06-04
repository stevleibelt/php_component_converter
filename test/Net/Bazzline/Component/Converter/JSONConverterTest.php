<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-04 
 */

namespace Net\Bazzline\Component\Converter;

use PHPUnit_Framework_TestCase;

/**
 * Class JSONConverterTest
 *
 * @package Net\Bazzline\Component\Converter
 * @author stev leibelt <artodeto@arcor.de>
 * @since
 */
class JSONConverterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-04
     */
    private $array;

    /**
     * @var XmlConverter
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-04
     */
    private $converter;

    /**
     * @var string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-04
     */
    private $source;

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-04
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

        $this->source = '{"test":' .
            '{"first":' .
                '{"firstChild":"firstChildValue"},' .
            '"second":"secondValue"' .
            '}}';

        $this->converter = new JSONConverter();
    }

    /**
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-04
     */
    public function testFromSource()
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
     * @since 2013-06-04
     */
    public function testFromPhpArray()
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