<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        Gate::authorize('roles.view');

        $roles = Role::withCount('users')->paginate();

        return view('dashboard.roles.index', [
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('roles.create');

        return view('dashboard.roles.create', [
            'role' => new Role,
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
        Gate::authorize('roles.create');

        $request->validate([
            'name' => 'required',
            'permissions' => 'required|array',
        ]);

        $role = Role::create($request->all());

        return redirect()
            ->route('dashboard.roles.index')
            ->with('success', __('Role ":name" created', [
                'name' => $role->name
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
    public function edit(Role $role)
    {
        Gate::authorize('roles.update');

        return view('dashboard.roles.edit', [
            'role' => $role,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        // Gate::authorize('roles.update');

        $request->validate([
            'name' => 'required',
            'permissions' => 'array',
        ]);

        $role->update([
            'name' => $request->post('name'),
            'permissions' => $request->post('permissions', []),
        ]);

        return redirect()
            ->route('dashboard.roles.index')
            ->with('success', __('Role ":name" updated', [
                'name' => $role->name
            ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Gate::authorize('roles.delete');

        $role->delete();
        return redirect()
            ->route('dashboard.roles.index')
            ->with('success', __('Role ":name" deleted', [
                'name' => $role->name
            ]));
    }
}
