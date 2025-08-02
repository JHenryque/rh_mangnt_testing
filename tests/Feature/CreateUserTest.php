<?php
use App\Models\User;
use App\Models\Department;

it('test if an admin can inset a new RH user', function () {

    // criar user adim
        addAdminUser();

    // criar os departmentos
    addDepartment('Administração');
    addDepartment('Recursos Humanos');

    // login com o admin
    $result = $this->post('/login', [
        'email' => 'admin@rhmangnt.com',
        'password' => 'Aa123456',
    ]);

    // verifica se o login foi feito com sucesso
    expect($result->status())->toBe(302);
    expect($result->assertRedirect('/home'));

    // verifica se o admin consegue adicionar user de rh
     $result = $this->post('/rh-users/create-colaborator', [
         'name'=> 'Rh user',
         'email' => 'rhuser2@gmail.com',
         'select_department' => 2,
         'address' => 'Rua 1',
         'zip_code' => '12345',
         'city' => '123-city 1',
         'phone' => '123-phone',
         'salary' => '123',
         'admission_date' => '2019-01-01',
         'role' => 'rh',
         'permission' => '["rh"]',
     ]);

    // verifica se o user rh foi inserido com sucesso
    $this->assertDatabaseHas('users', [
        'name'=> 'Rh user',
        'email' => 'rhuser2@gmail.com',
        'role' => 'rh',
        'permission' => '["rh"]',
    ]);
});


function addDepartment($name)
{
    Department::insert([
        'name' => $name,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}
