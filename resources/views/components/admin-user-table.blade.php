<div>
    <div class="card-panel">
      <h4>System Users</h4>
        <table>
            <thead>
              <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th><form method="GET" action="/dashboard">
                   
                     
                        <div class="input-field col s6">
                            <input id="search" name="search" type="search" class="validate">
                            <label for="search">Search</label>
                          </div>
                      </form>
                    </th>
              </tr>
            </thead>
    
            <tbody>
                @foreach($users as $user)
                  @if($user->role_id !== 3)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}} {{$user->surname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->role}}</td>
                    <td><a href="/dashboard/account/user/{{$user->id}}" class="btn purple">manage user</a></td>
                  </tr>
                  @endif

                @endforeach
                
            </tbody>
          </table>
          {{$users->links('/vendor/pagination/default')}}
          
    </div>
</div>