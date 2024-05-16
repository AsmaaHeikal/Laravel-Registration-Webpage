<?php

namespace Tests\Feature;

use App\Http\Controllers\ApiController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ApiControllerTest extends TestCase
{
    /**
     * Test the getActorsNames method.
     *
     * @return void
     */
    public function testGetActorsNames()
    {
        // Mock the HTTP request
        Http::fake([
            'https://imdb8.p.rapidapi.com/actors/list-born-today' => Http::response(['actors/nm0000129'], 200),
            'https://imdb8.p.rapidapi.com/actors/get-bio' => Http::response(['name' => 'John Doe'], 200),
        ]);

        $controller = new ApiController();

        $birthdate = '2000-01-01';
        $expectedHtml = '<h2>Actors Born on January 1</h2><ul><li>';

        $request = new \Illuminate\Http\Request();
        $request->replace(['birthdate' => $birthdate]);

        $html = $controller->getActorsNames($request);

        $this->assertStringContainsString($expectedHtml, $html);
    }
}

