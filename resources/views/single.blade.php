@extends('base')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-5 mx-auto">
           @livewire('answer-view',["id"=>Route::current()->parameter("id")])
        </div>
    </div>
@endsection