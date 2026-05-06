<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| Este arquivo diz ao Pest para usar a classe TestCase do Laravel.
| Sem isso, você recebe o erro "A facade root has not been set".
|
*/

uses(
    Tests\TestCase::class,
    Illuminate\Foundation\Testing\RefreshDatabase::class,
)->in('Feature', 'Unit');
