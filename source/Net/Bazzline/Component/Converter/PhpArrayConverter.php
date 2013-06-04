<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-02
 */

namespace Net\Bazzline\Component\Converter;

/**
 * Class PhpArrayConverter
 *
 * @package Net\Bazzline\Component\Converter
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-02
 */
class PhpArrayConverter extends ConverterAbstract
{
    /**
     * @{inheritDoc}
     */
    public function fromSource($source)
    {
        if (!is_array($source)) {
            throw new InvalidArgumentException(
                'No php array given as source'
            );
        }

        $this->source = $source;
        $this->array = $this->convertFromSourceToArray($source);

        return $this;
    }

    /**
     * @{inheritDoc}
     */
    protected function convertFromSourceToArray($source)
    {
        return (is_array($source)) ? $source : (array) $source;
    }

    /**
     * @{inheritDoc}
     */
    protected function convertFromArrayToSource(array $array)
    {
        return $array;
    }
}
