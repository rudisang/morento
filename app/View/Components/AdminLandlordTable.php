<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Landlord;

class AdminLandlordTable extends Component
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
        if(request()->has('accounts')){
            $search = request()->get('accounts');
            $landlords = Landlord::join('users', 'users.id', '=', 'landlords.user_id')
            ->where('name', 'like', '%'.$search.'%')->orWhere('status_id', 'like', '%'.$search.'%')
            ->paginate(10);
          }else{
            $landlords = Landlord::orderBy('created_at','desc')->paginate(10);
          }          
        
        return view('components.admin-landlord-table')->with('landlords', $landlords);
    }
}
