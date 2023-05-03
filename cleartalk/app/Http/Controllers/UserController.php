<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function edit(int $id)
    {
        return view('edit', compact('id'));
    }
}
