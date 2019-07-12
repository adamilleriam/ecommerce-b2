@extends('layouts.backend.master')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Search box</h4>
                    <div class="box-controls pull-right">
                        <a href="{{ route('category.create') }}" class="btn btn-info btn-sm pull-right">Add New</a>
                        <div class="lookup lookup-circle lookup-right">
                            <input type="text" name="s">
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>Invoice</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Country</th>
                            </tr>
                            <tr>
                                <td><a href="javascript:void(0)">Order #123456</a></td>
                                <td>Lorem Ipsum</td>
                                <td><span class="text-muted"><i class="fa fa-clock-o"></i> Oct 16, 2017</span> </td>
                                <td>$158.00</td>
                                <td><span class="label label-danger">Pending</span></td>
                                <td>CH</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection