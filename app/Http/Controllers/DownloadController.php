<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Download;

use Carbon\Carbon;

use App\Publication;


class DownloadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function getDownload(Request $request){

        $credentials = $request->only('publication_name','publication_date');
        
        if($this->findDownload($credentials) == false){
            return $this->respondError($credentials);   
        }

        return $this->respondSuccess($credentials);

    }


    public function findDownload($credentials){
        return !!Download::where('publication_id',$credentials['publication_name'])->where('publication_date',$credentials['publication_date'])->first();
                        
    }

    public function respondError($credentials){
        $pub_name = Publication::findorfail($credentials['publication_name']);
        return response()->json(['error' => 'Publication Name '.$pub_name->publication_name.' with publication date '.$credentials['publication_date'].' was not found!'], 404);
    }

    public function getDetails($credentials){
        $publication_details = Download::where('publication_id',$credentials['publication_name'])->where('publication_date',$credentials['publication_date'])->first();
        return $publication_details->load('publication');
    }

    public function respondSuccess($credentials){

        return response()->json([
            'publication' => $this->getDetails($credentials)
        ]);
    }




}
