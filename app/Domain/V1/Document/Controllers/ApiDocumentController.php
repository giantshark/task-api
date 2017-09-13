<?php

namespace App\Domain\V1\Document\Controllers;

use App\Http\Controllers\Controller;

class ApiDocumentController extends Controller
{

    public function index()
    {
        return view('V1.Document.index');
    }

}
