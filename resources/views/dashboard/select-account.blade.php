@extends('layouts.main')

@section('content')
    <nav class="white">
        <div class="container">
            <div class="nav-wrapper">
                <a href="#!" class="breadcrumb teal-text">Dashboard</a>
            </div>
        </div>
    </nav>

    <section class="container">
        <div class="row">
            <div class="col s12 m6">
              <div class="card-panel center">
                <img style="display:block;margin:auto;margin-bottom:15px" src="{{asset('images/student.png')}}" width=160 alt="" class="circle responsive-img">
                <h4>Student Account</h4>
                <p class="black-text">I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
                </p>
                <form action="/dashboard/assign-role" method="POST">
                  @csrf
                  <input type="hidden" name="role" value="{{$roles[0]->id}}">
                  <button href="#" class="btn teal">Create Account</button>
                </form>
              </div>
            </div>

            <div class="col s12 m6">
                <div class="card-panel center">
                    <img style="display:block;margin:auto;margin-bottom:15px" src="{{asset('images/landlord.png')}}" width=160 alt="" class="circle responsive-img">
                    <h4>Landlord Account</h4>
                  <p class="black-text">I am a very simple card. I am good at containing small bits of information.
                  I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
                  </p>
                  <form action="/dashboard/assign-role" method="POST">
                    @csrf
                    <input type="hidden" name="role" value="{{$roles[1]->id}}">
                    <button href="#" class="btn teal">Create Account</button>
                  </form>
                </div>
              </div>
        </div>
    </section>
    
@endsection