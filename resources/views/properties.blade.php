@extends('layouts.main')

@section('content')
<nav class="grey lighten-3">
  <div class="container">
      <div class="nav-wrapper">
          <form action="/properties" method="get"><input name="search" type="search" placeholder="search"></form>
      </div>
  </div>
</nav>

<section class="container">
    <div class="row">
    @foreach ($properties as $prop)
    @php
    $temp = json_decode($prop->gallery);
  @endphp
    <div class="col s12 m4">
        <div class="card" style="border-radius:20px 20px 0px 0px">
          <div class="card-image" style="border-radius: 20px">
            <img class="dim materialboxed" style="border-radius: 20px" src="{{asset('gallery/'.$temp[0])}}">
            <span class="card-title">@if ($prop->available)
                <p class="btn green accent-3 z-depth-0" style="opacity:.8;position:relative;margin-top:-290px;font-weight: bold">Available</p>
                @else
                <p class="btn red accent-2 z-depth-0" style="opacity:.8;position:relative;margin-top:-290px;font-weight: bold">Unavailable</p>
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

@endsection