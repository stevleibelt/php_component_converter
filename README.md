# php_net_bazzline_component_converter

php tool that can handle convertation of following formats: php array, xml, yaml

## Converters

Right now, following converters are available out of the box:
  * PhpArrayConverter
  * JSONConverter
  * XMLConverter
  * YAMLConverter

I have focused on general configuration content. Each format has its limiting factors and they have kept in mind by creating other converters.
For example, you can not use attributes in the xml format since i have no idea how to convert that robust into the other formats.