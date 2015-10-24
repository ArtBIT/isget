# isget() for PHP

[![Build Status](https://travis-ci.org/ArtBIT/isget.svg)](https://travis-ci.org/ArtBIT/isget) [![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/ArtBIT/isget/master/LICENSE) [![GitHub issues](https://img.shields.io/github/issues/ArtBIT/isget.svg)](https://github.com/ArtBIT/isget/issues)

This is a handy little helper function that is used to replace the common pattern of `isset($a, $a['b']) ? $a['b'] : $c;`  which can be ugly and redundant.

You can think of it as a long lost brother of `isset()`.

It does two things:
 * It silences down the PHP Undefined index notice, when trying to access an inexistent key in an array 
 * And returns a default value if the key is not set


## Usage

``` php
mixed isget(array $inputarray['somekey'], mixed $default_value)
```

If the `somekey` key is set, the function will return its value, if it's not, it will return the provided default value (or `false` by default);

It comes in really handy, if your function supports an array of options, and you don't want to worry about checking if the option has been set or not. 
i.e.
``` php
function do_something($required_param, $options = array()) {
    if (isget($options['forceint']) === true) {
        $required_param = intval($required_param);
    }
    if (isget($options['uppercase']) === true) {
        $required_param = strtoupper($required_param);
    }
    ...
    return $required_param;
}
$a = 12.34;
echo do_something($a);
// 12.34
echo do_something($a, array('forceint' => true));
// 12
```

If you need to go deeper, you can.
``` php
$dream = array();
echo isget($dream['within_a_dream']['within_a_dream']['within_a_dream']['...'], 'inception!');
// inception!
```

## Installation

The easiest way to install this library is to use Composer and add the following
to your project's `composer.json` file:

``` javascript
{
    "require": {
        "artbit/isget": "dev-master"
    }
}
```

Then, when you run `composer install`, everything will fall magically into place,
and the `isget()` function will be available to your project, as long as
you are including Composer's autoloader.

_However, you do not need Composer to use this library._

This library has no dependencies and should work on older versions of PHP.
Download the code and include `src/isget.php` in your project, and all
should work fine.

