<?php

use App\Models\Song;
use App\Models\User;
use App\Models\Status;
use App\Models\Contact;
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

function getContactTypeCount($contactTypeId) {
    if($contactTypeId > 0) {
        return Contact::where('contact_type_id', $contactTypeId)->count();
    } else {
        return Contact::all()->count();
    }
}

function getContactType($contact_type_id) {
    if($contact_type_id == 1) {
        return ([
            'contacttype' => 'Venue',
            'badge_type' => 'info',]);
    } elseif($contact_type_id == 2) {
        return ([
            'contacttype' => 'Booker',
            'badge_type' => 'success',]);
    } elseif($contact_type_id == 3) {
        return ([
            'contacttype' => 'Band/Musician',
            'badge_type' => 'primary',]);
    } elseif($contact_type_id == 4) {
        return ([
            'contacttype' => 'Others',
            'badge_type' => 'warning',]);
    }
}
