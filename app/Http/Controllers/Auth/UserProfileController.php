<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
class UserProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('auth.user-profile',compact('user'));

    }

    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)
            ],
            'birthday' => 'date|before:today',
            'gender' => 'in:male,female',
            'locale' => ['required'],
        ]);

        $user->update($request->all());
        $profile = $user->profile;
        if (!$profile->exists) {
            $request->merge([
                'user_id' => $user->id,
            ]);
            $profile = Profile::create($request->all());
        } else {
            $profile->update($request->all());
        }

        return redirect()
            ->route('profile.index')
            ->with('success', 'Profile updated');
    }
}
