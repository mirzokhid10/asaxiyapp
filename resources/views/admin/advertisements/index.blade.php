@extends('admin.layouts.master')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Settings</h1>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <div class="list-group" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active"
                                            id="list-homepage-banner-one-tab" data-toggle="list"
                                            href="#list-homepage-banner-one" role="tab"
                                            aria-controls="homepage-banner-one">
                                            Homepage banner section one
                                        </a>

                                        <a class="list-group-item list-group-item-action my-3"
                                            id="list-homepage-banner-two-tab" data-toggle="list"
                                            href="#list-homepage-banner-two" role="tab"
                                            aria-controls="homepage-banner-two">
                                            Homepage banner section two
                                        </a>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="tab-content" id="nav-tabContent">

                                        <div class="tab-pane fade show active p-0" id="list-homepage-banner-one"
                                            role="tabpanel" aria-labelledby="list-homepage-banner-one-tab">
                                            @include('admin.advertisements.homepage-banner-one')
                                        </div>

                                        <div class="tab-pane fade p-0" id="list-homepage-banner-two" role="tabpanel"
                                            aria-labelledby="list-homepage-banner-two-tab">
                                            @include('admin.advertisements.homepage-banner-two')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
