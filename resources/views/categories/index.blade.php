@extends('admin')
@section('task','Categories')
@section('title','| All Categories')
@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <div class="sparkline13-list shadow-reset">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Categories <span class="table-project-n">Data</span> Table</h1>
                            <div class="sparkline13-outline-icon">
                                <span class="sparkline13-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                <span><i class="fa fa-wrench"></i></span>
                                <span class="sparkline13-collapse-close"><i class="fa fa-times"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                            </div>







                            <div class="col-md-4">
                                {!! Form::open(['route' => 'categories.store','method' =>'POST']) !!}
                                {{ Form::text('name', null, ['class' => 'form-control','placeholder' =>'Create new category']) }}
                                {{  Form::submit('Create' ,['class' =>'btn btn-primary btn-block','style'=>'margin-top:8px;margin-bottom:8px']) }}
                                {!! Form::close() !!}
                            </div>

                            <table id="table" data-toggle="table" data-search="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="id">  ID</th>
                                        <th data-field="title" >Title</th>
                                        <th data-field="created_at" >Created at</th>
                                        <th>Options</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $categories as $category )
                                     <tr>
                                        <td> <strong>{{ $category->id }}</strong> </td>
                                        <td> <strong>{{ $category->name}}</strong></td>
                                        <td>{{ date('M j,Y',strtotime($category->created_at))}}</td>
                                        <td>

                                            <a style="color:#ffffff;padding:8px 20px 8px 20px; margin-left:20px;" href="#" class="btn btn-success">View</a>
                                            <a style="color:#ffffff;padding:8px 20px 8px 20px; margin-left:10px;" href="#" class="btn  btn-primary">Edit</a>


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
    </div>
</div>


@endsection
