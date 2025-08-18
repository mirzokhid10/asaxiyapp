<div class="tab-pane fade show active p-0" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('admin.homepage-banner-section-one') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="">Status</label><br>
                    <label class="custom-switch mt-2">
                        <input type="hidden" name="status" value="0">
                        <input type="checkbox" name="status" value="1" class="custom-switch-input"
                            {{ old('status', $homepage_section_banner_one->status ?? 0) ? 'checked' : '' }}>
                        <span class="custom-switch-indicator"></span>
                    </label>
                </div>
                <div class="form-group">
                    <label>Banner Logo</label>
                    <div class="row m-0 d-flex align-items-center">
                        <input type="file" class="form-control col-12 col-md-9" name="banner_logo">
                        @if (!empty($homepage_section_banner_one?->banner_logo))
                            <small class="col-md-3 row d-flex align-items-center mx-auto gap-5 justify-content-around">

                                <span>Current: </span>
                                <img style="background-color: black"
                                    src="{{ asset($homepage_section_banner_one->banner_logo) }}" alt=""
                                    width="150">
                            </small>
                        @endif
                    </div>
                    @error('banner_logo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Banner Style</label>
                    <input type="text" class="form-control col-12 col-md-9" name="banner_style"
                        value="{{ old('banner_style', $homepage_section_banner_one->banner_style ?? '') }}">
                    @error('banner_style')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Banner URL</label>
                    <input type="text" class="form-control col-12 col-md-9" name="banner_url"
                        value="{{ old('banner_url', $homepage_section_banner_one->banner_url ?? '') }}">
                    @error('banner_url')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Banner Text</label>
                    <input type="text" class="form-control col-12 col-md-9" name="banner_text"
                        value="{{ old('banner_text', $homepage_section_banner_one->banner_text ?? '') }}">
                    @error('banner_text')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Banner App Image</label>
                    <div class="row m-0 d-flex align-items-center">
                        <input type="file" class="form-control col-12 col-md-9" name="banner_app_image">
                        @if (!empty($homepage_section_banner_one?->banner_app_image))
                            <small
                                class="col-md-3 row d-flex align-items-center mx-auto gap-5 justify-content-around"><span>Current:</span>
                                <img class="" src="{{ asset($homepage_section_banner_one->banner_app_image) }}"
                                    width="120"></small>
                        @endif
                    </div>

                    @error('banner_qr')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Banner QR Code</label>
                    <div class="row m-0 d-flex align-items-center">
                        <input type="file" class="form-control col-12 col-md-9" name="banner_qr">
                        @if (!empty($homepage_section_banner_one?->banner_qr))
                            <small
                                class="col-md-3 row d-flex align-items-center mx-auto gap-5 justify-content-around"><span>Current:</span>
                                <img class="" src="{{ asset($homepage_section_banner_one->banner_qr) }}"
                                    width="120"></small>
                        @endif
                    </div>

                    @error('banner_qr')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Banner App Store Image</label>
                    <div class="row m-0 d-flex align-items-center">
                        <input type="file" class="form-control col-12 col-md-9" name="banner_appstore">
                        @if (!empty($homepage_section_banner_one?->banner_appstore))
                            <small
                                class="col-md-3 row d-flex align-items-center mx-auto gap-5 justify-content-around"><span>Current:</span>
                                <img src="{{ asset($homepage_section_banner_one->banner_appstore) }}"
                                    width="120"></small>
                        @endif
                    </div>
                    @error('banner_appstore')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Banner Google Play Image</label>
                    <div class="row m-0 d-flex align-items-center">
                        <input type="file" class="form-control col-12 col-md-9" name="banner_googleplay">
                        @if (!empty($homepage_section_banner_one?->banner_googleplay))
                            <small
                                class="col-md-3 row d-flex align-items-center mx-auto gap-5 justify-content-around"><span>Current:</span>
                                <img src="{{ asset($homepage_section_banner_one->banner_googleplay) }}"
                                    width="120"></small>
                        @endif
                    </div>
                    @error('banner_googleplay')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
</div>
