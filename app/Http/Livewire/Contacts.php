<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use App\Models\ContactType;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

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
    public $contact_type_id;
    public $notes;
    public $contactrec;

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
        Contact::create($this->modelData());
        $this->showModal = false;
        $this->reset();
    }

    public function read()
    {
        if ($this->displayStatus == 0) {
             return Contact::orderBy($this->sortColumn, $this->sortDirection)
                ->with('contact_type')
                ->get();
        }
         else {
            return Contact::orderBy($this->sortColumn, $this->sortDirection)
                ->with('contact_type')
                ->where('contact_type_id', $this->displayStatus)
                ->get();   
        }
        
    }

    public function edit($contactId)
    {
        $this->showModal = true;
        $this->contactId = $contactId;
        $this->contactrec = Contact::find($contactId);
    }

    public function update()
    {
        $this->validate();
        Contact::find($this->contactId)->update($this->modelData());
        $this->showModal = false;
    }

    public function delete()
    {
        Contact::destroy($this->contactId);
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
        $this->contactId = $id;
        $this->showModal = true;
        $this->loadModel();
    }

    public function deleteShowModal($id)
    {
        $this->ContactId = $id;
        $this->showDeleteModal = true;
    }

    public function loadModel()
    {
        $data = Contact::find($this->contactId);
        $this->name = $data->name;
        $this->address = $data->address;
        $this->city = $data->city;
        $this->state = $data->state;
        $this->zipcode = $data->zipcode;
        $this->phone = $data->phone;
        $this->email = $data->email;
        $this->notes = $data->notes;
        $this->contact_type_id = $data->contact_type_id;
        $this->contact = $data->contact;
        //$this->created_by = Auth::user()->id;
        
    }

    public function modelData()
    {
        return [
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zipcode' => $this->zipcode,
            'phone' => $this->phone,
            'email' => $this->email,
            'notes' => $this->notes,
            'type_id' => $this->type_id,
            'contact' => $this->contact,
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
        return view('livewire.contacts', [
            'data' => $this->read(),
            'contacttypes' => ContactType::all(),
        ]);
    }
}
