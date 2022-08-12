<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use App\Http\Requests\UrlManagerRequest;
use App\Repository\UrlManagerInterface;



class UrlController extends Controller
{
    public $urlManager;
    
    public function __construct(UrlManagerInterface $urlManager)
    {
        $this->urlManager = $urlManager;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $urls = $this->urlManager->getAllUrls();

        return view('welcome',compact('urls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UrlManagerRequest $request)
    {
        try {
            //code...
            $urlManager = $this->urlManager->generateShortUrl($request->url);

            if ($urlManager) {
                # code...
                $data = ['status' => true,'status_code'=>200,'message' => 'Succesfully shorten the given url'];
                return response()->json(['results'=> $data]);
            } else {
                # code...
                $data = ['status' => false,'status_code'=>200,'message' => 'Something went wrong'];
                return response()->json(['results'=> $data]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            $data = ['status' => false,'status_code'=>200,'message' => $th->getMessage()];
            return response()->json(['results'=> $data]);
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function show(Url $url)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function edit(Url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Url  $url
     * @return \Illuminate\Http\Response
     */
    public function destroy(Url $url)
    {
        //
    }
}
