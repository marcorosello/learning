<?php
//In this file there will be more function about array manupulations, to avoid foreach or for.

$testArray = [
  'Marco' => 'Spain',
  'Carlos' => 'Spain',
  'Fabio' => 'Spain',
  'Pepe' => 'Spain',
  'Edu' => 'Spain',
  'Cristiano' => 'Portugal',
];

$multiply = function ($value) {
    return $value * 2;
};

$multipliedArray = array_map($multiply, range(0, 3));

// var_dump($multipliedArray);

function odd($var) {
    return ($var & 1);
};

(new Hello())->filter();

class Hello {


  public function filter() {
    
    $odds = array_filter(range(0,12), 'odd');

    var_dump($odds);
  }
}
