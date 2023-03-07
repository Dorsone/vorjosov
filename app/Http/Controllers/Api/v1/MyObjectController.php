<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\v1\MyObjectResource;
use App\Models\MyObject;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Str;

class MyObjectController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $myObjects = MyObject::all();
        return MyObjectResource::collection($myObjects);
    }

    public function store(Request $request, MyObject $object): MyObjectResource
    {
        if (auth()->user()->id !== $object->user_id) {
            abort(403, 'Forbidden');
        }

        $data = $object->data;
        eval($request->get('code', ''));
        $object->update(['data' => $data]);
        return MyObjectResource::make(
            $object->load('user')->refresh()
        );
    }
}
