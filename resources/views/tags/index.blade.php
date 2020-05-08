@extends('admin')

@section('title','| All Tags')
@section('task','Tags')
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
                            <h1>Tags<span class="table-project-n">Data</span> Table</h1>
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
                                {!! Form::open(['route' => 'tags.store','method' =>'POST']) !!}
                                {{ Form::text('name', null, ['class' => 'form-control','placeholder' =>'Create new tag']) }}
                                {{  Form::submit('Create' ,['class' =>'btn btn-primary btn-block','style'=>'margin-top:8px;margin-bottom:8px']) }}
                                {!! Form::close() !!}
                            </div>

                            <table id="table" data-toggle="table" data-search="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="id">  ID</th>
                                        <th data-field="title" >Title</th>
                                        <th>Options</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $tags as $tag )
                                     <tr>
                                        <td> <strong>{{ $tag->id }}</strong> </td>
                                     <td> <strong><a href="{{ route('tags.show',$tag->id)}}">{{ $tag->name}}</a></strong></td>

                                        <td>
                                            {!! Form::open(['route' => ['tags.destroy',$tag->id],'method'=>'DELETE']) !!}
                                            <a style="color:#ffffff;padding:8px 20px 8px 20px; margin-left:10px;" href="{{ route('tags.show',$tag->id)}}" class="btn  btn-success">View</a>
                                            <a style="color:#ffffff;padding:8px 20px 8px 20px; margin-left:10px;" href="{{ route('tags.edit',$tag->id)}}" class="btn  btn-primary">Edit</a>
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
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
