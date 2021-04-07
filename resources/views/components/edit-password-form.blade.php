<div>
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
</div>