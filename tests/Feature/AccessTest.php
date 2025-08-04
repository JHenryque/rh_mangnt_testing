<?php

it ('test is an adimn user can see the RH users oage', function () {

    // criar o admin
    addAdminUser();

    // efetuar login com o admin
    auth()->loginUsingId(1);

    // verificar se acede com sucessi a pagina de RH users
    expect($this->get('/rh-users')->status())->toBe(200);
});

it('test if is not possiblr to acces the home page homo page without logged user', function () {
    // verifica se e possivel aceder home page
    expect($this->get('/home')->status())->toBe(302);

    // ou
    expect($this->ge('/home')->status())->not()->toBe(200);
});

it('test if user logged in cain access to the login page', function () {
   // adcicionar afmin a base de dados
    addAdminUser();

    // verifica se estalogado
    auth()->loginUsingId(1);

    expect($this->get('/home')->status())->toBe(200);
});
