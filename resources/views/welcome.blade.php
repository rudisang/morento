@extends('layouts.main')
@section('content')
<div class="slider">
    <ul class="slides">

      <li>
        <img class="dim" src="{{asset('images/slider3.jpg')}}"> <!-- random image -->
        <div class="caption center-align">
          <h3>The Best & Most!</h3>
          <h5 class="light grey-text text-lighten-3">Affordable Student Housing.</h5>
        </div>
      </li>

      <li>
        <img class="dim" src="{{asset('images/slider1.jpg')}}"> <!-- random image -->
        <div class="caption left-align">
          <h3>Student Rooms</h3>
          <h5 class="light grey-text text-lighten-3">Single Rooms or To Share.</h5>
        </div>
      </li>


      

    </ul>
  </div>

  <div class="container">
    <h3>Latest Listings</h3>
    @php
      $props = $properties->sortByDesc('created_at');
    @endphp
    <div class="grid">
      <div class="grid-sizer"></div>
      <div class="gutter-sizer"></div>
  
      @foreach ($props as $prop)
      @php
        $temp = json_decode($prop->gallery);
      @endphp
      <div class="grid-item hoverable">
        <img class="materialboxed" src="{{asset('gallery/'.$temp[0])}}" />
          <div style="width:90%;margin:auto">
              <p><a href="/properties/{{$prop->id}}" class="teal-text" style="font-weight:bold">{{$prop->title}} </a> | <span style="font-weight: bold;top:100px"><i style="font-size:10px" class="material-icons teal-text">location_on</i>{{$prop->location}} </span></p>
          </div>
      </div>
      @endforeach
   

    </div>
      
  </div>
@endsection