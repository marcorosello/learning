<?php

class SizeFilter {

    CONST ONE_SIZE = 'one size';

    private $patternReplacement = [
        //remove spaces after numbers or non words characters
        '!(?<=\d|\W)\s+!' => '',
        //remove spaces before non words characters
        '!\s(?=\W)!' => '',
        //remove * character
        '!(\*)!' => '',
        //remove non word character at the beginning or end
        '!(^\W|\W$)!' => '',
        //replace commas by dots only between numbers
        '!(?<=\d),(?=\d)!' => '.',
        //make year, years into y
        '((?:y)(ears|ear|rs|r))' => 'y',
        //fix ONE SIZE
        '!(oz|one-s|1size|fits all|osfa|onesi|onesz|unsized|onesize)!' => self::ONE_SIZE,
        '!uni(?:veral)?!' => self::ONE_SIZE,
        '!(one)\s(s.*)!' => self::ONE_SIZE,
        '!(\w)+(size)!' =>  self::ONE_SIZE,
        // remove "size" if followed by numbers
        '!((size)\s(?=\d))!' => '',
        // remove "size" if preceded by text but not one
        '!((?<=[xxs|xs|s|m|l|xl|xxl|xxxl])+\s(size))!' => '',
        //sizes with letter to be replaces to short, like EXTRA LARGE, to XL
        //convert multiple names to xs
        '!(\w+a\s|x-)s(\w)*!' => 'xs',
        '!small!' => 's',
        '!medium!' => 'm',
        '!(\w+a\s|x-)l(\w)*!' => 'xl',
        '!large!' => 'l',
        //replace ½ by .5
        //'!(?<=\d)\x{00BD}!u'  => '.5'
        // remove eu
        '!eu(?=\s\d+)!' => ''
    ];

    private $options = [
        'uppercase' => false,
        'unique' => true
    ];

    public function filter($unfilteredSizes) {
        //make everything lowercase
        if(!is_array($unfilteredSizes)) {
            $unfilteredSizes = [$unfilteredSizes];
        }
        $sizes = array_map("strtolower", $unfilteredSizes);
        $patterns = array_keys($this->patternReplacement);
        $replacements = array_values($this->patternReplacement);

        //run the preg replace with patterns and replacements
        $filteredSizes = preg_replace($patterns, $replacements, $sizes);

        //trim everything
        $filteredSizes = array_map('trim', $filteredSizes);

        //return lower or upper case
        $case = ($this->options['uppercase']) ? "strtoupper" : 'strtolower';
        $filteredSizes = array_map($case, $filteredSizes);

        if($this->options['unique']) {
            $filteredSizes = array_unique($filteredSizes);
        }

        if(count($filteredSizes) == 1) return $filteredSizes[0];
        return $filteredSizes;
    }


}
?>

