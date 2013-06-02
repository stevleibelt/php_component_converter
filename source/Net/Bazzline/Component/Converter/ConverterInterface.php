<?php
/**
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-02
 */
namespace Net\Bazzline\Component\Converter;

/**
 * Class ConverterInterface
 *
 * @package Net\Bazzline\Component\Converter
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-02
 */
interface ConverterInterface
{
    /**
     * Loads from php array
     *
     * @param array $array - the php array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    public function fromPhpArray(array $array);

    /**
     * Loads from source format
     *
     * @param string $source - the source that should be converted
     * @throws InvalidArgumentException
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    public function fromSource($source);

    /**
     * Returns the source formatted as php array
     *
     * @return array
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    public function toPhpArray();

    /**
     * Returns the source format as string.
     *
     * @return string
     * @author stev leibelt <artodeto@arcor.de>
     * @since 2013-06-02
     */
    public function toSource();
}