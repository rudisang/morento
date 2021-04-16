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
      <x-flash-messages />
    </section>

    <section class="container">
        @if(Auth::user()->role_id == 1)
            <h3>Hi {{Auth::user()->name}}!!</h3>
            @if (Auth::user()->studentaccount)
            <div class="card-panel">
              
            </div>

            <div class="fixed-action-btn">
              <a href="/chat/room" class="btn-floating btn-large teal">
                <i class="large material-icons">message</i>
              </a>
              <ul>
              
              </ul>
            </div>
              @else
              <div class="row">
                <div class="col s12">
                  <div class="card-panel">
                   
                    <a class="waves-effect waves-light btn" href="/dashboard/account/create-student">Create Your Student Profile</a>
                  </div>
                </div>
              </div>
              
              
            @endif
          

        @elseif(Auth::user()->role_id == 2)
        
        <!-- Landlord Dashboard Views -->
           @if(Auth::user()->landlordaccount) 
              @if (Auth::user()->landlordaccount->status_id == 1)
                <div class="card-panel blue lighten-2">
                    <div class="white-text" role="alert">
                        🛈 Your Account is Under Review
                      </div>
                </div>
                @elseif(Auth::user()->landlordaccount->status_id == 2)
                        <!-- Approved -->
                <div class="fixed-action-btn">
                  <a href="/dashboard/property/create" class="btn-floating btn-large teal">
                    <i class="large material-icons">add</i>
                  </a>
                  <ul>
                  
                  </ul>
                </div>
                <div class="row">
                  <div class="col s12">
                    <div class="card-panel">
                      <h5>My Listings <a href="/chat/room" class="btn indigo accent-1 right">Chat</a></h5>
                      <x-my-properties />
                    </div>
                  </div>
                </div>
                @elseif(Auth::user()->landlordaccount->status_id == 3)
                        <!-- Rejected -->
                        <div class="card-panel red lighten-1" >
                          <div class="white-text" role="alert">
                              <h5>🛈 Your Account has been rejected</h5>
                            </div>

                      </div>
                      <ul class="collapsible" style="border:none">
                        <li>
                          <div class="collapsible-header"><i class="material-icons black-text">info</i><strong>Reason</strong></div>
                          <div class="collapsible-body"><p class="black-text">Please make not of the requested changes and resubmit for review.</p>
                            <p class="black-text">{{Auth::user()->landlordaccount->message}}</p></div>
                        </li>
                      </ul>
                      <x-admin-edit-user-account />

                @elseif(Auth::user()->landlordaccount->status_id == 4)
                        <!-- Suspended -->
                        <div class="card-panel yellow">
                          <div class="black-text" role="alert">
                              🛈 Your Account has been suspended
                            </div>
                      </div>
                @endif
           
           @else 
           <div class="card-panel blue lighten-2">
            <div class="white-text" role="alert">
                🛈 Almost There! Setup Your Landlord account inorder to get started. 
              </div>
            </div>
            <a href="/dashboard/account/create-landlord" class="btn teal pulse">Setup Account</a>
           @endif
             

           
            @elseif(Auth::user()->role_id == 3)
            <x-admin-user-table />

            <x-admin-landlord-table />
        @endif
    </section>
    
@endsection