<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class UserController extends Controller
{
    /***
     * This method demonstrates how to read the output of an Artisan command.
     *
     * @return string
     */
    public function __invoke()
    {
        Artisan::call('list:users');

        return Artisan::output();
    }
}
