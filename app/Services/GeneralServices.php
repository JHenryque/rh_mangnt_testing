<?php

namespace App\Services;

class GeneralServices
{
    public static function checkIfSalaryIsGreaterThan($salary, $amount)
    {
        return $salary > $amount;
    }

    public static function createPhraseWithNameAndSalary($name, $salary)
    {
        return "O salário do(a) $name é $salary$";
    }

    public static function getSalaryWithBonus($salary, $bonus)
    {
        return $salary + $bonus;
    }

    public static function fakeDataInJson()
    {
        // cria 10 clientes com dadso falso
        $clients = [];
        for ($i = 0; $i < 100; $i++) {
            $clients[] = [
                'name' => \Faker\Factory::create()->name(),
                'email' => \Faker\Factory::create()->email(),
                'phone' => \Faker\Factory::create()->phoneNumber(),
                'address' => \Faker\Factory::create()->address(),
            ];
        }

        return json_encode($clients, JSON_PRETTY_PRINT);
    }
}
