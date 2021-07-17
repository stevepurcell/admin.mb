<?php

use App\Models\Song;
use App\Models\User;
use App\Models\Status;
use App\Models\SongSonglist;

function getUsername($userId) {
 return User::where('id', $userId)->first()->name;
}

function getStatus($statusId) {
    return Status::where('id', $statusId)->first();
}

function getAccessBadge($access) {
    if($access == 0) {
        return ([
            'accesstype' => 'Private',
            'badge_type' => 'danger',]);
    } elseif($access == 1) {
        return ([
            'accesstype' => 'Public',
            'badge_type' => 'success',]);
    }
}

function getStatusCount($statusId) {
    if($statusId > 0) {
        return Song::where('status_id', $statusId)->count();
    } else {
        return Song::all()->count();
    }
    
}

function getSongCount($songlistId) {
    return SongSonglist::where('songlist_id', $songlistId)->count();
}


