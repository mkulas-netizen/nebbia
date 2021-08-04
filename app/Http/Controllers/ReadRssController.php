<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\SlovenskoRss;

class ReadRssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = 'https://www.slovensko.sk/sk/rss/oznamy';
        $feeds = simplexml_load_file($url);
        foreach ($feeds->channel->item as $feed) {
            if (!SlovenskoRSS::where('link',$feed->link)->exists()) {
                SlovenskoRss::create([
                    'link' => $feed->link,
                    'title' => $feed->title,
                    'description' => $feed->description,
                    'pubDate' => Carbon::parse($feed->pubDate)
                ]);
            }
        }

        $data = SlovenskoRss::orderBy('pubDate', 'ASC')->paginate(3);
        return view('reader.index',compact('data'));
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function readStatus(Request $request){
        if ($request->ajax()){
            SlovenskoRss::where('id',$request->id)->update( ['read' => $request->read]);
        }
    }

    public function categoryStatus(Request $request){
        if ($request->ajax()){
            SlovenskoRss::where('id',$request->id)->update( ['category' => $request->category]);
        }
    }
}
