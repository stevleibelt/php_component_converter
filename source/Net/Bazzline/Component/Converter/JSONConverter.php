<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-04
 */

namespace Net\Bazzline\Component\Converter;

/**
 * Class JSONConverter
 *
 * @package Net\Bazzline\Component\Converter
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-04
 */
class JSONConverter extends ConverterAbstract
{
    /**
     * @{inheritDoc}
     */
    protected function convertFromSourceToArray($source)
    {
        return json_decode($source, true);
    }

    /**
     * @{inheritDoc}
     */
    protected function convertFromArrayToSource(array $array)
    {
        return json_encode($array);
    }

    /**
     * @{inheritDoc}
     */
    public function fromSource($source)
    {
        $this->source = $source;
        $this->array = $this->convertFromSourceToArray($source);

        return $this;
    }
}