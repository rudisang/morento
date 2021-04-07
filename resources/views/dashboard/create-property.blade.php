@extends('layouts.main')

@section('content')
<nav class="grey lighten-2">
    <div class="container">
        <div class="nav-wrapper">
            <a href="/dashboard" class="breadcrumb teal-text">{{Auth::user()->role->role}} Dashboard</a> 
            <a href="/dashboard/property/create" class="breadcrumb teal-text">Create Listing</a>
          
        </div>
    </div>
</nav>
    <section class="container">
        <x-flash-messages />
    </section>

    <section class="container" style="margin-top:10px">
        <div class="card-panel">
       
            <h4>Add Listing</h4>
        
          <form action="/dashboard/property/create" method="POST" enctype="multipart/form-data">
           
            @csrf
            <div class="row">
                <div class="input-field col s12 m6">
                    <input name="title" id="title" value="{{old('title')}}" type="text" class="validate" required>
                    <label for="title">Title</label>
                    @if ($errors->has('title'))
                    <span class="help-block">
                        <strong style="color:red">{{ $errors->first('title') }}</strong>
                    </span>
                @endif
                  </div>

                  <div class="input-field col s12 m6">
                    <select name="location" style="display: block" required>
                         <option value="" selected='selected' disabled>Select Location</option>
                         <option value="Block 7">Block 7</option>
                         <option value="Block 8">Block 8</option>
                         <option value="Bontleng">Bontleng</option>
                         <option value="Braudhurst">Braudhurst</option>
                         <option value="G-West">G-West</option>
                         <option value="Mogoditshane">Mogoditshane</option>
                         <option value="Naledi">Naledi</option>
                         <option value="Taung">Taung</option>
                         <option value="Tlokweng">Tlokweng</option>
                         <option value="Village">Village</option>
                         
                   
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
                  <input name="lat" id="lat" value="{{old('lat')}}" type="text" class="validate" required>
                  <label for="lat">Location Lat</label>
                            @if ($errors->has('lat'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('lat') }}</strong>
                            </span>
                        @endif
                </div>

                
                    <div class="input-field col s12 m6">
                      <input name="lng" id="long" value="{{old('lng')}}" type="text" class="validate" required>
                      <label for="long">Location Lng</label>
                      @if ($errors->has('lng'))
                      <span class="help-block">
                          <strong style="color:red">{{ $errors->first('lng') }}</strong>
                      </span>
                  @endif
                    </div>

                    <div class="input-field col s12 m6">
                        <select name="type" style="display: block" required>
                             <option value="" selected='selected' disabled>Select Type</option>
                             <option value="Room">Room</option>
                             <option value="Bachelor Pad">Bachelor Pad</option>
                             <option value="House">House</option>
                             <option value="Appartment">Appartment</option>
                             <option value="Servants Quarters">Servants Quarters</option>
                       
                        </select>
                        @if ($errors->has('type'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('type') }}</strong>
                        </span>
                    @endif
                      </div>
    
                    <div class="input-field col s12 m6">
                        <input name="price" id="price" value="{{old('price')}}" step=".1" min=100 type="number" class="validate" required>
                        <label for="price">Price</label>
                        @if ($errors->has('price'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('price') }}</strong>
                        </span>
                    @endif
                      </div>

                      <div class="input-field col s12">
                        <p class="grey-text">Details</p>
                        <textarea name="details" id="editor" class="materialize-textarea" >{{old('details')}}</textarea>
                        
                        @if ($errors->has('details'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('details') }}</strong>
                        </span>
                    @endif
                      </div>

                      <div class="input-field file-field col s12">
                        <div id="preview">
    
                        </div>
                        <div class="btn">
                            <span><i class="material-icons">cloud_upload</i></span>
                            <input id="gallery" type="file" name="gallery[]" accept="image/*" class="custom-file-input" id="customFile" multiple required>
                          </div>
                          <div class="file-path-wrapper">
                            <input type="text" name="gallery" class="file-path validate" required>
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
                             <option value="" selected='selected' disabled>is it available now?</option>
                             <option value="1">Yes</option>
                             <option value="0">No</option>
                       
                        </select>
                        @if ($errors->has('available'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('available') }}</strong>
                        </span>
                    @endif
                      </div>
              </div>
         
            <button href="#" class="btn teal">Create Listing</button>
          </form>
        </div>
      </div>
    </section>


@endsection

@section('scripts')
<script>
    var gallery = document.getElementById('gallery');
    var content = ""
    gallery.addEventListener('change', (event) => {
        for(let i=0;i<event.target.files.length;i++){
            
            content = content + '<img class="mx-2 my-3" width=200 style="border-radius:30px" src="'+URL.createObjectURL(event.target.files[i])+'" alt=""/>';
            
            $( '#preview' ).html( content );
         }
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

<script>
    //var x = document.getElementById("demo");
    var lat = document.getElementById("lat");
 var long = document.getElementById("long");

function getLocation() {
if (navigator.geolocation) {
navigator.geolocation.getCurrentPosition(showPosition);
} else {
//x.innerHTML = "Geolocation is not supported by this browser.";
}
}
function showPosition(position) {
//x.innerHTML = "Latitude: " + position.coords.latitude +
//"<br>Longitude: " + position.coords.longitude;
 
lat.value = position.coords.latitude;
long.value = position.coords.longitude;

}
getLocation();
</script>
@endsection