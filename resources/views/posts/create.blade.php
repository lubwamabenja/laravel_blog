@extends('admin')

@section('title','|Create Posts')

@section('stylesheets')


    <link rel="stylesheet" href="{{ URL::asset('admin/css/select2/select2.min.css') }}">
    <script src="{{ URL::asset('tinymce/tinymce.min.js')}}"></script>
    <script src="{{ URL::asset('tinymce/tinymce.js')}}"></script>
    <script src="{{ URL::asset('tinymce/jquery.tinymce.min.js')}}"></script>

    <script>
        tinymce.init({
            selector:"#body"
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
                                            <li class="active"><a data-toggle="tab" href="#composemail"><span class="inbox-icon"><i class="fa fa fa-inbox "></i></span> Create Post</a></li>

                                            <li>
                                                {!! Html::linkRoute('posts.index','View Posts',['data-toggle' => "tab", 'class' => 'fa fa fa-inbox inbox-icon']) !!}
                                            </li>
                                            <li>
                                                {!! Html::linkRoute('categories.index','Categories',['data-toggle' => "tab", 'class' => 'fa fa fa-inbox inbox-icon']) !!}
                                            </li>
                                            <li>
                                                {!! Html::linkRoute('tags.index','Tags',['data-toggle' => "tab", 'class' => 'fa fa fa-inbox inbox-icon']) !!}
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

                                                {!! Form::open(['route' => 'posts.store','files' =>true]) !!}
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
                                                        {!! Form::label('category_id', 'Category:') !!}
                                                    </div><br>
                                                    <div class="col-lg-12">
                                                        <select name="category_id" class="form-control" id="">
                                                            @foreach ($categories as $category)

                                                             <option value="{{ $category->id }}">{{ $category->name}}</option>

                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        {!! Form::label('tags', 'Tags:') !!}
                                                    </div><br>
                                                    <div class="col-lg-12">
                                                        <select name="tags[]" class="form-control select-multi" multiple="multiple">
                                                            @foreach ($tags as $tag)

                                                             <option value="{{ $tag->id }}">{{ $tag->name}}</option>

                                                            @endforeach

                                                        </select>
                                                    </div><br>
                                                    <div class="col-lg-3">
                                                        {!! Form::label('featured_image', 'Upload Featured Image:') !!}
                                                    </div><br>
                                                    <div class="col-lg-12">
                                                        {!! Form::file('featured_image', null, ['class' => 'form-control']) !!}
                                                    </div><br>

                                                     <div class="col-lg-2">
                                                            {!! Form::label('body', 'Post Body:') !!}
                                                    </div><br>
                                                    <div class="col-lg-12">
                                                            {!! Form::textarea('body', null, ['class' => 'form-control','id'=>'body']) !!}
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
@section('scripts')
        <script src="{{ URL::asset('admin/css/select2/select2.min.js')}}"></script>
        <script>
            $('.select-multi').select2();
        </script>
@endsection

