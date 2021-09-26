<?php

namespace App\Http\Livewire;
use App\Models\Question;
use App\Models\Answer;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AnswerView extends Component
{
    public $question,$id,$answers,$content,$vote;

    public function __construct($id){
        $this->id = $id;
    }
    public $rules = [
        'content' => 'required'
    ];
    public function send(){
        $data = $this->validate();
        $a = new Answer();
        $a->question_id = $this->id;
        $a->content = $this->content;
        $a->user_id = Auth::id();
        $a->save();
        $this->content = "";
        $this->mount();
    }

    public function voteUp($id){
        $a = Answer::find($id);
        $currentVote = $a->vote;
        $a->vote = $currentVote + 1;
        $a->save();
        $this->mount();
    }
    public function voteDown($id){
        $a = Answer::find($id);
        $currentVote = $a->vote;
        if($currentVote > 0){
            $a->vote = $currentVote - 1;
        }
        $a->save();
        $this->mount();
    }
    public function mount(){
        $this->question = Question::find($this->id);
        $this->answers = Answer::where("question_id",$this->id)->orderby("vote","DESC")->get();
    }
    public function render(){
        return view('livewire.answer-view');
    }
}
