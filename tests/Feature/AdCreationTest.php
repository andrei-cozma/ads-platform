<?php

namespace Tests\Feature;

use App\City;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Ad;

class AdCreationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_ad_can_be_created()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $city = new City;
        $city->name = 'Braila';
        $city->save();

        $response = $this->actingAs($user)->post('/ads', [
            'city_id' => $city->id,
            'name' => 'Studio for rent in Primaverii',
            'price' => '299.00',
            'currency' => 'Eur',
            'description' => 'We rent our studio for one year.'
        ]);

        $response->assertOk();
        $this->assertCount(1, Ad::all());
    }
}
