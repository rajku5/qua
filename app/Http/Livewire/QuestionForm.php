<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Question;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class QuestionForm extends Component
{
    public $questions;
    public $title;
   
   

    public $rules = [
        'title' => 'required'
    ];
    public function save(){
        if(Auth::check()){
            $data = ['user_id'=>Auth::id()];
            $data = $this->validate();
            Question::create($data);
            $this->title = "";
            $this->mount();
        }
        else{
            

            session()->flash("msg",'login first <a href="'. url('/login') . '"> click here  </a>');
            
            //session()->flash("msg","login first <a herf="$link">click hear</a>");
            //, 
        }
    }

    public function updated($req){$this->validateOnly($req);}

    public function mount(){
        $this->questions = Question::all();
    }
    public function render()
    {
        return view('livewire.question');
    }
}
