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
 * http://php.net/manual/en/book.simplexml.php
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

        $this->source = trim($xml->asXML());
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
        return $this->source;
    }

    /**
     * @{inheritDoc}
     */
    protected function convertFromSourceToArray($source)
    {
        $json = json_encode($source);
        $array = json_decode($json, true);

        return $array;
    }

    /**
     * @{inheritDoc}
     */
    protected function convertFromArrayToSource(array $array)
    {
        $rootTag = key($array);

        $xml = '<?xml version="1.0" encoding="utf-8"?>' . PHP_EOL .
            '<' . $rootTag . '>' .
            $this->fromArrayToXmlString($array[$rootTag]) .
            '</' . $rootTag . '>';

        return $xml;
    }

    /**
     * Builds xml string from provided array.
     *
     * @param array $array
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-03
     */
    private function fromArrayToXmlString(array $array)
    {
        $string = '';

        foreach ($array as $key => $value) {
            $string .= '<' . $key . '>' .
                ((is_array($value))
                    ? $this->fromArrayToXmlString($value)
                    : $value) .
                '</' . $key . '>';
        }

        return $string;
    }
}