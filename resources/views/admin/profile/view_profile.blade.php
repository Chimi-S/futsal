@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box box-widget widget-user">
                        <div class="widget-user-header bg-black">
                            <div class="d-flex align-items-center mb-4">
                                <div class="flex-shrink-0">
                                    <img src="{{(!empty($adminData->profile_photo_path)) ? url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload/no_image.png')}}" alt="Profile" class="img-fluid rounded-circle" style="width: 70px;">
                                </div>
                                <div class="flex-grow-1 mt-4 pl-2">
                                    <div class="d-flex flex-row align-items-center mb-2">
                                        <h4 class="mb-0 me-2">{{ $adminData->name }}</h4>
                                    </div>
                                    <div class="d-flex flex-row align-items-center">
                                        <p class="widget-user-desc">{{ $adminData->email }}</p>
                                    </div>
                                </div>
                                <a href="{{ route('admin.profile.edit') }}" style="float: right;" class="btn btn-rounded btn-success mb-5"> Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>
@endsection