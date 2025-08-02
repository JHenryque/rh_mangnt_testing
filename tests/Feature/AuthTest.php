<?php

use App\Models\User;

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

it('test if an admin user can login with correctly', function () {

    // create um admin user
    addAdminUser();

    // login com o admin criado

    $result = $this->post('/login', [
        'email' => 'admin@rhmangnt.com',
        'password' => 'Aa123456',
    ]);

    // verifica se o login foi feito com sucesso
    expect($result->status())->toBe(302);
    expect($result->assertRedirect('/home'));
});

it('test if an rh user can login with sucess', function () {

    // create um admin user
    addRhUser();

    // login com o Rh
    $result = $this->post('/login', [
        'email' => 'rildo@gmail.com',
        'password' => 'Aa123456',
    ]);

    // verifica se o login foi feito com sucesso
    expect($result->status())->toBe(302);
    expect($result->assertRedirect('/home'));

    // verofoca se o user th consegue acessa a pagina exclusiva
    expect($this->get('/rh-users/management/home')->status())->toBe(200);
});

function addAdminUser()
{
    User::insert([
        'department_id' => 1,
        'name' => 'Administrador',
        'email' => 'admin@rhmangnt.com',
        'email_verified_at' => now(),
        'password' => bcrypt('Aa123456'),
        'role' => 'admin',
        'permissions' => '["admin"]',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}

function addRhUser()
{
    User::insert([
        'department_id' => 2,
        'name' => 'Rildo',
        'email' => 'rildo@gmail.com',
        'email_verified_at' => now(),
        'password' => bcrypt('Aa123456'),
        'role' => 'rh',
        'permissions' => '["rh"]',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}
