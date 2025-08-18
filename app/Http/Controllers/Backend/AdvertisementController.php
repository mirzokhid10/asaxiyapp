<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Advertisements;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AdvertisementController extends Controller
{

    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homepage_section_banner_one = Advertisements::where('id', 1)->first();
        $homepage_section_banner_two = Advertisements::where('id', 2)->first();

        return view('admin.advertisements.index', compact(
            'homepage_section_banner_one',
            'homepage_section_banner_two'
        ));
    }

    private function saveHomepageBanner(Request $request, int $id, string $successMessage)
    {
        $ad = Advertisements::find($id);

        $rules = [
            'status'            => ['nullable', 'boolean'],
            'banner_style'      => ['nullable', 'string'],
            'banner_url'        => ['nullable', 'url'],
            'banner_text'       => ['nullable', 'string', 'max:4096'],

            'banner_logo'       => [($ad ? 'nullable' : 'required'), 'image', 'max:4096'],
            'banner_app_image'  => [($ad ? 'nullable' : 'required'), 'image', 'max:4096'],
            'banner_qr'         => [($ad ? 'nullable' : 'required'), 'image', 'max:4096'],
            'banner_appstore'   => [($ad ? 'nullable' : 'required'), 'image', 'max:4096'],
            'banner_googleplay' => [($ad ? 'nullable' : 'required'), 'image', 'max:4096'],
        ];

        $messages = [
            'banner_logo.image'        => 'Banner logo must be an image.',
            'banner_qr.image'          => 'QR must be an image.',
            'banner_app_image.image'          => 'QR must be an image.',
            'banner_appstore.image'    => 'App Store badge must be an image.',
            'banner_googleplay.image'  => 'Google Play badge must be an image.',
            'banner_logo.max'          => 'Images may not be greater than 4MB.',
            'banner_qr.max'            => 'Images may not be greater than 4MB.',
            'banner_app_image.max'         => 'Images may not be greater than 4MB.',
            'banner_appstore.max'      => 'Images may not be greater than 4MB.',
            'banner_googleplay.max'    => 'Images may not be greater than 4MB.',
            'banner_url.url'           => 'The banner URL must be a valid link.',
            'banner_text.max'          => 'Banner text may not be greater than 4096 characters.',
            'banner_style.string'      => 'Style should be a valid string.',
        ];

        try {
            $validated = $request->validate($rules, $messages);
        } catch (ValidationException $e) {
            // Show each validation error via notification
            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    notify()->error($message);
                }
            }

            return back()->withErrors($e->errors())->withInput();
        }

        // Upload each file separately; fall back to existing DB value
        $bannerImagePath = $this->updateImage($request, 'banner_logo', 'uploads')
            ?: optional($ad)->banner_logo;

        $baiPath = $this->updateImage($request, 'banner_app_image', 'uploads')
            ?: optional($ad)->banner_app_image;

        $qrPath = $this->updateImage($request, 'banner_qr', 'uploads')
            ?: optional($ad)->banner_qr;

        $appStorePath = $this->updateImage($request, 'banner_appstore', 'uploads')
            ?: optional($ad)->banner_appstore;

        $googlePlayPath = $this->updateImage($request, 'banner_googleplay', 'uploads')
            ?: optional($ad)->banner_googleplay;

        Advertisements::updateOrCreate(
            ['id' => $id],
            [
                'banner_url'        => $validated['banner_url'] ?? optional($ad)->banner_url,
                'status'            => $request->has('status') ? $request->boolean('status') : optional($ad)->status,
                'banner_text'       => $validated['banner_text'] ?? optional($ad)->banner_text,
                'banner_style'      => $validated['banner_style'] ?? optional($ad)->banner_style,
                'banner_logo'       => $bannerImagePath,
                'banner_app_image'  => $baiPath,
                'banner_qr'         => $qrPath,
                'banner_appstore'   => $appStorePath,
                'banner_googleplay' => $googlePlayPath,
            ]
        );

        notify()->success($successMessage);
        return back()->withInput();
    }

    public function homepageBannerSectionOne(Request $request)
    {
        return $this->saveHomepageBanner($request, 1, 'Homepage Banner Section One updated successfully!');
    }

    public function homepageBannerSectionTwo(Request $request)
    {
        return $this->saveHomepageBanner($request, 2, 'Homepage Banner Section Two updated successfully!');
    }
}