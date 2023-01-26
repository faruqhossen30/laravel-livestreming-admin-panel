@extends('admin.layout.master')
@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Settings</a></li>
            <li class="breadcrumb-item active" aria-current="page">updata</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-5 col-md-3 pe-0">
            <div class="nav nav-tabs nav-tabs-vertical" id="v-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active " id="v-website-tab" data-bs-toggle="tab" href="#v-website" role="tab"
                    aria-controls="v-home" aria-selected="true"><span class="input-group"><i data-feather="chrome"
                            class="me-2"></i>Website Title</span></a>
                <a class="nav-link " id="v-agora-tab" data-bs-toggle="tab" href="#v-agora" role="tab"
                    aria-controls="v-agora" aria-selected="false"><span class="input-group"><i data-feather="box"
                            class="me-2"></i>Agora</a>

                <a class="nav-link " id="v-contact-tab" data-bs-toggle="tab" href="#v-contact" role="tab"
                    aria-controls="v-contact" aria-selected="false"><span class="input-group"><i data-feather="home"
                            class="me-2"></i>contact</a>

                <a class="nav-link " id="v-commission-tab" data-bs-toggle="tab" href="#v-commission" role="tab"
                    aria-controls="v-commission" aria-selected="false"><span class="input-group"><i data-feather="gift"
                            class="me-2"></i>Daimond Commission</a>

                <a class="nav-link " id="v-daimondrate-tab" data-bs-toggle="tab" href="#v-daimondrate" role="tab"
                    aria-controls="v-daimondrate" aria-selected="false"><span class="input-group"><i data-feather="dollar-sign"
                            class="me-2"></i>Daimond Rate</a>

                <a class="nav-link " id="v-withdrawrate-tab" data-bs-toggle="tab" href="#v-withdrawrate" role="tab"
                    aria-controls="v-withdrawrate" aria-selected="false"><span class="input-group"><i data-feather="dollar-sign"
                            class="me-2"></i>Daimond Widthdraw Rate</a>


            </div>
        </div>
        <div class="col-7 col-md-9 ps-0">
            <div class="tab-content tab-content-vertical border p-3" id="v-tabContent">
                <div class="tab-pane fade show active" id="v-website" role="tabpanel" aria-labelledby="v-website-tab">
                    @include('admin.settings.inc.website-title')
                </div>

                <div class="tab-pane fade" id="v-agora" role="tabpanel" aria-labelledby="v-agora-tab">
                    @include('admin.settings.inc.agora')
                </div>
                <div class="tab-pane fade" id="v-contact" role="tabpanel" aria-labelledby="v-contact-tab">
                    @include('admin.settings.inc.contact')
                </div>

                <div class="tab-pane fade" id="v-commission" role="tabpanel" aria-labelledby="v-commission-tab">
                    @include('admin.settings.inc.commission')
                </div>
                <div class="tab-pane fade" id="v-daimondrate" role="tabpanel" aria-labelledby="v-daimondrate-tab">
                    @include('admin.settings.inc.daimondrate')
                </div>
                <div class="tab-pane fade" id="v-withdrawrate" role="tabpanel" aria-labelledby="v-withdrawrate-tab">
                    @include('admin.settings.inc.withdrawrate')
                </div>

            </div>
        </div>
    </div>
@endsection
@push('plugin-styles')

@endpush

@push('plugin-scripts')

@endpush

@push('custom-scripts')

@endpush
