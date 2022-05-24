@extends('layouts.view')
@section('content')
<div class="main" style="min-height:600px;display:flex;align-items:center;padding:20px;">
    <div class="data-table-area mg-b-15" style="margin-left:210px;width:100%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Projects <span class="table-project-n">Data</span> Table</h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control dt-tb">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                    data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                    data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                    data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th>Serial no.</th>
                                            <th>Department Id</th>
                                            <th>Name</th>
                                            <th>Batch</th>
                                            <th>Session</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if (isset($student))
                                    @php
                                        $i = 0;
                                    @endphp
                                        @foreach ($student as $item)
                                        @php
                                            $i++;
                                        @endphp


                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$item->dept_id}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->batch}}</td>
                                            <td>{{$item->session}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->student_phone}}</td>
                                            <td><a href="" class="btn btn-info">Update</a> <a href="" class="btn btn-danger">Delete</a> </td>
                                        </tr>

                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Static Table End -->
</div>
<style>
    .fixed-table-loading{
        display: none;
    }
</style>
@endsection


