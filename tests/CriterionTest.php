<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CriterionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNewCriterionRegistration()
    {
        $this   ->visit('/admin/criterios/create')
                ->type('1', 'phase')
                ->type('criterio', 'criterion')
                ->press('Agregar')
                ->seeInDatabase('criteria', ['phase'=>'1', 'criterion'=>'criterio']);
    }
}
