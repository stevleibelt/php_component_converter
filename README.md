# php_net_bazzline_component_converter

php tool that can handle convertation of following formats: php array, xml, yaml

The build status of the current master branch is tracked by Travis CI: 
[![Build Status](https://travis-ci.org/stevleibelt/php_component_converter.png?branch=master)](http://travis-ci.org/stevleibelt/php_component_converter)

## Converters

Right now, following converters are available out of the box:
  * PhpArrayConverter
  * JSONConverter
  * XMLConverter
  * YAMLConverter

I have focused on general configuration content. Each format has its limiting factors and they have kept in mind by creating other converters.
For example, you can not use attributes in the xml format since i have no idea how to convert that robust into the other formats.

## Packagist

https://packagist.org/packages/net_bazzline/php_component_converter

Add following line to you composer.json file.  
"net_bazzline/php_component_converter": "dev-master"
