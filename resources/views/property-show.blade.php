@extends('layouts.main')
@section('content')
@php $images = json_decode($property->gallery); @endphp
<div class="slider">
    <ul class="slides">
        @foreach ($images as $image)
        <li>
            <img style="object-fit: cover" class="dim materialboxed" src="{{asset('gallery/'.$image)}}">
            <!-- random image -->
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

    </div>
</div>
<div class="container">
    <div class="card-panel">
        <h5>Owner Details @guest
            
            @else
            @if (Auth::user()->id == $property->user_id)
            <div class="fixed-action-btn">
                <a href="/dashboard/property/edit/{{$property->id}}" class="btn-floating btn-large orange pulse">
                  <i class="large material-icons">edit</i>
                </a>
                <ul>
                
                </ul>
              </div>
            @else
            <a href="/chat/room/{{$property->user->id}}" class="btn indigo pulse right">Chat</a>
            @endif
        @endguest</h5>
        <img class="responsive-img circle" width="30" src="{{asset('avatars/'.$property->user->landlordaccount->avatar)}}" alt="">
       <span style="margin-top:5px;position:absolute "><strong style="font-weight: bold">{{$property->user->name}} {{$property->user->surname}}</strong></span> 
       <p style="font-weight: bold">Contacts: <br><a class="waves-effect waves-light btn z-depth-0"><i class="material-icons left">local_phone</i>(267){{$property->user->mobile}}</a> or <a class="waves-effect waves-light btn z-depth-0" style="text-transform: lowercase"><i class="material-icons left">email</i>{{$property->user->email}}</a>
       </p>
    </div>
</div>

    <div class="container">
  
        <h5>Gallery</h5>

            <div class="grid">
                <div class="grid-sizer"></div>
                <div class="gutter-sizer"></div>

                @foreach ($images as $image)

                <div class="grid-item hoverable">
                    <img class="materialboxed" src="{{asset('gallery/'.$image)}}" />
                </div>
                @endforeach
            </div>
       
   
    </div>

 
@endsection