<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-04
 */

namespace Net\Bazzline\Component\Converter;

use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Dumper;

/**
 * Class YAMLConverter
 *
 * @package Net\Bazzline\Component\Converter
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-04
 */
class YAMLConverter extends ConverterAbstract
{
    /**
     * @{inheritDoc}
     */
    protected function convertFromSourceToArray($source)
    {
        $parser = new Parser();

        return $parser->parse($source);
    }

    /**
     * The maximum level of nested sub arrays is hardcoded to 30.
     *
     * @{inheritDoc}
     */
    protected function convertFromArrayToSource(array $array)
    {
        $dumper = new Dumper();

        return $dumper->dump($array, 30);
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