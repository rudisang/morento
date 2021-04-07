@extends('layouts.main')

@section('content')
<nav class="grey lighten-3">
    <div class="container">
        <div class="nav-wrapper">
            <a href="/dashboard" class="breadcrumb teal-text">{{Auth::user()->role->role}} Dashboard</a> 
            <a href="/dashboard" class="breadcrumb teal-text">Manage User</a>
            <a class="breadcrumb grey-text">{{Auth::user()->name}} {{Auth::user()->surname}}</a>
        </div>
    </div>
</nav>
    <section class="container">
        <x-flash-messages />
    </section>

    <section class="container" style="margin-top:10px">
        <div class="card-panel">
       
            <h4>Student Account</h4>
        
          <form action="/dashboard/account/create-student" method="POST" enctype="multipart/form-data">
           
            @csrf
            <div class="row">
                <div class="input-field file-field col s12 m6">
                    <div class="btn">
                        <span><i class="material-icons">cloud_upload</i></span>
                        <input name="avatar" type="file">
                      </div>
                      <div class="file-path-wrapper">
                        <input name="avatar"  class="file-path validate" type="text" accept="image/*">
                        <label for="">Avatar</label>
                      </div>
                  @if ($errors->has('avatar'))
                  <span class="help-block">
                      <strong style="color:red">{{ $errors->first('avatar') }}</strong>
                  </span>
              @endif
                </div>

        
                <div class="input-field col s12 m6">
                    <select name="university" style="display: block" required>
                         <option value="" selected='selected' disabled>Select University</option>
                         <option value="Baisago University">Baisago University</option>
                         <option value="Boitekanelo College">Boitekanelo College</option>
                         <option value="Botho University">Botho University</option>
                         <option value="Botswana Accountancy College">Botswana Accountancy College</option>
                         <option value="Botswana Open University">Botswana Open University</option>
                         <option value="Botswana University of Agriculture">Botswana University of Agriculture</option>
                         <option value="Botswana University of Science and Technology">Botswana University of Science and Technology</option>
                         <option value="University of Botswana">University of Botswana</option>
                   
                    </select>
                    @if ($errors->has('university'))
                    <span class="help-block">
                        <strong style="color:red">{{ $errors->first('university') }}</strong>
                    </span>
                @endif
                  </div>

              </div>
    
              <div class="row">
       
                <div class="input-field col s12 m6">
                    <input name="program_of_study" id="disabled" value="{{old('program_of_study')}}" type="text" class="validate">
                    <label for="disabled">Program Of Study</label>
                              @if ($errors->has('program_of_study'))
                              <span class="help-block">
                                  <strong style="color:red">{{ $errors->first('program_of_study') }}</strong>
                              </span>
                          @endif
                  </div>
                
                <div class="input-field col s12 m6">
                    <select name="sponsored" style="display: block" required>
                         <option value="" selected='selected' disabled>Are You Sponsored?</option>
                         <option value="1">Yes</option>
                         <option value="0">No</option>
                   
                    </select>
                    @if ($errors->has('sponsored'))
                    <span class="help-block">
                        <strong style="color:red">{{ $errors->first('sponsored') }}</strong>
                    </span>
                @endif
                  </div>
    
              </div>
    
              <div class="row">
                <div class="input-field col s12 m6">
                  <input name="monthly_stipend" id="disabled" value="{{old('monthly_stipend')}}" type="number" min=500 class="validate">
                  <label for="disabled">Monthly Stipend (BWP)</label>
                            @if ($errors->has('monthly_stipend'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('monthly_stipend') }}</strong>
                            </span>
                        @endif
                </div>

                
                    <div class="input-field col s12 m6">
                      <input name="next_of_kin_name" id="disabled2" value="{{old('next_of_kin_name')}}" type="text" class="validate">
                      <label for="disabled2">Next Of Kin Names</label>
                      @if ($errors->has('next_of_kin_name'))
                      <span class="help-block">
                          <strong style="color:red">{{ $errors->first('next_of_kin_name') }}</strong>
                      </span>
                  @endif
                    </div>
    
                    <div class="input-field col s12 m6">
                        <input name="next_of_kin_mobile" id="disabled3" value="{{old('next_of_kin_mobile')}}" type="text" class="validate">
                        <label for="disabled3">Next of Kin Mobile Number</label>
                        @if ($errors->has('next_of_kin_mobile'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('next_of_kin_mobile') }}</strong>
                        </span>
                    @endif
                      </div>

                      <div class="input-field col s12 m6">
                        <textarea name="bio" id="textarea2" class="materialize-textarea" data-length="250">{{old('bio')}}</textarea>
                        <label for="textarea2">Short Bio</label>
                        @if ($errors->has('bio'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('bio') }}</strong>
                        </span>
                    @endif
                      </div>
    
              </div>
         
            <button href="#" class="btn teal">Create Account</button>
          </form>
        </div>
      </div>
    </section>
@endsection