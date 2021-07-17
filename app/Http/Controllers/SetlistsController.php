<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Songlist;
use App\Models\SongSonglist;
use App\Models\Song;

class SetlistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create($id)
    {
        $songs = Song::orderBy('name', 'asc')->get();
        return view('setlists.create', ['id' => $id, 'songs' => $songs]);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $position = 0;

        // Validate form date
        $this->validate($request, [
            'name' => 'required | max:255',
        ]);


        // Process data and submit
        $setlist = new Songlist();
        $setlist->name = $request->name;
        $setlist->creator = auth()->user()->id;
        $setlist->private = $request->private;
        $setlist->song_list_group_id = $request->groupId;
        $result1 = $setlist->save();
        
        $songs = $request->input('songlist');

        foreach($songs as $song){
            $setlistitem = new SongSonglist();
            $setlistitem->songlist_id = $setlist->id;
            $setlistitem->setlist_group_id = $setlist->song_list_group_id;
            $setlistitem->song_id = $song;
            $setlistitem->position = $position += 1;
            $result2 = $setlistitem->save();
        }

        // If successful, redirect to show method
        if($result1 && $result2) {
            return redirect()->route('setlistgroups.index')->with('success' , 'Setlist Group created successfully');;
        } else {
            return redirect()->route('setlistgroups.create')->with('error' , 'Error creating Setlist Group');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $songs = SongSonglist::where('songlist_id', $id)
        //     ->orderBy('position', 'asc')
        //     ->get();
        //dd($songs);

        return view('setlists.show', ['listid' => $id]);       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
