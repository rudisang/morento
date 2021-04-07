@extends('layouts.main')

@section('content')
<nav class="black">
    <div class="container">
        <div class="nav-wrapper">
            <a href="/dashboard" class="breadcrumb teal-text">{{Auth::user()->role->role}} Dashboard</a> 
            <a href="/dashboard" class="breadcrumb teal-text">Manage Account</a>
            <a class="breadcrumb grey-text">{{$landlord->user->name}} {{$landlord->user->surname}}</a>
        </div>
    </div>
</nav>
    <section class="container">
        <x-flash-messages />
    </section>

    <section class="container" style="margin-top:10px">
        <div class="card-panel">
       
            <h5>Account id: {{$landlord->user->email}}</h5>
            @if($landlord->status_id == 1)
            <span class="btn yellow black-text">{{$landlord->status->status}}</span>
            @elseif($landlord->status_id == 2)
            <span class="btn green">{{$landlord->status->status}}</span>
            @elseif($landlord->status_id == 3)
            <span class="btn red">{{$landlord->status->status}}</span>
            @elseif($landlord->status_id == 4)
            <span class="btn orange black-text">{{$landlord->status->status}}</span>
            @endif
          <form >
           
            @csrf
            <div class="row">
                <div class="input-field file-field col s12 m3">
                    <p for="">Avatar</p>
                    <a href="{{asset('avatars/'.$landlord->avatar)}}" class="btn tooltipped" data-position="left" data-tooltip="Download"download>
                        <span><i class="material-icons">cloud_download</i></span>
                        
                      </a>
                      <div class="file-path-wrapper">
                       
                            
                            <a class="white-text btn modal-trigger tooltipped" data-position="bottom" data-tooltip="View" href="#viewavatar"><span><i class="material-icons">remove_red_eye</i></span></a>
                          
                        
                      </div>
                     

                      <!-- Modal Structure -->
                      <div id="viewavatar" class="modal">
                        <div class="modal-content">
                          <img width=500 src="{{asset('avatars/'.$landlord->avatar)}}" alt="">
                        </div>
                        
                      </div>
                </div>

                <div class="input-field file-field col s12 m3">
                    <p for="">Omang</p>
                    <a href="{{asset('documents/'.$landlord->omang)}}" class="btn" download>
                        <span><i class="material-icons">cloud_download</i></span>
                        
                      </a>
                      <div class="file-path-wrapper">
                       
                            
                        <a class="white-text btn modal-trigger" href="#viewomang"><span><i class="material-icons">remove_red_eye</i></span></a>
                      
                    
                  </div>
                 

                  <!-- Modal Structure -->
                  <div id="viewomang" class="modal">
                    <div class="modal-content">
                        <embed src="{{asset('documents/'.$landlord->omang)}}" width="800px"  />
                      
                    </div>
                    
                  </div>
                </div>

                <div class="input-field file-field col s12 m3">
                    <p for="">Utility Document</p>
                    <a href="{{asset('documents/'.$landlord->utility_doc)}}" class="btn tooltipped" data-position="left" data-tooltip="Download" download>
                        <span><i class="material-icons">cloud_download</i></span>
                        
                    </a>
                      <div class="file-path-wrapper">
                       
                            
                        <a class="white-text btn modal-trigger tooltipped" data-position="bottom" data-tooltip="View" href="#viewutility"><span><i class="material-icons">remove_red_eye</i></span></a>
                      
                    
                  </div>
                 

                  <!-- Modal Structure -->
                  <div id="viewutility" class="modal">
                    <div class="modal-content">
                        <embed src="{{asset('documents/'.$landlord->utility_doc)}}" width="800px"  />
                      
                    </div>
                    
                  </div>
                </div>

              </div>
    
              <div class="row">
               
    
                
                <div class="input-field col s12 ">
                    <input disabled name="employer" id="disabled" value="{{$landlord->occupation}}" type="text" class="validate">
                    <label for="disabled">Occupation</label>
                    @if ($errors->has('occupation'))
                    <span class="help-block">
                        <strong style="color:red">{{ $errors->first('occupation') }}</strong>
                    </span>
                @endif
                  </div>
    
              </div>
    
              <div class="row">
                <div class="input-field col s12 m6">
                  <input disabled name="employer" id="disabled" value="{{$landlord->employer}}" type="text" class="validate">
                  <label for="disabled">Employer Name</label>
                            @if ($errors->has('employer'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('employer') }}</strong>
                            </span>
                        @endif
                </div>

                
                    <div class="input-field col s12 m6">
                      <input disabled name="employer_email" id="disabled2" value="{{$landlord->employer_email}}" type="email" class="validate">
                      <label for="disabled2">Employer Email</label>
                      @if ($errors->has('employer_email'))
                      <span class="help-block">
                          <strong style="color:red">{{ $errors->first('employer_email') }}</strong>
                      </span>
                  @endif
                    </div>
    
                    <div class="input-field col s12 m6">
                        <input disabled name="address" id="disabled3" value="{{$landlord->address}}" type="text" class="validate">
                        <label for="disabled3">Address</label>
                        @if ($errors->has('address'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                      </div>

                      <div class="input-field col s12 m6">
                        <textarea disabled name="bio" id="textarea2" class="materialize-textarea" data-length="250">{{$landlord->bio}}</textarea>
                        <label for="textarea2">Short Bio</label>
                        @if ($errors->has('bio'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('bio') }}</strong>
                        </span>
                    @endif
                      </div>
    
              </div>
         
         
          </form>
        </div>
      </div>
    </section>

    <section class="container">
        <div class="card-panel">
            <h4>Account Action</h4>
            
            <form action="/dashboard/account/landlord/{{$landlord->id}}" method="POST">
                {{ method_field('PATCH') }}
                @csrf
                <div class="row">
                    <div class="input-field col s12 m6">
                        <select name="action" style="display: block" required>
                             <option value="" selected='selected' disabled>Select Action</option>
                             <option value="2">Approve</option>
                             <option value="3">Reject</option>
                             <option value="4">Suspend</option>
                       
                        </select>
                        
                      </div>

                      <div class="input-field col s12">
                        <textarea name="message" id="message" class="materialize-textarea"></textarea>
                        <label for="message">Action Message</label>
                      </div>
                </div>

                <button type="submit" class="btn">save</button>
            </form>
        </div>
    </section>
@endsection