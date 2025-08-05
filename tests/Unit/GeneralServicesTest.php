<?php

use App\Services\GeneralServices;

it('tests if the salary is grather than a specific amount', function(){
    $salary = 1000;
    $amount = 500;

    $result = GeneralServices::checkIfSalaryIsGreaterThan($salary, $amount);

    expect($result)->toBeTrue();
});

it('tests if the salary is not grather than a specific amount', function(){
    $salary = 1000;
    $amount = 1500;

    $result = GeneralServices::checkIfSalaryIsGreaterThan($salary, $amount);

    expect($result)->toBeFalse();
});

it('tests if the phrase is created correctly', function(){
    $name = "José Henrique";
    $salary = 1000;

    $result = GeneralServices::createPhraseWithNameAndSalary($name, $salary);

    expect($result)->toBe('O salário do José Henrique é 1000$');
});
