<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Validator;
use App\people;

class Adduser extends Component
{
	use WithFileUploads;

    public $photo,$name;

    public function save()
    {
    	dd($this->photo);
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
            'name' => 'required'
        ]);

        $photo = md5($this->photo . microtime()).'.'.$this->photo->extension();
        $this->photo->storeAs('photos', $photo);

        $people = new people();
        $people->photo = $photo;
        $people->name = $this->name;
		$people->save();
		$this->reset();
    }

    public function render()
    {
    	$data = people::all();
        return view('livewire.adduser', compact('data'));
    }
}
