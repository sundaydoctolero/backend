<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Publication;

class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(){
        $publications = Publication::select('id','publication_name')
            ->orderBy('publication_name')
            ->get();

        return response()->json($publications,200);
    }
}
