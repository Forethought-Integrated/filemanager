@extends('layouts.app')

@section('content')

<div class="container">
    

        @if(session()->has('error'))
        <div class="alert alert-danger">{{session()->get('error')}}</div>
        @endif

        <form action="{{route('avatar.store')}}" method="post" enctype="multipart/form-data">
        @csrf    
          
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" name="avatar" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>

            <input type="submit" name="Upload" class="btn btn-success ml-4">
          </div>
        </form>

  <div class="card-columns">
    @foreach($avatars as $avatar)
      <div class="card">
        
        <img class="card-img-top" src="{{$avatar->getUrl('card')}}" alt="Card image cap">
        
        <div class="card-body">
         
          <div class="float-left">
            <a href="#" onclick="event.preventDefault();document.getElementById('selectForm{{$avatar->id}}').submit()"><i class="text-success fa fa-check fa-2x" aria-hidden  ="true" ></i></a>
            
              <form action="{{route('avatar.update',auth()->id())}}" 
              style="display:none" id="selectForm{{$avatar->id}}" method="post">
              
              @csrf @method('put')
              <input type="hidden" type="submit" name="selectedAvatar" value="{{$avatar->id}}">
              </form>

            <a href="#"><i class="text-danger fa fa-trash fa-2x" aria-hidden="true"></i></a>
          </div> 

          <div class="float-right">
            <a href="#"><i class="text-info fa fa-eye fa-2x" aria-hidden="true"></i></a>
            <a href="#"><i class="text-warning fa fa-download fa-2x" aria-hidden="true"></i></a>
          </div> 
        </div>
      </div>
    @endforeach
  </div>
</div>

@endsection
