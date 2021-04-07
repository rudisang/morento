<div>

    <div class="card-panel">
       
        <h4>Edit User Details</h4>
    
      <form action="/dashboard/account/update-details/{{Auth::user()->id}}" method="POST">
        {{ method_field('PATCH') }}
        @csrf
        <div class="row">
            <div class="input-field col s12 m6">
              <input id="first_name" name="name" value="{{Auth::user()->name}}" type="text" class="validate" required>
              <label for="first_name">First Name</label>
              @if ($errors->has('name'))
              <span class="help-block">
                  <strong style="color:red">{{ $errors->first('name') }}</strong>
              </span>
          @endif
            </div>
            <div class="input-field col s12 m6">
              <input id="last_name" name="surname" value="{{Auth::user()->surname}}" type="text" class="validate" required>
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
              <input id="first_mobile" name="mobile" min=71111111 max=77999999 value="{{Auth::user()->mobile}}" type="number" class="validate" required>
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
                     <option value="{{ $item }}" @if(Auth::user()->gender=== $item) selected='selected' @endif> {{ $item }}</option>
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
              <input name="age" id="disabled" value="{{Auth::user()->age}}" type="date" class="validate">
              <label for="disabled">DoB</label>
              @if ($errors->has('age'))
              <span class="help-block">
                  <strong style="color:red">{{ $errors->first('age') }}</strong>
              </span>
          @endif
            </div>

             @if(Auth::user()->role_id == 1)
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
              @elseif(Auth::user()->role_id == 2)
                <input type="hidden" name="role_id" value="2">
              @elseif(Auth::user()->role_id == 3)
              <input type="hidden" name="role_id" value="3">
             @endif

          </div>
     
        <button href="#" class="btn teal">Update Account</button>
      </form>
    </div>
  </div>
</div>