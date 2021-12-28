@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Bank Account Details</h3>
                            <a href="{{route('qr_code.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5"><i data-feather="plus"></i> Add </a>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>Account Number</th>
                                            <th>QR Code</th>
                                            <th width="25%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $account )
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$account->account_number}}</td>
                                            <td>
                                                <img src="{{ url('upload/qr_code_images/'.$account->qr_code_photo_path) }}" style="width: 100px; width: 100px; border: 1px solid #000000;">
                                            </td>
                                            <td>
                                                <a href="{{ route('qr_code.edit',$account->id) }}" class="btn btn-info">Edit</a>
                                                <a href="{{ route('qr_code.delete',$account->id) }}" class="btn btn-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection