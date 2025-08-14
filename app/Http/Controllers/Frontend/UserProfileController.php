<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;


class UserProfileController extends Controller
{
    public function index()
    {
        return view('frontend.dashboard.profile');
    }

    public function editProfile()
    {
        $user = Auth::user();

        return view('frontend.dashboard.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $customMessages = [
            'name.required' => 'Name is required.',
            'name.max' => 'Name must not exceed 30 characters.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already taken.',
            'phone.required' => 'Phone number is required.',
            'phone.regex' => 'Please enter a valid Uzbek phone number (e.g., +998901234567).',
            'passport_seria.max' => 'Passport series must not exceed 9 characters.',
            'birth_date.date_format' => 'Invalid birth date format. Please use DD.MM.YYYY.',
            'address.max' => 'Address must not exceed 255 characters.',
            'job_address.max' => 'Job address must not exceed 255 characters.',
            'image.image' => 'Uploaded file must be an image.',
            'image.max' => 'Image size must not exceed 2MB.',
        ];

        try {
            $request->validate([
                'name' => ['required', 'max:30'],
                'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::id())],
                'phone' => ['required', 'max:30'],
                'passport_seria' => ['nullable', 'max:9'],
                'birth_date' => ['nullable', 'date_format:d.m.Y'],
                'address' => ['nullable', 'max:255'],
                'job_address' => ['nullable', 'max:255'],
                'image' => ['nullable', 'image', 'max:4096'],
            ], $customMessages);
        } catch (ValidationException $e) {
            notify()->error('Please correct the highlighted errors and try again.');
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput();
        }

        $user = Auth::user();

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($user->image && File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }

            $image = $request->file('image');
            $imageName = uniqid() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/userProfileImage'), $imageName);
            $user->image = "/uploads/userProfileImage/" . $imageName;
        }

        // Update user fields
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->passport_seria = $request->passport_seria;
        $user->birth_date = $request->birth_date
            ? Carbon::createFromFormat('d.m.Y', $request->birth_date)->format('Y-m-d')
            : null;
        $user->address = $request->address;
        $user->job_address = $request->job_address;

        $user->save();

        notify()->success('Profile Information Updated Successfully!');
        return redirect()->route('user.profile');
    }
}