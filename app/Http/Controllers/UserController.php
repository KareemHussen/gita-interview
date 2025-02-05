<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request , $status = null)
    {

        if (request()->ajax()) {

            $users = User::query();

            return DataTables::of($users)
            ->addIndexColumn()
            ->editColumn('created_at', function ($user) {
                return $user->created_at->format('d-m-Y h:i A');
            })
            ->editColumn('updated_at', function ($user) {
                return $user->created_at->format('d-m-Y h:i A');
            })
            ->addColumn('actions', function ($user) {
                return 
                    '<a href="' . route('users.show', $user) . '" class="btn btn-sm btn-primary" style="margin: 0 3%">View</a>' .
                    '<a href="' . route('users.edit', $user) . '" class="btn btn-sm btn-primary" style="margin: 0 3%">Edit</a>' .
                    '<form action="' . route('users.destroy', $user) . '" method="POST" style="display: inline-block; margin: 0 3%">' .
                        csrf_field() .
                        method_field('DELETE') .
                        '<button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are You Sure?\')">Delete</button>' .
                    '</form>';
            })
            ->rawColumns(['actions'])
            ->make(true);
                
        }

        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        return redirect()->route('users.index')->withSuccess('User ' . $user->name . ' has been created successfully');;
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
    
        if (!isset($data['password'])) { 
            unset($data['password']); 
        }
    
        $user->update($data);
        
        return redirect()->route('users.index')->withSuccess('User ' . $user->name . ' has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->withSuccess('User ' . $user->name . ' has been deleted successfully');
    }
}
