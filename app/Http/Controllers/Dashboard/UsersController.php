<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{

    // public function __construct()
    // {
    //     $this->authorizeResource(User::class, 'user');
    // }


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('dashboard')) {
                return redirect()->route('home');
            }

            return $next($request);
        });


    }

    public function index()
    {
        Gate::authorize('users.view');

        $users = User::with('roles')->paginate();
        return view('dashboard.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('users.create');

        return view('dashboard.users.create', [
            'user' => new User,
            'user_roles' => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('users.create');

        $request->validate([
            'name' => 'required',
            'roles' => 'required|array',
        ]);

        if ($request->post('type') == 'super-admin') {
            $this->authorize('create-super-admin', User::class);
        }

        $user = User::create($request->all());

        $user->roles()->attach($request->post('roles'));

        return redirect()
            ->route('dashboard.users.index')
            ->with('success', __('User ":name" created', [
                'name' => $user->name
            ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        Gate::authorize('users.update');

        $user_roles = $user->roles()->pluck('id')->toArray();

        return view('dashboard.users.edit', [
            'user' => $user,
            'user_roles' => $user_roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        Gate::authorize('users.update');

        $request->validate([
            'name' => 'required',
            'roles' => 'array',
        ]);

        $user->update($request->all());

        $user->roles()->sync($request->post('roles'));
        // $user->roles()->detach();
        // $user->roles()->attach($request->post('roles'));

        return redirect()
            ->route('dashboard.users.index')
            ->with('success', __('User ":name" updated', [
                'name' => $user->name
            ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Gate::authorize('users.delete');

        $user->delete();
        return redirect()
            ->route('dashboard.users.index')
            ->with('success', __('User ":name" deleted', [
                'name' => $user->name
            ]));
    }
}
