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
        $data = SlovenskoRss::orderBy('pubDate', 'ASC')->paginate(3);
        return view('reader.index',compact('data'));
    }


    public function create()
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

        return redirect()->back();
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
        return view('reader.edit',['data' => SlovenskoRss::where('id',$id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'string',
            'description' => 'string'
        ]);

        SlovenskoRss::where('id',$id)->update($validate);
        return redirect()->back();
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
