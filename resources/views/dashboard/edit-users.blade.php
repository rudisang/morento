@extends('layouts.main')

@section('content')
<nav class="black">
    <div class="container">
        <div class="nav-wrapper">
            <a href="/dashboard" class="breadcrumb teal-text">{{Auth::user()->role->role}} Dashboard</a> 
            <a href="/dashboard" class="breadcrumb teal-text">Manage User</a>
            <a class="breadcrumb grey-text">{{$user->name}} {{$user->surname}}</a>
        </div>
    </div>
</nav>
    <section class="container">
        <x-flash-messages />
    </section>

    <section class="container" style="margin-top:10px">
        <div class="card-panel">
       
            <h4>Edit Account</h4>
        
          <form action="/dashboard/account/update-details/{{$user->id}}" method="POST">
            {{ method_field('PATCH') }}
            @csrf
            <div class="row">
                <div class="input-field col s12 m6">
                  <input id="first_name" name="name" value="{{$user->name}}" type="text" class="validate" required>
                  <label for="first_name">First Name</label>
                  @if ($errors->has('name'))
                  <span class="help-block">
                      <strong style="color:red">{{ $errors->first('name') }}</strong>
                  </span>
              @endif
                </div>
                <div class="input-field col s12 m6">
                  <input id="last_name" name="surname" value="{{$user->surname}}" type="text" class="validate" required>
                  <label for="last_name">Last Name</label>
                  @if ($errors->has('surname'))
                  <span class="help-block">
                      <strong style="color:red">{{ $errors->first('surname') }}</strong>
                  </span>
              @endif
                </div>
              </div>
    
              <div class="row">
                <div class="input-field col s12 m6">
                  <input id="first_mobile" name="mobile" min=71111111 max=77999999 value="{{$user->mobile}}" type="number" class="validate" required>
                  <label for="first_mobile">Mobile #</label>
                  @if ($errors->has('mobile'))
                  <span class="help-block">
                      <strong style="color:red">{{ $errors->first('mobile') }}</strong>
                  </span>
              @endif
                </div>
    
                
                <div class="input-field col s12 m6">
                    <select name="gender" style="display: block">
                    
                      <?php $arr = ['Male','Female']; ?>
                      @foreach($arr as $item)
                         <option value="{{ $item }}" @if($user->gender=== $item) selected='selected' @endif> {{ $item }}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('gender'))
                    <span class="help-block">
                        <strong style="color:red">{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
                  </div>
    
              </div>
    
              <div class="row">
                <div class="input-field col s12 m6">
                  <input name="age" id="disabled" value="{{$user->age}}" type="date" class="validate">
                  <label for="disabled">DoB</label>
                  @if ($errors->has('age'))
                  <span class="help-block">
                      <strong style="color:red">{{ $errors->first('age') }}</strong>
                  </span>
              @endif
                </div>
    
                 @if($user->role_id == 1)
                 <div class="input-field col s12 m6">
                    <select name="role_id" style="display: block">
                        <option value="1" selected='selected'>Student</option>
                        <option value="2">Landlord</option>
                    </select>
                    @if ($errors->has('role_id'))
                    <span class="help-block">
                        <strong style="color:red">{{ $errors->first('role_id') }}</strong>
                    </span>
                @endif
                  </div>
                  @elseif($user->role_id == 2)
                    <input type="hidden" name="role_id" value="2">
                  @elseif($user->role_id == 3)
                  <input type="hidden" name="role_id" value="3">
                 @endif
    
              </div>
         
            <button href="#" class="btn teal">Update Account</button>
          </form>
        </div>
      </div>
    </section>

    <section class="container" style="margin-top:10px">
       <div class="card-panel">
       
        <h4>Change User Password</h4>
    
      <form action="/dashboard/account/update-password/{{Auth::user()->id}}" method="POST">
        {{ method_field('PATCH') }}
        @csrf
        <div class="row">
            <div class="input-field col s12 m6">
              <input id="old_pass" name="old_pass" value="" type="password" class="validate" required>
              <label for="old_pass">Old Password</label>
              @if ($errors->has('old_pass'))
              <span class="help-block">
                  <strong style="color:red">{{ $errors->first('old_pass') }}</strong>
              </span>
          @endif
            </div>
            <div class="input-field col s12 m6">
              <input id="new_pass" name="new_pass" value="" type="password" class="validate" required>
              <label for="new_pass">New Password</label>
              @if ($errors->has('new_pass'))
              <span class="help-block">
                  <strong style="color:red">{{ $errors->first('new_pass') }}</strong>
              </span>
          @endif
            </div>

            <div class="input-field col s12 m6">
                <input id="conf_pass" name="conf_pass" value="" type="password" class="validate" required>
                <label for="conf_pass">Confirm Password</label>
                @if ($errors->has('conf_pass'))
                <span class="help-block">
                    <strong style="color:red">{{ $errors->first('conf_pass') }}</strong>
                </span>
            @endif
              </div>
          </div>

 
     
        <button href="#" class="btn teal">Update Password</button>
      </form>
    </div>
  </div>
    </section>

    <section>
      <div class="fixed-action-btn">
        <a href="#delete" class="btn-floating btn-large red tooltipped disabled" data-position="left" data-tooltip="delete user" disabled>
          <i class="large material-icons">delete</i>
        </a>
      </div>

      <!-- Modal Structure -->
      <div id="delete" class="modal bottom-sheet yellow" style="width:50vw">
        <div class="modal-content">
         
          <div class="container">
            <h4>⚠️ Warning!</h4>
            <p>Are you sure you want to delete this account?</p>
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">No</a>
            <form style="display: inline" method="POST" action="/dashboard/account/user/{{$user->id}}">
              {{method_field('DELETE')}}
              @csrf
              <button type="submit" class="btn red">Yes</button>
  
            </form>
          </div>
        </div>
        <div class="modal-footer yellow darken-1">
          
          
        </div>
      </div>
      
    </section>

@endsection