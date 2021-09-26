<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <div class="card">
        <div class="card-header">{{$question->title}}</div>
        <div class="card-body">
            <div class="list-group">
                @if(count($answers)  < 1)
                    <div class="card">
                        <div class="card-body">
                            <p class="lead">Sorry no Answers are avilable for this question. if you know the answer the submit below</p>
                        </div>
                    </div>
                @endif
                @foreach ($answers as $ans)
                    <span class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{$ans->content}}</h5>
                        <small>{{$ans->created_at}}</small>
                        </div>
                        <p class="mb-1">User: {{$ans->user->name}}</p>
                        <small>Vote: {{$ans->vote}}</small>
                        <button class="btn btn-white p-0" wire:click="voteUp({{$ans->id}})"><i class=" text-success bi bi-hand-thumbs-up-fill"></i></button>
                        <button class="btn btn-white p-0" wire:click="voteDown({{$ans->id}})"><i class="text-danger bi bi-hand-thumbs-down-fill"></i></button>
                    </span>
                  @endforeach

        
            </div>
        </div>

        <div class="card-footer">
            @auth
                
            
            <form action="" wire:submit.prevent="send" method="POST">
                <textarea name="content" wire:model="content" cols="30" rows="5" class="form-control mb-1" placeholder="write answer here"></textarea>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
            @endauth

            @guest
                <p class="text-primary">for submit answer you</p>
                <a href="{{route('login')}}" class="nav-link m-0">click hear</a>
            @endguest

        </div>
    </div>
</div>
