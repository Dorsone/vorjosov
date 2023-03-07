<?php

namespace App\Http\Controllers;

use App\Models\MyObject;
use App\Models\User;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('index');
    }

    #[NoReturn] public function sendRequest(Request $request)
    {
        $method = $request->get('method', 'get');
        $url = $request->get('url', 'not-found');
        $token = $request->get('token', '');
        $body = $request->get('body', []);

        $obj = null;
        if ($method === 'post' && $url === "/api/v1/my-objects")
        {
            $obj = MyObject::query()->byUser(User::find(1))->inRandomOrder()->first();
            $url .= "/$obj->id";
        }

        /** @var Response $response */
        $response = Http::withToken($token)->withHeaders(['Accept' => 'application/json'])->baseUrl("http://localhost:8000")->$method($url, json_decode($body, true));


        if ($obj)
        {
            dd("Status: ". $response->status(), "Before: ", $obj->toArray(), "After: ", $response->json());
        }

        dd("Status: ". $response->status(), $response->json());
    }
}
