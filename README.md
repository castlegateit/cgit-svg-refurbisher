# CGIT SVG Refurbisher

**Development of CGIT SVG Refurbisher has now stopped. The functionality provided by this plugin is now part of the [Monolith](https://github.com/castlegateit/monolith) library.**

----

Prevents cross-file interference between included SVG resources.

## Use

The `\Cgit\Refurbisher` class stops duplication of clip path IDs in loaded SVG files by
providing a method to include them with a safe expectation that everyone one must be uniquely ID'd.

~~~ php
$Refurbisher = new \Cgit\Refurbisher\Refurbisher();
$Refurbisher->Include_SVG('/path/to/svg.svg');
~~~
