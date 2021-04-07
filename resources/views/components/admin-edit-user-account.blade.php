<div>


            <div class="card-panel">
           
                <h4>Update Account</h4>
            
              <form action="/dashboard/account/resubmit-landlord/{{Auth::user()->landlordaccount->id}}" method="POST" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
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
    
                     <div class="input-field file-field col s12 m6">
                        <div class="btn">
                            <span><i class="material-icons">cloud_upload</i></span>
                            <input name="omang" type="file" >
                          </div>
                          <div class="file-path-wrapper">
                            <input name="omang" class="file-path validate" type="text">
                            <label for="">Omang</label>
                          </div>
                      @if ($errors->has('omang'))
                      <span class="help-block">
                          <strong style="color:red">{{ $errors->first('omang') }}</strong>
                      </span>
                  @endif
                    </div>
    
                  </div>
        
                  <div class="row">
                    <div class="input-field file-field col s12 m6">
                        <div class="btn">
                            <span><i class="material-icons">cloud_upload</i></span>
                            <input name="utility_doc" type="file">
                          </div>
                          <div class="file-path-wrapper">
                            <input name="utility_doc" class="file-path validate" type="text">
                            <label for="">Utility Document</label>
                          </div>
                      @if ($errors->has('utility_doc'))
                      <span class="help-block">
                          <strong style="color:red">{{ $errors->first('utility_doc') }}</strong>
                      </span>
                  @endif
                    </div>
        
                    
                    <div class="input-field col s12 m6">
                        <select name="occupation" style="display: block" required>
                            <?php $arr = ['Student','Employed', 'Unemployed', 'Self_Employed', 'Retired']; ?>
                            <option value=""disabled>Select Occupation</option>
                            @foreach($arr as $item)
                               <option value="{{ $item }}" @if(Auth::user()->landlordaccount->occupation === $item) selected='selected' @endif> {{ $item }}</option>
                            @endforeach
                             
                          
                       
                        </select>
                        @if ($errors->has('occupation'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('occupation') }}</strong>
                        </span>
                    @endif
                      </div>
        
                  </div>
        
                  <div class="row">
                    <div class="input-field col s12 m6">
                      <input name="employer" id="disabled" value="{{Auth::user()->landlordaccount->employer}}" type="text" class="validate">
                      <label for="disabled">Employer Name</label>
                                @if ($errors->has('employer'))
                                <span class="help-block">
                                    <strong style="color:red">{{ $errors->first('employer') }}</strong>
                                </span>
                            @endif
                    </div>
    
                    
                        <div class="input-field col s12 m6">
                          <input name="employer_email" id="disabled2" value="{{Auth::user()->landlordaccount->employer_email}}" type="email" class="validate">
                          <label for="disabled2">Employer Email</label>
                          @if ($errors->has('employer_email'))
                          <span class="help-block">
                              <strong style="color:red">{{ $errors->first('employer_email') }}</strong>
                          </span>
                      @endif
                        </div>
        
                        <div class="input-field col s12 m6">
                            <input name="address" id="disabled3" value="{{Auth::user()->landlordaccount->address}}" type="text" class="validate">
                            <label for="disabled3">Address</label>
                            @if ($errors->has('address'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                          </div>
    
                          <div class="input-field col s12 m6">
                            <textarea name="bio" id="textarea2" class="materialize-textarea" data-length="250">{{Auth::user()->landlordaccount->bio}}</textarea>
                            <label for="textarea2">Short Bio</label>
                            @if ($errors->has('bio'))
                            <span class="help-block">
                                <strong style="color:red">{{ $errors->first('bio') }}</strong>
                            </span>
                        @endif
                          </div>
        
                  </div>
             
                <button href="#" class="btn teal">Save</button>
              </form>
            </div>
          </div>

</div>