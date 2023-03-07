<?php

namespace App\Http\Controllers;

use App\Models\MyObject;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MyObjectsController extends Controller
{
    public function index(): View
    {
        $objects = MyObject::query()->byUser(User::find(1))->with('user')->get();
        return view('pages.objects.index', compact('objects'));
    }

    public function show(MyObject $object): View
    {
        $object = $object->load('user');
        $data = json_decode(json_encode($object->data), true);
        return view('pages.objects.show', compact('object', 'data'));
    }

    public function delete(MyObject $object): RedirectResponse
    {
        $object->delete();
        return to_route('objects.index');
    }
}
