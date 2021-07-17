<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\SongSonglist;
use App\Models\Song;

class SortSetlists extends Component
{
    public $listid;

    public function render()
    {
        return view('livewire.sort-setlists', [
            'songs' => $this->read(),
        ]);
    }

    public function read()
    {
        return SongSonglist::where('songlist_id', $this->listid)->orderBy('position', 'asc')->get();
        //return Song::orderBy('name', 'asc')->get();
    }

    public function updateOrder($list)
    {
        foreach($list as $item) {
            //dump($item);
            SongSonglist::find($item['value'])->update(['position' => $item['position']]);
        }
    }

    public function song_up($songsonglist_id)
    {
        dd($songsonglist);
        $songsonglist = SongSonglist::find($songsonglist_id);
        if ($songsonglist) {
            SongSonglist::where('position', $songsonglist->position - 1)
                ->update(['position' => $songsonglist->position]);
            $songsonglist->update(['position' => $songsonglist->position - 1]);
        }
    }

    public function song_down($songsonglist_id)
    {
        dd($songsonglist);
        $song = song::find($songsonglist_id);
        if ($songsonglist) {
            SongSonglist::where('position', $songsonglist->position + 1)
                ->update(['position' => $songsonglist->position]);
            $songsonglist->update(['position' => $songsonglist->position + 1]);
        }
    }

    public function lw_test()
    {
        dd("LW Test");
    }
}
