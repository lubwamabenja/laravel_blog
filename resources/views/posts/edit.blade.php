@extends('admin')



@section('tinymce')
    <script src="{{URL::asset('tinymce/tinymce.min.js')}}"></script>
    <script src="{{URL::asset('tinymce/tinymce.js')}}"></script>
    <script src="{{URL::asset('tinymce/jquery.tinymce.min.js')}}"></script>

    <script>
        tinymce.init({
            selector:"#postContent",
            plugins: "advlist lists checklist fullscreen insertdatetime anchor autoresize\
             autosave bbcode casechange table advtable searchreplace spellchecker toc media template\
             align image paste textcolor",
            toolbar: "numlist checklist fullscreen anchor insertdatetime restoredraft casechange table\
            searchreplace spellchecker toc media template align image imagetools paste forecolor backcolor",
            menubar: "file insert format view edit tools ",
            formats:{
                bold:{inline : 'b'},
                italic:{ inline : 'i'},
                underline: { inline : 'u'}
            }

        });
    </script>

  @endsection



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
                                            <li>
                                                {!! Html::linkRoute('posts.create','Create Posts',['data-toggle' => "tab", 'class' => 'fa fa fa-inbox inbox-icon']) !!}
                                            </li>
                                            <li>{!! Html::linkRoute('posts.index','All Posts',['data-toggle' => "tab", 'class' => 'fa fa fa-inbox inbox-icon']) !!}
                                            </li>
                                            <li class="active"><a data-toggle="tab" href=" #"><span class="inbox-icon"><i class="fa fa fa-inbox "></i></span> Edit Post</a>
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="tab-content">

                                        <div id="composemail"  class="tab-pane fade in animated zoomInDown shadow-reset custom-inbox-message active">
                                            <div  class="view-mail-wrap">
                                                <div class="mail-title">
                                                    <h2>Edit Post</h2>
                                                </div>
                                                <div class="row" style="margin-left:20px;">


                                                <!--Form starts here======================================= -->

                                                {!! Form::model($post, ['route' => ['posts.update',$post->id],'method' =>'PUT']) !!}
                                                <div class="row">
                                                    <div class="col-lg-2"><br>
                                                            {!! Form::label('title', 'Title:') !!}

                                                    </div>
                                                    <div   class="col-lg-12">
                                                        {!! Form::text('title', null, ['class' => 'form-control']) !!}

                                                    </div>
                                                    <div  class="col-lg-2"><br>
                                                            {!! Form::label('slug', 'Slug:',['style' => 'margin-top:0px']) !!}

                                                    </div>
                                                    <div  class="col-lg-12">
                                                        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                                                    </div>
                                                     <div  class="col-lg-2"><br>
                                                            {!! Form::label('body', 'Post Body:',['style' => 'margin-top:0px']) !!}

                                                    </div>
                                                    <div class="col-lg-12">

                                                            {!! Form::textarea('body', null, ['class' => 'form-control ckeditor']) !!}

                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="all-attachment-area">
                                                            <ul class="attachment-menu-view">
                                                                <li>Created at: {{ date('j-M-Y h:ia',strtotime($post->created_at)) }} </a>
                                                                </li>
                                                                <li>Updated at: {{ date('j-M-Y h:ia',strtotime($post->updated_at)) }} </a>
                                                                </li>
                                                                <li></li>
                                                                {!! Html::linkRoute('posts.show','cancel',[$post->id],['class'=> 'btn btn-danger ']) !!}

                                                                {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}



                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                            {!! Form::close() !!}
                                        </div>
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



