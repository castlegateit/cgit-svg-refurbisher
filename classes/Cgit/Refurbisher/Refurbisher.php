<?php

namespace Cgit;

class Refurbisher
{

    /**
    *  List of SVGs in use.
    *
    * @var array
    */

    public $svg_index;

    /**
    * Function to include SVG's with deduplication of internal clipping paths.
    * @param string $path Filepath to SVG.
    *
    */

    public function Include_SVG($path) {

        $index = str_replace('.svg', count($this->svg_index), pathinfo($path)['basename']);

        // If we're reloading an SVG we've already loaded, check and use the same ID on it.
        if (count($this->svg_index) && $duplicate = array_search($index, $this->svg_index)) {
            $index = $duplicate;
            unset($duplicate);
        }

        $this->svg_index[] = $index;

        $selectors = array();

        $temp = file_get_contents($path);

        preg_match_all('/<clipPath id="(.*?)">/', $temp, $selectors);

        // Selectors[1] is the array of actual IDs we have captured.

        foreach ($selectors[1] as $key => $value) {

            $temp = preg_replace(
                 '/<clipPath id="'.$value.'">/',
                 '<clipPath id="'.$value.'-'.$index.'">',
                 $temp);

            $temp = preg_replace(
                                 '/url\(#'.$value.'\)/',
                                 'url(#'.$value.'-'.$index.')',
                                 $temp);

        }

        echo $temp;

        // Delete the temp data so we don't duplicate every SVG in memory.

        unset($temp);
    }

}
