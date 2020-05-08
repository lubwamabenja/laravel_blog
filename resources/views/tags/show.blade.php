@extends('admin')

@section('title',"| $tag->name Tag")
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
                        <h1><b>{{ $tag->name }} Tag</b> <span class="table-project-n" style="color:green"> {{ $tag->posts()->count()}} Posts</span></h1>
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
                                <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-lg btn-block btn-primary " style="height:35px;padding-top:3px;"><b> Edit Tag</b></a>
                            </div>
                            <table id="table" data-toggle="table" data-search="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="id">  ID</th>
                                        <th data-field="title" >Title</th>
                                        <th data-field="body" >Tags</th>
                                        <th data-field="created_at" >Options</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $tag->posts as $post )
                                     <tr>
                                        <td> <strong>{{ $post->id }}</strong> </td>
                                        <td> <strong>{{ $post->title}}</strong></td>
                                        <td>@foreach ($post->tags as $tag)
                                            <span class="label label-default " style="margin-left:5px;">
                                                {{ $tag->name  }}
                                            </span>
                                        @endforeach</td>
                                        <td><a style="color:#ffffff" href="{{ route('posts.show',$post->id)}}" class="btn btn-success">View</a></td>

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
