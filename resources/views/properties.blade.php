@extends('layouts.main')

@section('content')


<section class="container">
  <div class="card-panel" style="border-radius:20px;">
    <h5>Filter Listings</h5>
    <form action="/properties" method="get">
     <div class="row">
       <div class="col s12 m6">
        <input name="location" type="search" placeholder="Property Location">
       </div>

       <div class="input-field col s12 m6">
        <select name="type" style="display: block">
             <option value="" selected='selected' disabled>Property Type</option>
             <option value="Room">Room</option>
             <option value="Bachelor Pad">Bachelor Pad</option>
             <option value="House">House</option>
             <option value="Appartment">Appartment</option>
             <option value="Servants Quarters">Servants Quarters</option>
       
        </select>
       </div>

       <div class="col s12 m6">
        <p class="range-field">
        <input name="range" type="range"  max="{{$properties->max('price')}}" min="{{$properties->min('price')}}">
        </p>
       </div>
     </div>
    
     <button type="submit" class="btn">Search</button>
    </form>
  </div>
</section>

<section class="container">
    
    <ul id="slide-outb" class="sidenav" style="width: 80vw !important">
       
        
        <li><div id="map"></div></li>
      </ul> 
   
    <div class="row">
 
    @foreach ($properties as $prop)
    @php
    $temp = json_decode($prop->gallery);
  @endphp
    <div class="col s12 m6 l4">
        <div class="card" style="border-radius:20px 20px 0px 0px">
          <div class="card-image" style="border-radius: 20px">
            <img class="dim materialboxed" style="border-radius: 20px;max-height:200px !important;object-fit:cover" src="{{asset('gallery/'.$temp[0])}}">
            <span class="card-title">@if ($prop->available)
                <p class="btn green accent-3 z-depth-0" style="opacity:.6;position:relative;margin-top:-90px;font-weight: bold">Available</p>
                @else
                <p class="btn red accent-2 z-depth-0" style="opacity:.6;position:relative;margin-top:-90px;font-weight: bold">Unavailable</p>
            @endif</span>
            <span class="card-title">{{$prop->title}}</span>
          </div>
          <div class="card-content">
            <p class="" style="font-weight: bold">BWP {{$prop->price}}/mo</p>
            <p><span style="top:100px"><i style="" class="material-icons teal-text">location_on</i>{{$prop->location}} </span></p>
            
              
          </div>
          <div class="card-action">
            <a class="grey-text">{{$prop->created_at->diffForHumans()}}</a>
            <a href="/properties/{{$prop->id}}">view</a>
          </div>
        </div>
      </div>
    @endforeach
    </div>
</section>

<div class="fixed-action-btn">
  <a href="#" data-target="slide-outb" class="sidenav-trigger btn btn-floating btn-large"><i class="material-icons left">map</i>Map view</a>
  
  
  <ul>
  
  </ul>
</div>

@endsection

@section('scripts')
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVyIUJq_UDfoxblvvpK73epq1O4e3aCXE&callback=initMap&libraries=geometry&v=weekly"
      async
    ></script>
<script>
      
    let map;

function initMap() {

const uluru = { lat: -24.397, lng: 25.644  };
map = new google.maps.Map(document.getElementById("map"), {
center: { lat: -24.397, lng: 25.644 },
zoom: 8,
});



async function getUser() {
try {
const response = await axios.get('http://127.0.0.1:8000/api/properties');



let data = response.data

for(let i=0;i<data.length;i++){
    let contentString =
'<a style="text-decoration:none;color:black" href="/properties/'+data[i].id+'"><div id="content">' +
'<div id="siteNotice">' +
"</div>" +
'<p class="firstHeading">'+data[i].location+'</p>' +
'<h5 id="firstHeading" class="firstHeading">'+data[i].title+'</h5>' +
'<div id="bodyContent">' +
    '<p style="font-weight:bold" class="firstHeading">BWP '+data[i].price+'/mo</p>' +
"</div>" +
"</div></a>";

let infowindow = new google.maps.InfoWindow({
content: contentString,
});
 
    const marker = new google.maps.Marker({
position: { lat: Number(data[i].lat), lng: Number(data[i].lng) },
map,
title: data[i].title,

});

marker.addListener("click", () => {
infowindow.open(map, marker);
});

}



} catch (error) {
console.error(error);
}
}

getUser()

}
</script>
@endsection