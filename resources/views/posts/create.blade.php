@extends('admin')



@section('content')
            <div class="inbox-mailbox-area mg-b-40">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="inbox-email-menu-list compose-b-mg-30 shadow-reset">
                                        <div class="compose-email">
                                            <a href="#">Posts</a>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#composemail"><span class="inbox-icon"><i class="fa fa fa-inbox "></i></span> Compose Mail</a></li>

                                            <li>
                                                {!! Html::linkRoute('posts.index','View Posts',['data-toggle' => "tab", 'class' => 'fa fa fa-inbox inbox-icon']) !!}
                                            </li>





                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="tab-content">

                                    <div id="viewmail" href="{{ url('createPost') }}" class="tab-pane fade in animated zoomInDown shadow-reset custom-inbox-message">

                                        </div>
                                        <div id="composemail" class="tab-pane fade in animated zoomInDown shadow-reset custom-inbox-message active">
                                            <div class="view-mail-wrap">
                                                <div class="mail-title">
                                                    <h2>Create Post</h2>
                                                </div>

                                                <!--Form starts here======================================= -->

                                                {!! Form::open(['route' => 'posts.store']) !!}
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                            {!! Form::label('title', 'Title:') !!}
                                                    </div><br>
                                                    <div class="col-lg-12">
                                                        {!! Form::text('title', null, ['class' => 'form-control','required']) !!}
                                                    </div>
                                                    <div class="col-lg-2">
                                                            {!! Form::label('slug', 'Slug:') !!}
                                                    </div><br>
                                                    <div class="col-lg-12">
                                                        {!! Form::text('slug', null, ['class' => 'form-control','required'=>'',
                                                        'minlength'=>'255','minlength'=>'5']) !!}
                                                    </div>
                                                     <div class="col-lg-2">
                                                            {!! Form::label('body', 'Post Body:') !!}
                                                    </div><br>
                                                    <div class="col-lg-12">
                                                            {!! Form::textarea('body', null, ['class' => 'form-control ckeditor']) !!}
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        {!! Form::submit('Create Post',['class' => 'btn btn-primary','style' => 'width:35%']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                        <!--Form ends here======================================= -->












                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




@endsection
