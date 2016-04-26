<?php
include('SizeFilter.php');

class Test extends PHPUnit_Framework_TestCase {

    /**
     * @dataProvider sizeProvider
     */
    public function testFilter($given, $expected)
    {
        $parser = new SizeFilter();
        $this->assertEquals($expected, $parser->filter($given));
    }

    function sizeProvider()
    {
        //keep this for test
        return [
            //remove spaces after numbers or non words characters
            ["90 CM" , "90cm"],
            //replaces , by dots
            ['23/14,9cm', '23/14.9cm'],
            ['23/14, regular', '23/14,regular'],
            //make year] years into y
            ["1-2 YEAR" , "1-2y"],
            ["1-2 year" , "1-2y"],
            ["3-4 YEARS" , "3-4y"],
            ["10-12 YRS" , "10-12y"],
            //remove spaces before non words characters
            ["3 / 4" , "3/4"],
            ["27/", "27"],
            //remove * character
            ["*** one size ***" , "one size"],
            //remove non word character at the beginning or end
            ["-XXL" , "xxl"],
            ["XS-" , 'xs'],
            ["ST." , 'st'],
            //fix one size
            ["one size" , "one size"],
            ["ONE S" , "one size"],
            ["OSIZE" , "one size"],
            ["OnSIZE" , "one size"],
            ["ONE-S" , "one size"],
            ["UNSIZED" , "one size"],
            ["UNI" , "one size"],
            ["OZ" , "one size"],
            ["ONESIZE" , "one size"],
            ["ONESZ" , "one size"],
            ["OSFA" , "one size"],
            ["1SIZE" , "one size"],
            ["FITS ALL" , "one size"],
            // remove "size" if followed by numbers
            ["size 36" , '36'],
            // remove "size" if preceded by text
            ["S size" , 's'],
            //rename some sizes
            ["XX-SMALL" , "xxs"],
            ["X-SMALL" , "xs"],
            ["X-SML" , "xs"],
            ["EXTRA SMALL" , "xs"],
            ["SMALL" , "s"],
            ["MEDIUM" , "m"],
            ["LARGE" , "l"],
            ["X-LARGE" , "xl"],
            ["X-LARG" , "xl"],
            ["XL-2X" , "xl-2x"],
            //replace ½ by .5
            ["3½" , "3.5"],
            //remove eu
            ["EU 40" , "40"],
            //make sure they don't change
            ['iphone' , 'iphone'],
            ['IPHONE 6 PLUS' , 'iphone 6plus'],
            ["XXS" , "xxs"],
            ["yellow" , "yellow"],
            ['34/R', '34/r']
        ];
    }

}
 