<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-02
 */

namespace Net\Bazzline\Component\Converter;

use SimpleXMLElement;
use Exception;

/**
 * Class XmlConverter
 *
 * @package Net\Bazzline\Component\Converter
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-02
 */
class XmlConverter extends ConverterAbstract
{
    /**
     * Loads from source format
     *
     * @param string $source - the source that should be converted
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @return ConverterInterface
     * @since 2013-06-02
     */
    public function fromSource($source)
    {
        try {
            $xml = new SimpleXMLElement($source);
        } catch (Exception $exception) {
            throw new InvalidArgumentException(
                'No xml given as source'
            );
        }

        $this->source = $xml;
        $this->array = $this->convertFromSourceToArray($xml);
    }

    /**
     * Returns the source format as string.
     *
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    public function toSource()
    {
        return (string) $this->source;
    }

    /**
     * @{inheritDoc}
     */
    protected function convertFromSourceToArray($source)
    {
        $array = array();
        $properties = get_object_vars($source);

        foreach ($properties as $property) {
            $array[$property] = (is_array($source->$property)) ?
                $this->convertFromSourceToArray($source->$property) :
                $source->$property;
        }

        return $array;
    }

    /**
     * @{inheritDoc}
     */
    protected function convertFromArrayToSource(array $array)
    {
        $source = new SimpleXMLElement('');

        foreach ($array as $key => $value) {
            $source->$key = (is_array($array[$key]))
                ? $this->convertFromArrayToSource($array[$key])
                : $array[$key];
        }

        return $source;
    }
}