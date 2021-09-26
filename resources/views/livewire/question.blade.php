<div>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#rocking">Insert Questions</button>
        
      
        </div>
        <div class="card-body">
                <div class="list-group">
                    @foreach ($questions as $q)
                        <a href="{{route('single',['id'=>$q->id])}}" class="list-group-item list-group-item-action">{{$q->id}}. {{$q->title}} <span class="float-end">{{$q->user_id;}}</span></a>
                    @endforeach
                </div>  
        </div>
    </div>

    <div class="modal fade" wire:ignore.self id="rocking">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">Insert Questions</div>
                <div class="modal-body">
                    <form action="" method="POST" wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" wire:model="title" class="form-control">
                            @error('title')
                                <p class="text-danger small">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>

                        @if (session()->has('msg'))
                            <div class="alert alert-danger">
                                {!! session('msg') !!}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    
</div>

