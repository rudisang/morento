<div>
    <div class="card-panel">
      <h4>Landlord Accounts</h4>
        <table>
            <thead>
              <tr>
                  <th>#</th>
                  <th>Acount Owner</th>
                  <th>Account Status</th>
                  <th>Account Submitted</th>
                  <th><form method="GET" action="/dashboard">
                   
                     
                        <div class="input-field col s6">
                            <input id="accounts" name="accounts" type="search" class="validate">
                            <label for="accounts">Search</label>
                          </div>
                      </form>
                    </th>
              </tr>
            </thead>
    
            <tbody>
                @foreach($landlords as $account)
                 
                  <tr>
                    <td>{{$account->id}}</td>
                    <td>{{$account->user->name}} {{$account->user->surname}}</td>
                    <td>@if($account->status_id == 1)
                        <span class="btn yellow black-text">{{$account->status->status}}</span>
                        @elseif($account->status_id == 2)
                        <span class="btn green">{{$account->status->status}}</span>
                        @elseif($account->status_id == 3)
                        <span class="btn red">{{$account->status->status}}</span>
                        @elseif($account->status_id == 4)
                        <span class="btn orange black-text">{{$account->status->status}}</span>
                        @endif
                    </td>
                    <td>{{$account->created_at->diffForHumans()}}</td>
                    <td><a href="/dashboard/account/landlord/{{$account->id}}" class="btn purple">manage account</a></td>
                  </tr>
                  

                @endforeach
              
            </tbody>
          </table>
    </div>
</div>