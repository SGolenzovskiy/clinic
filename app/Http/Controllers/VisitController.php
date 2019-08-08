<?php

namespace Clinic\Http\Controllers;

use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * Ajax регистрация визита
     *
     * @param Request $request
     */
    public function visit(Request $request)
    {
        var_dump($request);
    }
}
