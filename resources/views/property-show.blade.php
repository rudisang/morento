@extends('layouts.main')
@section('content')
@php $images = json_decode($property->gallery); @endphp
<div class="slider">
    <ul class="slides">
@foreach ($images as $image)
<li>
    <img class="dim materialboxed" src="{{asset('gallery/'.$image)}}"> <!-- random image -->
    <div class="caption center-align">
      <h3>{{$property->title}}</h3>
      <h5 class="light grey-text text-lighten-3">BWP {{$property->price}}/mo</h5>
    </div>
  </li>
@endforeach
    </ul>
  </div>

  <div class="container">
    <div class="card-panel">
        @if ($property->available)
        <p class="btn green accent-3 z-depth-0" style="opacity:.6;font-weight: bold">Available</p>
        @else
        <p class="btn red accent-2 z-depth-0" style="opacity:.6;font-weight: bold">Unavailable</p>
    @endif
        <h5><i class="material-icons left">location_on</i>{{$property->location}}</h5>
       <hr>
            <h5>Details</h5>
            <p>{{$property->type}}</p>
        {!!$property->details!!}

        <hr>
        <h5>Owner Details</h5>
        <img class="responsive-img circle" width="60" src="{{asset('avatars/'.$property->user->landlordaccount->avatar)}}" alt="">
       <p><strong>{{$property->user->name}} {{$property->user->surname}}</strong></p> 
       <p>Contacts: <a class="waves-effect waves-light btn"><i class="material-icons left">local_phone</i>(267){{$property->user->mobile}}</a> or <a class="waves-effect waves-light btn"><i class="material-icons left">email</i>{{$property->user->email}}</a>
       </p>
    </div>
    </div>
      
  </div>
@endsection