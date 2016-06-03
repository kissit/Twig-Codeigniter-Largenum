## Twig-Codeigniter-Largenum

A simple filter for Twig/Codeigniter to format a number with a textual suffix based on size as follows:
* Numbers larger than 1,000,000 will be divided by 1,000,000, rounded to one decimal place, and suffixed with "M".  
  * For example, 2,499,000 becomes "2.5 M"
* Numbers larger than 1,000 will be divided by 1000, rounded to one decimal place, and suffixed with "K"
  * For example, 52,200 becomes "52.2 K"
* Numbers <= 1,000 will simply be rounded to one decimal place and formatted to one decimal place.
  * For example, 23.99 becomes "24.0"

### Requirements
This filter is built on and requires usage of the Twig-Codeigniter library: https://github.com/bmatschullat/Twig-Codeigniter

It may be possible to use with other libraries as well with slight modifications.

### Installation
* Copy Largenum.php into your CI project where your Twig extensions are, probably: application/third_party/Twig/extensions

* Add the following to the __construct() method in application/libraries/Twig_library.php
```
require_once (string)APPPATH . 'third_party/Twig/extensions/Largenum.php';
```
* Add the following to the ci_function_init() method in application/libraries/Twig_library.php
```
$this->_twig_env->addExtension(new Twig_Extensions_Extension_Largenum());
```

### Usage
* In your template, use the filter as follows
```
{{ example_number | largenum_format }}
```
