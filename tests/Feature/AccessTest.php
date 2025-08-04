<?php

it('tests is an admin user can see the RH users page', function(){

    // criar o admin
    addAdminUser();

    // efetuar login com o admin
    auth()->loginUsingId(1);

    // verifca se acede com sucesso à pagina de RH users
    expect($this->get('/rh-users')->status())->toBe(200);

});

it('tests if is not possible to acces the home page without logged user', function(){

    // verifica se é possível aceder à home page
    expect($this->get('/home')->status())->toBe(302);

    // ou
    expect($this->get('/home')->status())->not()->toBe(200);

});

// corrigido o erro
it('tests if user logged in can acces to the login page', function(){

    // adicionar admin à base de dados
    addAdminUser();

    // verifica se está logado
    auth()->loginUsingId(1);

    expect($this->get('/forgot-password')->status())->not()->toBe(200);
});

it('tests if user logged in can acces to the recover password page', function(){

    // adicionar admin à base de dados
    addAdminUser();

    // verifica se está logado
    auth()->loginUsingId(1);

    expect($this->get('/login')->status())->not()->toBe(200);
});
