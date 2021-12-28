@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pricing List</h3>
                            <a href="{{route('pricing.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5"><i data-feather="plus"></i> Add</a>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>Rate (Nu.)</th>
                                            <th>Timing</th>
                                            <th>Type</th>
                                            <th width="25%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($allData as $key => $pricing )
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$pricing->pricing}}</td>
                                            <td>{{$pricing->time}}</td>
                                            <td>{{$pricing->type}}</td>
                                            <td>
                                                <a href="{{ route('pricing.edit',$pricing->id) }}" class="btn btn-info">Edit</a>
                                                <a href="{{ route('pricing.delete',$pricing->id) }}" class="btn btn-danger" id="delete">Delete</a>
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