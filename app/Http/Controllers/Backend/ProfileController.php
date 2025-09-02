<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    use ImageUploadTrait;
    public function index()
    {
        $user = auth()->user();
        return view('admin.profile.index', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        // Validate inputs
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone'          => 'required|string|max:255',
            'passport_seria' => 'required|string|max:255',
            'birth_date'     => 'required|date',
            'address'        => 'required|string|max:255',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }

            // Save new image
            $imagePath = $request->file('image')->storeAs(
                '/uploads/userProfileImage',
                Str::uuid() . '.' . $request->file('image')->getClientOriginalExtension(),
                'public'
            );

            // Add image path to validated data so it's saved in DB
            $validated['image'] = $imagePath;
        } else {
            // Keep old image if no new one is uploaded
            $validated['image'] = $user->image;
        }

        // Update user
        $user->update($validated);

        notify()->success('Profile Information Updated Successfully!');
        return redirect()->back();
    }

    /**
     * Update user password.
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        // Validate input
        $validated = $request->validate([
            'current_password'      => ['required'],
            'password'              => ['required', 'string', 'min:3', 'confirmed'],
        ]);

        // Check current password
        if (!Hash::check($validated['current_password'], $user->password)) {
            notify()->error('Your current password does not matches with the password you provided.');
            return back()->withErrors(['current_password' => 'Current password does not match.']);
        }

        // Update password
        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        notify()->success('Password updated successfully.');
        return back()->with('success', 'Password updated successfully.');
    }
}
