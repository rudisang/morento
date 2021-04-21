<div>
    <table>
        <thead>
          <tr>
              <th>Title</th>
              <th>Location</th>
              <th>Published</th>
              <th>Action</th>
          </tr>
        </thead>

        <tbody>
          @if (Auth::user()->properties->count() > 0)
              @foreach (Auth::user()->properties as $prop)
              <tr>
                <td>{{$prop->title}}</td>
                <td>{{$prop->location}}</td>
                <td>{{$prop->created_at->diffForhumans()}}</td>
                <td><a href="/dashboard/property/edit/{{$prop->id}}" class="btn amber">Edit</a></td>
              </tr>
              @endforeach
          @else

          @endif

        </tbody>
      </table>
</div>