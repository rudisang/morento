<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\User;

class AdminUserTable extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        if(request()->has('search')){
            $search = request()->get('search');
            $users = User::where('email', 'like', '%'.$search.'%')->
            orWhere('name', 'like', '%'.$search.'%')->
            orWhere('surname', 'like', '%'.$search.'%')->paginate(10);
          }else{
            $users = User::orderBy('created_at','desc')->paginate(10);
          }
        return view('components.admin-user-table')->with('users', $users);
    }
}
