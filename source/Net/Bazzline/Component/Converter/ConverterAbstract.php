<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-02
 */

namespace Net\Bazzline\Component\Converter;

/**
 * Class ConverterAbstract
 *
 * @package Net\Bazzline\Component\Converter
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-02
 */
abstract class ConverterAbstract implements ConverterInterface
{
    /**
     * @var array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    protected $array;

    /**
     * @var mixed
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    protected $source;

    /**
     * @{inheritDoc}
     */
    public function toPhpArray()
    {
        return (array) $this->array;
    }

    /**
     * @{inheritDoc}
     */
    public function fromPhpArray(array $array)
    {
        $this->array = $array;
        $this->source = $this->convertFromArrayToSource($array);

echo var_export($this->source, true);
        return $this;
    }

    /**
     * Converts given source string to an php array
     *
     * @param string $source - the source
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    abstract protected function convertFromSourceToArray($source);

    /**
     * Converts array to source string
     *
     * @param array $array
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    abstract protected function convertFromArrayToSource(array $array);
}
