<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Products\Handler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataCatchController extends Controller
{
    public function __construct(private readonly Handler $handler)
    {
    }

    public function get(string $sources): array
    {
        $response = Http::get(config('app.url_api_dummy').'/'.$sources);

        if ($response->ok()) {
            $this->handler->handle($response->json());

            return ['code' => $response->status(), 'message' => 'success'];
        }

        return ['code' => $response->status(), 'message' => 'error'];
    }

    public function post(string $sources, Request $request): array
    {
        $response = Http::post(config('app.url_api_dummy').'/'.$sources.'/add',
            [
                'title' => $request->input('title'),
            ]);

        if ($response->ok()) {
            return ['code' => $response->status(), 'message' => 'success'];
        }

        return ['code' => $response->status(), 'message' => 'error'];
    }
}
