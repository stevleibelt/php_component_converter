<?php
/**
 * @param string $className - the name of the class the autoloader should load
 * @return bool
 * @author stev leibelt <artodeto@arcor.de>
 * @since 2013-06-02
 */
function netBazzlineComponentConverterBasicAutoloader($className)
{
    $namespace = 'Net\\Bazzline\\Component\\Converter\\';
    //$lengthOfNamespace = strlen($namespace);
    //$lengthOfNamespace = 33;
    //$expectedNamespace = substr($classname, 0, $lengthOfNamespace);
    $expectedNamespace = substr($className, 0, 33);

    $isSupportedClassnameByNamespace = ($namespace == $expectedNamespace);

    if ($isSupportedClassnameByNamespace) {
        $classNameWithRemovedNamespace = str_replace($namespace, '', $className);
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $classNameWithRemovedNamespace) . '.php';
        $includePaths = array(
            realpath(__DIR__ . DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR
        );

        foreach ($includePaths as $includePath) {
            $filePath = realpath($includePath . DIRECTORY_SEPARATOR . $fileName);

            if (file_exists($filePath)) {
                require_once $filePath;

                break;
            } else {
                echo var_export(
                        array(
                            'classname' => $className,
                            'filename' => $fileName,
                            'filepath' => $filePath,
                            'includedPath' => $includePath
                        ),
                        true
                    ) . PHP_EOL;
            }
        }
    } else {
        return false;
    }
}

spl_autoload_register('netBazzlineComponentConverterBasicAutoloader');
