@extends('layouts.master')
@section('content')
<div class ="container px-4">
    <div class ="row flex-column">
        <div class ="title-section">
            <h3 class = "title"> Ajoutez un jeu</h3>
        </div>

        <div class = "row justify-content-between">
            
            <div class = "col">
                @if($errors->any())
                
                    <div class="card bg-danger text-white shadow">
                        <div class="card-body">
                            @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                            @endforeach
                        </div>
                    </div>
                
            @endif
                <form method="POST" action={{route('post_game')}}>
                    <!-- Name input -->
                    {{csrf_field()}}
                    <div class="form-outline mb-4">

                        <label class="form-label" for="form4Example1">Name</label>
                      <input name="name" type="text" id="name" class="form-control" />
                      
                    </div>
                  
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example2">Price</label>
                      <input name="price" type="text" id="price" class="form-control" />
                      
                    </div>
                  
                    <!-- Message input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example3">Description</label>
                      <textarea name = "description" class="form-control" id="description" rows="4"></textarea>
                      
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="form4Example2">Categorie</label>
                      <input name="categorie" type="text" id="categorie" class="form-control" />
                      
                    </div>
                  
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Send</button>
                  </form>
            </div>
        </div>
    </div>
</div>

    
@endsection