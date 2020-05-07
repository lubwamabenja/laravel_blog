@extends('admin')

@section('title','|All Posts ')
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
                            <h1>Posts <span class="table-project-n">Data</span> Table</h1>
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
                                <select class="form-control">
                                    <option value="">All Categories</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary " style="height:35px;padding-top:3px;">Create Post</a>
                            </div>
                            <table id="table" data-toggle="table" data-search="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="id">  ID</th>
                                        <th data-field="title" >Title</th>
                                        <th data-field="body" >Body</th>
                                        <th data-field="created_at" >Created at</th>
                                        <th>Options</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $posts as $post )
                                     <tr>
                                        <td> <strong>{{ $post->id }}</strong> </td>
                                        <td> <strong>{{ $post->title}}</strong></td>
                                        <td>{!! substr($post->body,0,40) !!}{{ strlen($post->body) > 50 ?".....":" "}} </td>
                                        <td>{{ date('M j,Y',strtotime($post->created_at))}}</td>
                                        <td>
                                            {!! Form::open(['route' => ['posts.destroy',$post->id],'method'=>'DELETE']) !!}
                                            <a style="color:#ffffff;padding:8px 20px 8px 20px; margin-left:20px;" href="{{ route('posts.show',$post->id)}}" class="btn btn-success">View</a>
                                            <a style="color:#ffffff;padding:8px 20px 8px 20px; margin-left:10px;" href="{{ route('posts.edit',$post->id)}}" class="btn  btn-primary">Edit</a>
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}

                                        </td>
                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>

                            <div class="text-center">
                                {{ $posts->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection





