@extends('admin')

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
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="all-attachment-area">
                                                <ul class="attachment-menu-view">
                                                <li>Url: <a href="{{ route('blogs.single',"$post->slug")}}">{{ $post->slug }} </a>
                                                    </li>
                                                    <li style="color:green;">Created at: {{ date('j-M-Y h:ia',strtotime($post->created_at)) }} </a>
                                                    </li>
                                                    <li style="color:green">Updated at: {{ date('j-M-Y h:ia',strtotime($post->updated_at)) }} </a>
                                                    </li>

                                                </ul>
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
