<?php

namespace Tests\Feature;

use App\Models\MyObject;
use App\Models\User;
use Tests\TestCase;

class ObjectsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_getting_list(): void
    {
        $this->get(route('api.my-objects.index'))
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    ['id', 'data' => []]
                ],
            ]);
    }

    public function test_updating_object()
    {
        $object = MyObject::query()->byUser(User::find(1))->inRandomOrder()->first();
        $code = '$data->list->sublist[1] = 1;';
        $response = $this->post(route('api.my-objects.store', $object->id), ['code' => $code])
            ->assertOk()
            ->assertJsonStructure([
                'id',
                'data' => [],
                'user' => [],
            ]);
        $this->assertEquals(1, $response->json('data')['list']['sublist'][1]);

    }
}
