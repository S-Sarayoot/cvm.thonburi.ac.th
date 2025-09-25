<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use Illuminate\Support\Facades\DB; 
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function mockup(Request $request): View
    {
        return view('user');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, $id): RedirectResponse
    {
        
        
        $user = User::findOrFail($id);
        
        $user->update(request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:225',
            'date_of_birth' => 'required|date',
            'street_address' => 'required|string|max:255',
            'street_address_2' => 'nullable|string|max:255',
            'town' => 'required|string|max:255',
            'county' => 'required|string|max:255',
            'postcode' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            //'reinvest_interest' => 'nullable|boolean'
        ]));
        
        return redirect()->route('profile.edit')->with('status', 'profile-updated');

        //$request->user()->fill($request->validated());
        /*
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        */

        /*$user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
        */
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
