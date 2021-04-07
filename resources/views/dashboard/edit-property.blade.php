@extends('layouts.main')

@section('content')
@php $images = json_decode($property->gallery); @endphp
<nav class="grey lighten-2">
    <div class="container">
        <div class="nav-wrapper">
            <a href="/dashboard" class="breadcrumb teal-text">{{Auth::user()->role->role}} Dashboard</a> 
            <a href="/dashboard/property/edit/{{$property->id}}" class="breadcrumb teal-text">Edit Listing</a>
          
        </div>
    </div>
</nav>
    <section class="container">
        <x-flash-messages />
    </section>

    <section class="container" style="margin-top:10px">
        <div class="card-panel">
       
            <h4>Add Listing</h4>
        
          <form action="/dashboard/property/edit/{{$property->id}}" method="POST" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            <div class="row">
                <div class="input-field col s12 m6">
                    <input name="title" id="title" value="{{$property->title}}" type="text" class="validate" required>
                    <label for="title">Title</label>
                    @if ($errors->has('title'))
                    <span class="help-block">
                        <strong style="color:red">{{ $errors->first('title') }}</strong>
                    </span>
                @endif
                  </div>

                  <div class="input-field col s12 m6">
                    <select name="location" style="display: block" required>
                        @php
                            $arr = ["Block 7","Block 8","Bontleng","Braudhurst","G-West","Mogoditshane","Naledi","Taung","Tlokweng","Village"];
                        @endphp
                         <option value="" disabled>Select Location</option>
                         @foreach ($arr as $item)
                         <option value="{{$item}}" @if ($item === $property->location) selected @endif>{{$item}}</option>
                         @endforeach
                         
                   
                    </select>
                    @if ($errors->has('location'))
                    <span class="help-block">
                        <strong style="color:red">{{ $errors->first('location') }}</strong>
                    </span>
                @endif
                  </div>

              </div>
    
              <div class="row">
                <div class="input-field col s12 m6">
                  <input name="lat" id="lat" value="{{$property->lat}}" type="text" class="validate" required>
                  <label for="lat">Location Lat</label>
                            @if ($errors->has('lat'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('lat') }}</strong>
                            </span>
                        @endif
                </div>

                
                    <div class="input-field col s12 m6">
                      <input name="lng" id="long" value="{{$property->lng}}" type="text" class="validate" required>
                      <label for="long">Location Lng</label>
                      @if ($errors->has('lng'))
                      <span class="help-block">
                          <strong style="color:red">{{ $errors->first('lng') }}</strong>
                      </span>
                  @endif
                    </div>

                    <div class="input-field col s12 m6">
                        <select name="type" style="display: block" required>
                            @php
                            $arr = ["Room","Bachelorpad","House","Appartment","Servants Quarters"];
                        @endphp
                         <option value="" disabled>Select Type</option>
                         @foreach ($arr as $item)
                         <option value="{{$item}}" @if ($item === $property->type) selected @endif>{{$item}}</option>
                         @endforeach
                            
                       
                        </select>
                        @if ($errors->has('type'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('type') }}</strong>
                        </span>
                    @endif
                      </div>
    
                    <div class="input-field col s12 m6">
                        <input name="price" id="price" value="{{$property->price}}" step=".1" min=100 type="number" class="validate" required>
                        <label for="price">Price</label>
                        @if ($errors->has('price'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('price') }}</strong>
                        </span>
                    @endif
                      </div>

                      <div class="input-field col s12">
                        <p class="grey-text">Details</p>
                        <textarea name="details" id="editor" class="materialize-textarea" >{{$property->details}}</textarea>
                        
                        @if ($errors->has('details'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('details') }}</strong>
                        </span>
                    @endif
                      </div>

                      <div class="input-field file-field col s12">
                          <div id="preview"></div>
                        <div id="thumb">
                            @foreach ($images as $image)
            
                           
                             
                                    <img class="mx-2 my-3" width=200 style="border-radius:30px" src="{{asset('gallery/'.$image)}}"  alt="...">
                                  
                           
                            
                            @endforeach
                        </div>
                        <div class="btn">
                            <span><i class="material-icons">cloud_upload</i></span>
                            <input id="gallery" type="file" name="gallery[]" accept="image/*" class="custom-file-input" id="customFile" multiple >
                          </div>
                          <div class="file-path-wrapper">
                            <input type="text" name="gallery" class="file-path validate" >
                            <label for="">Gallery</label>
                          </div>
                      @if ($errors->has('gallery'))
                      <span class="help-block">
                          <strong style="color:red">{{ $errors->first('gallery') }}</strong>
                      </span>
                  @endif
                    </div>
    
                    <div class="input-field col s12 m6">
                        <select name="available" style="display: block" required>
                             <option value="" disabled>is it available now?</option>
                             <option value="1" @if (1 === $property->available) selected @endif>Yes</option>
                             <option value="0" @if (0 === $property->available) selected @endif>No</option>
                       
                        </select>
                        @if ($errors->has('available'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('available') }}</strong>
                        </span>
                    @endif
                      </div>
              </div>
         
            <button href="#" class="btn teal">update Listing</button>
          </form>
        </div>
      </div>
    </section>


@endsection

@section('scripts')
<script>
    var gallery = document.getElementById('gallery');
    var thumb = document.getElementById('thumb');
    var content = ""
    gallery.addEventListener('change', (event) => {
        for(let i=0;i<event.target.files.length;i++){
            
            content = content + '<img class="mx-2 my-3" width=200 style="border-radius:30px" src="'+URL.createObjectURL(event.target.files[i])+'" alt=""/>';
            
            $( '#preview' ).html( content );
         }
         thumb.style.display = 'none';
    });
    

    $( '#preview' ).html( content );

</script>

<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>

@endsection