<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-02 
 */

namespace Net\Bazzline\Component\Converter;

use stdClass;
use PHPUnit_Framework_TestCase;

/**
 * Class PhpArrayConverterTest
 *
 * @package Net\Bazzline\Component\Converter
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-01
 */
class PhpArrayConverterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var PhpArrayConverter
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    private $converter;

    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    private $array;

    /**
     * @var array
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
        $this->converter = new PhpArrayConverter();
        $this->array = array(
            '1-k' => array(
                '1-1-k' => '1-1-v'
            ),
            '2-k' => '2-v'
        );
        $this->source = $this->array;
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
            array(1),
            array('1'),
            array(new stdClass())
        );
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage No php array given as source
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
     * @since 2013-06-02
     */
    public function testToPhpArray()
    {
        $this->converter->fromSource($this->source);

        $this->assertEquals(
            $this->array,
            $this->converter->toPhpArray()
        );
    }
}