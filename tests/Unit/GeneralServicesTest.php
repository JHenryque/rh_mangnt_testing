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

