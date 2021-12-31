@extends('admin.admin_master')
@section('admin')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Time Slot</h4>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="post" action="{{ route('time_slot.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>SL No. <span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <input type="number" name="display_order" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Game Start Time <span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <input type="time" name="start_time" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <div class="form-group">
                                            <label>Game End Time <span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <input type="time" name="end_time" class="form-control" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection