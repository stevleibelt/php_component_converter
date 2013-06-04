<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-04 
 */

namespace Net\Bazzline\Component\Converter;

use PHPUnit_Framework_TestCase;

/**
 * Class YAMLConverterTest
 *
 * @package Net\Bazzline\Component\Converter
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-04
 */
class YAMLConverterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-04
     */
    private $array;

    /**
     * @var XMLConverter
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

        $this->source =
            'test:' . PHP_EOL .
            '    first:' . PHP_EOL .
            '        firstChild: firstChildValue' . PHP_EOL .
            '    second: secondValue' . PHP_EOL .
            '';

        $this->converter = new YAMLConverter();
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
