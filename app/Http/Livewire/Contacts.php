<?php

namespace App\Http\Livewire;

use App\Models\Song;
use App\Models\Status;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Contacts extends Component
{
    //use WithPagination;
    public $sortColumn = 'name';
    public $sortDirection = 'asc';
    public $showModal = false;
    public $showDeleteModal = false;
    public $displayStatus = 0;
    public $contactId;
    public $name;
    public $address;
    public $city;
    public $state;
    public $zipcode;
    public $phone;
    public $email;
    public $contact;
    public $type_id;
    public $notes;
    public $contact;

    public function rules()
    {
        return [
            'name' => 'required',
            'address' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'zipcode' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable',
            'contact' => 'nullable',
            'type_id' => 'nullable',
            'notes' => 'nullable',
        ];
    }

    public function mount()
    {
        // Resets the pagination after reloading the page
        //$this->resetPage();
    }

    public function create()
    {
        $this->validate();
        Song::create($this->modelData());
        $this->showModal = false;
        $this->reset();
    }

    public function read()
    {
        if ($this->displayStatus == 0) {
            return Song::orderBy($this->sortColumn, $this->sortDirection)->with('user')->with('status')->get();
        }
        else {
            return Song::orderBy($this->sortColumn, $this->sortDirection)
                    ->with('user')
                    ->with('status')
                    ->where('status_id', $this->displayStatus)
                    ->get();   
        }
        
    }

    public function edit($songId)
    {
        $this->showModal = true;
        $this->songId = $songId;
        $this->song = Song::find($songId);
    }

    public function update()
    {
        $this->validate();
        Song::find($this->songId)->update($this->modelData());
        $this->showModal = false;
    }

    public function delete()
    {
        Song::destroy($this->songId);
        $this->showDeleteModal = false;
        //$this->resetPage();
    }

    public function createShowModal()
    {
        $this->resetValidation();
        $this->reset();
        $this->showModal = true;
    }

    public function updateShowModal($id)
    {
        $this->resetValidation();
        $this->reset();
        $this->songId = $id;
        $this->showModal = true;
        $this->loadModel();
    }

    public function deleteShowModal($id)
    {
        $this->songId = $id;
        $this->showDeleteModal = true;
    }

    public function loadModel()
    {
        $data = Song::find($this->songId);
        $this->name = $data->name;
        $this->artist = $data->artist;
        $this->time = $data->time;
        $this->singer = $data->singer;
        $this->solo = $data->solo;
        $this->keyboard = $data->keyboard;
        $this->acoustic = $data->acoustic;
        $this->notes = $data->notes;
        $this->status_id = $data->status_id;
        $this->created_by = $data->created_by;
        //$this->created_by = Auth::user()->id;
        
    }

    public function modelData()
    {
        return [
            'name' => $this->name,
            'artist' => $this->artist,
            'time' => $this->time,
            'singer' => $this->singer,
            'solo' => $this->solo,
            'keyboard' => $this->keyboard,
            'acoustic' => $this->acoustic,
            'notes' => $this->notes,
            'status_id' => $this->status_id,
            'created_by' => Auth::user()->id,
        ];
    }

    public function showStatus($status)
    {
        return $this->displayStatus = $status;
    }

    public function sortByColumn($column)
    {
        if ($this->sortColumn == $column) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->reset('sortDirection');
            $this->sortColumn = $column;
        }
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.songs', [
            'data' => $this->read(),
            'bands' => Member::all(),
            'statuses' => Status::all(),
        ]);
    }
}
