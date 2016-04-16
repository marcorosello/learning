<?php

class SizeFilter {

    CONST ONE_SIZE = 'one size';
    private static $patternReplacement = [
        //remove spaces after numbers or non words characters
        '!(?<=\d|\W)\s+!' => '',
        //remove spaces before non words characters
//        '!(?=\W)\s+!' => '',
        //remove * character
        '!(\*)!' => '',
        //remove non word character at the beginning or end
        '!(^\W|\W$)!' => '',
        //replace commas by dots only between numbers
        '!(?<=\d),(?=\d)!' => '.',
        //make year, years into y
        '((?:y)(ears|ear|rs|r))' => 'y',
        //fix ONE SIZE
        '!(oz|one-s|1size|osfa|unsized|onesize)!' => self::ONE_SIZE,
        '!uni(?:veral)?!' => self::ONE_SIZE,
        '!(one)\s(.*)!' => self::ONE_SIZE,
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
    ];

    private static $options = [
        'uppercase' => false,
        'unique' => true
    ];

    public static function filter($unfilteredSizes) {
        //make everything lowercase
        if(!is_array($unfilteredSizes)) {
            $unfilteredSizes = [$unfilteredSizes];
        }
        $sizes = array_map("strtolower", $unfilteredSizes);
        $patterns = array_keys(self::$patternReplacement);
        $replacements = array_values(self::$patternReplacement);

        //run the preg replace with patterns and replacements
        $filteredSizes = preg_replace($patterns, $replacements, $sizes);

        //trim everything
        $filteredSizes = array_map('trim', $filteredSizes);

        //return lower or upper case
        $case = (self::$options['uppercase']) ? "strtoupper" : 'strtolower';
        $filteredSizes = array_map($case, $filteredSizes);

        if(self::$options['unique']) {
            $filteredSizes = array_unique($filteredSizes);
        }

        if(count($filteredSizes) == 1) return $filteredSizes[0];
        return $filteredSizes;
    }


}
?>

