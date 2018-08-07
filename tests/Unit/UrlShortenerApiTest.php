<?php

namespace Tests\Unit;

use App\Url;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlShortenerApiTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testRedirect()
    {
        $url = factory(Url::class)->create();

        $response = $this->json('GET', 'api/' . $url->hash);

        $response->assertStatus(301)
            ->assertRedirect($url->url);
    }

    public function testShow()
    {
        $url = factory(Url::class)->create();

        $response = $this->json('GET', 'api/urls/' . $url->hash);

        $response->assertStatus(200)
            ->assertExactJson($url->toArray());
    }

    public function testCreate()
    {
        $response = $this->json('POST', 'api/urls', [
            'url' => $this->faker()->url,
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'id',
                'url',
                'hash',
                'pass',
                'created_at',
                'updated_at',
            ]);
    }

    public function testList()
    {
        $count = 10;

        factory(Url::class, $count)->create();

        $response = $this->json('GET', 'api/urls');

        $response->assertStatus(200)
            ->assertJsonCount($count);
    }

    public function testUpdate()
    {
        $url = factory(Url::class)->create();

        $update = [
            'url' => 'http://my-url.com',
            'hash' => 'my-hash',
            'pass' => $url->pass,
        ];

        $response = $this->json('PUT', 'api/urls/' . $url->hash, $update);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => $url->id,
                'url' => $update['url'],
                'hash' => $update['hash'],
                'pass' => $update['pass'],
                'created_at' => $url->created_at->format('Y-m-d H:i:s'),
            ]);
    }

    public function testDelete()
    {
        $url = factory(Url::class)->create();

        $delete = [
            'pass' => $url->pass,
        ];

        $response = $this->json('DELETE', 'api/urls/' . $url->hash, $delete);

        $response->assertStatus(204);

        $this->assertEquals(0, Url::count());
    }
}
