<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-02
 */

namespace Net\Bazzline\Component\Converter;

/**
 * Class ConverterFactory
 *
 * @package Net\Bazzline\Component\Converter
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-02
 */
class ConverterFactory
{
    /**
     * @return ConverterFactory
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    public static function buildDefault()
    {
        $factory = new self();

        return $factory;
    }

    /**
     * @param string $className - the class name of the converter
     * @return \Net\Bazzline\Component\Converter\ConverterInterface
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    public function get($className)
    {
        if (!class_exists($className)) {
            throw new InvalidArgumentException(
                'Invalid class name provided ("' . $className . '").'
            );
        }

        return new $className();
    }
}