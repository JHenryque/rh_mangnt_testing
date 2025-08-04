<?php

it ('test is an adimn user can see the RH users oage', function () {

    // criar o admin
    addAdminUser();

    // efetuar login com o admin
    auth()->loginUsingId(1);

    // verificar se acede com sucessi a pagina de RH users
    expect($this->get('/rh-users')->status())->toBe(200);
});
