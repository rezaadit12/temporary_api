<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = "http://127.0.0.1:8001/api/posts/";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $datas = $contentArray['data'];
        return view('home', ['data' => $datas]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $parameters = [
            'title' => $request->title,
            'news_content' => $request->news_content,
           
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8001/api/posts/";
        $response = $client->request('POST', $url, [
            'headers' => ['Accept' => 'application/json','Content-Type' => 'application/json'],
            'body' => json_encode($parameters)
        ]);

        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if( $contentArray['status'] == true){
            echo "berhasil";
        }
        // return view('home', ['data' => $datas]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(Request $request)
    {
        
        $parameters = [
            'email' => $request->email,
            'password' => $request->password,
           
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8001/api/login/";
        $response = $client->request('POST', $url, [
            'headers' => ['Accept' => 'application/json','Content-Type' => 'application/json'],
            'body' => json_encode($parameters)
        ]);

        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        // if( $contentArray['status'] == true){
        //     echo "berhasil";
        // }

    }
}
