<?php

it('display the login page when not logged in', function () {
    // verifica, no contexto do Fortify, se ao entrar na pagina inicial, vai ser
    // redirecionado para a pagina de login
    $result = $this->get('/')->assertRedirect('/login');

    // verifica se o reulstado é 302
    expect($result->status())->toBe(302);

    // verifica se a rota de login e acessivel com status 200
    expect($this->get('/login')->status())->toBe(200);

    // verifica se a pagina de login contem o texto "esqueceu a senha"
    expect($this->get('/login')->content())->toContain("Esqueceu a sua senha?");
});

it('display the recover password page page correctly', function () {
   expect($this->get('/forgot-password')->status())->toBe(200);
   expect($this->get('/forgot-password')->content())->toContain("Já sei a minha senha?");
});
