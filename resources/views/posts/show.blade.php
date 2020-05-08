@extends('admin')

@section('title','|View post')
@section('task','View Post')
@section('content')




<div class="inbox-mailbox-area mg-b-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="inbox-email-menu-list shadow-reset">
                            <div class="compose-email">
                                <a href="#">Posts</a>
                            </div>
                            <ul class="nav nav-tabs">

                                <li>
                                    {!! Html::linkRoute('posts.create','Create Posts',['data-toggle' => "tab", 'class' => 'fa fa fa-inbox inbox-icon']) !!}
                                </li>
                                <li class="active"><a data-toggle="tab" href="#viewmail"><span class="inbox-icon"><i class="fa fa fa-inbox "></i></span> View Post</a>
                                </li>
                                <li>
                                    {!! Html::linkRoute('categories.index','All categories',['data-toggle' => "tab", 'class' => 'fa fa fa-inbox inbox-icon']) !!}
                                </li>
                                <li>
                                    {!! Html::linkRoute('tags.index','Tags',['data-toggle' => "tab", 'class' => 'fa fa fa-inbox inbox-icon']) !!}
                                </li>



                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                        <div class="tab-content view-mail-ov-mg-t-30">

                            <div id="viewmail" class="tab-pane fade in animated zoomInDown shadow-reset custom-inbox-message active">
                                <div class="view-mail-wrap">
                                    <div class="mail-title">
                                        <h2>View Post</h2>
                                        <div class="view-mail-action view-mail-ov-d-n">

                                            {!! Form::open(['route' => ['posts.destroy',$post->id],'method'=>'DELETE']) !!}
                                            {!! Html::linkRoute('posts.edit','Edit',[$post->id],['class'=> 'btn view-mail-mg-b-10']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                    <div class="main-title-hd">
                                        <h3>Title: <span class="main-title-view">{{ $post->title}}.</span></h3>
                                    </div>

                                    <div class="view-mail-content">
                                        {!! $post->body !!}
                                    </div>
                                    <div class="tags">
                                        @foreach ($post->tags as $tag)
                                             <span class="label label-default">{{ $tag->name}}</span>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="all-attachment-area">
                                                <ul class="attachment-menu-view">
                                                <li> <b>Url:</b> </span> <a href="{{ route('blogs.single',"$post->slug")}}">{{ $post->slug }} </a>
                                                    </li>
                                                    <li><b>Category:</b> {{ $post->category->name }}
                                                    </li>
                                                    <li style="color:green;"><b>Created at:</b> {{ date('j-M-Y h:ia',strtotime($post->created_at)) }} </a>
                                                    </li>
                                                    <li style="color:green"><b>Updated at:</b> {{ date('j-M-Y h:ia',strtotime($post->updated_at)) }} </a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div style="margin-top:10px" class="col-lg-10">
                                            <div class="sparkline8-list shadow-reset">
                                                <div class="sparkline8-hd">
                                                    <div class="main-sparkline8-hd">
                                                    <h1>{{ $post->comments()->count()}} Comments </h1>
                                                        <div class="sparkline8-outline-icon">
                                                            <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                                            <span><i class="fa fa-wrench"></i></span>
                                                            <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="sparkline8-graph">
                                                    <div class="static-table-list">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>

                                                                    <th>Name</th>
                                                                    <th>Email</th>
                                                                    <th>Comment</th>
                                                                    <th>Options</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($post->comments as $comment)


                                                                <tr>
                                                                    <td>{{$comment->name}}</td>
                                                                    <td>{{$comment->email}}</td>
                                                                    <td>{{$comment->comment}}</td>
                                                                <td><a href="{{ route('comments.edit',$comment->id)}}"class="btn btn-xs btn-primary  "><span
                                                                        class="glyphicon glyphicon-pencil"></span></a>
                                                                        <a href="{{ route('comments.delete',$comment->id)}}" class="btn btn-xs btn-danger  "><span
                                                                            class="glyphicon glyphicon-trash"></span></a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
