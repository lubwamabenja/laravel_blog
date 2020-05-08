@extends('admin')


@section('title','|Description')




    @section('stylesheets')
    <link rel="stylesheet" href="{{ URL::asset('admin/css/form/all-type-forms.css') }}">


    <script src="{{ URL::asset('tinymce/tinymce.min.js')}}"></script>
    <script src="{{ URL::asset('tinymce/tinymce.js')}}"></script>
    <script src="{{ URL::asset('tinymce/jquery.tinymce.min.js')}}"></script>

    <script>
        tinymce.init({
            selector:"#description"
        });
    </script>
    @endsection

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="dual-list-box-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline10-list shadow-reset">
                    <div class="sparkline10-hd">
                        <div class="main-sparkline10-hd">
                            <h1>Website Description</h1>
                            <div class="sparkline10-outline-icon">
                                <span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                <span><i class="fa fa-wrench"></i></span>
                                <span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="sparkline10-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                            @if (is_null($about))
                                <div>No data to edit  <a  href='{{ route('about.create')}}' class ='dropdown-item'>Create one </a></div>

                                @else
                                <div class="col-lg-12">



                                    <div class="dual-list-box-inner">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-lg-3"></div>

                                                            <div class="col-lg-13">
                                                                <div class="login-bg">
                                                                    <div class="row">
                                                                        <div class="col-lg-12" style="text-align:center;">

                                                                                <a href="#"><img  src="{{ asset('images/page/'.$about->image) }}" width="100%" id="blah" alt="your image"></a>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-12" >
                                                                            <h2>Page Description:</h2>
                                                                            <p>{!!$about->description!!}</p>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <div class="col-lg-3"></div>
                                                    </div>
                                                </div>


                                    </div>

                                            <div class="col-md-6">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-lg-3"></div>
                                                                {!! Form::model($about, ['route' => ['about.update',$about->id],'method' =>'PUT',
                                                                'id'=>'adminpro-review-form','class'=>'adminpro-form','enctype' =>'multipart/form-data']) !!}

                                                                    <div class="col-lg-13">
                                                                        <div class="login-bg">
                                                                            <div class="row">
                                                                                <div class="col-lg-12" style="text-align:center;">
                                                                                    <div class="contact-client-content">
                                                                                        <h2><a style="font-size: 35px;" href="#">Description</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </div><br>



                                                                                <div class="row">
                                                                                    <div class="col-lg-3">
                                                                                        <div class="login-input-head">
                                                                                            <p>{!! Form::label('website_image', 'Edit Image:') !!}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-12 ">
                                                                                        <div class="login-input-area">
                                                                                        <div class="file-upload-inner ts-forms">
                                                                                            <div class="input prepend-big-btn">
                                                                                                <label class="icon-right" for="prepend-big-btn">
                                                                                                    <i class="fa fa-download"></i>
                                                                                                </label>
                                                                                                <div class="file-button">
                                                                                                    Browse

                                                                                                    {!! Form::file('website_image', ['onchange'=>'document.getElementById("prepend-big-btn")
                                                                                                    .value = this.value;document.getElementById("blah").src = window.URL.createObjectURL(this.files[0]);']) !!}
                                                                                                </div>
                                                                                                <input type="text" id="prepend-big-btn" placeholder="no file selected">
                                                                                            </div>
                                                                                        </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>


                                                                            <div class="row">
                                                                                <div class="col-lg-2">
                                                                                    <div class="login-input-head">
                                                                                        <p>Description</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12">
                                                                                    <div class="login-textarea-area">
                                                                                        {!! Form::textarea('description', null, ['class' => 'contact-message','cols' =>'30','rows'=>'40','id'=>'description']) !!}

                                                                                        <i class="fa fa-comment login-user"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>



                                                                            <div class="row">
                                                                                <div class="col-lg-4"></div>
                                                                                <div class="col-lg-8">
                                                                                    <div class="login-button-pro">
                                                                                        <button type="submit" class="login-button login-button-lg">Submit Changes</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                {!! Form::close() !!}
                                                                <div class="col-lg-3"></div>
                                                            </div>
                                                        </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>




                            </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
