<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait ImageUploadTrait
{
    public function uploadImage(Request $request, $inputName, $path)

    {
        if ($request->hasFile($inputName)) {

            $image = $request->{$inputName};
            $imageName = rand() . '_' . $image->getClientOriginalName();
            $image->move(public_path($path), $imageName);
            return $path . '/' . $imageName;
        }
    }

    public function uploadMultiImage(Request $request, $inputName, $path)
    {
        $imagePaths = [];

        if ($request->hasFile($inputName)) {
            $images = $request->{$inputName};
            foreach ($images as $image) {
                $ext = $image->getClientOriginalExtension();
                $imageName = 'media_' . uniqid() . '.' . $ext;
                $image->move(public_path($path), $imageName);
                $imagePaths[] =  $path . '/' . $imageName;
            }
            return $imagePaths;
        }
    }


    public function updateImage(Request $request, $inputName, $path, $oldPath = null)
    {
        if ($request->hasFile($inputName)) {
            if (File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;

            $image->move(public_path($path), $imageName);

            return $path . '/' . $imageName;
        }
    }

    public function deleteImage(string $path)
    {
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }

    public function authorize()
    {
        return true; // or check permissions if needed
    }

    public function rules()
    {
        return [
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|max:255|unique:users,email,' . $this->user()->id,
            'phone'          => 'required|string|max:255',
            'passport_seria' => 'required|string|max:255',
            'birth_date'     => 'required|date',
            'address'        => 'required|string|max:255',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => 'Your name is required.',
            'email.required'   => 'Your email address is required.',
            'email.unique'     => 'This email is already taken.',
            'birth_date.date'  => 'Birth date must be a valid date.',
            'image.image'      => 'Profile picture must be a valid image file.',
            'image.max'        => 'Profile picture may not be greater than 2MB.',
        ];
    }
}
