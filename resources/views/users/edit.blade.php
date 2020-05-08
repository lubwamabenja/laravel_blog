@extends('admin')

@section('title','|User Profile')
@section('task','Edit Profile')



    @section('stylesheets')
    <link rel="stylesheet" href="{{ URL::asset('admin/css/form/all-type-forms.css') }}">
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
                            <h1>User Profile</h1>
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
                                <div class="col-lg-12">
                                    <div class="dual-list-box-inner">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-lg-3"></div>

                                                            <div class="col-lg-13">
                                                                <div class="login-bg">
                                                                    <div class="row">
                                                                        <div class="col-lg-12" style="text-align:center;">
                                                                            <div class="contact-client-content">
                                                                                <h2><a href="#"><img style="border-radius: 100%" src="{{ asset('images/profile/'.$user->image) }}" width="200px" height="40px" id="blah" alt="your image"></a></h2>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">


                                                                        <div class="contact-client-address">
                                                                            <p class="address-client-ct"><strong>Name:</strong> <span  style="font-weight: 100">{{$user->name}}</span></p>
                                                                            <p class="address-client-ct"><strong>Email:</strong> <span  style="font-weight: 100">{{$user->email}}</span></p>
                                                                            <p class="address-client-ct"><strong>Posts:</strong> <span  style="font-weight: 100">{{$user->posts()->count()}}</span></p>
                                                                            <p class="address-client-ct"><strong>Views:</strong><span  style="font-weight: 100">  {{$user->posts()->sum('views')}}</span></p>
                                                                            <p><strong>Role:</strong> Admin</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <div class="col-lg-3"></div>
                                                    </div>
                                                </div>


                                    </div>

                                            <div class="col-md-7">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-lg-3"></div>
                                                                {!! Form::model($user, ['route' => ['users.update',$user->id],'method' =>'PUT',
                                                                'id'=>'adminpro-review-form','class'=>'adminpro-form','enctype' =>'multipart/form-data']) !!}

                                                                    <div class="col-lg-13">
                                                                        <div class="login-bg">
                                                                            <div class="row">
                                                                                <div class="col-lg-12" style="text-align:center;">
                                                                                    <div class="contact-client-content">
                                                                                        <h2><a style="font-size: 35px;" href="#">User Details</a></h2>
                                                                                    </div>
                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <div class="login-input-head">
                                                                                        <p>User Name</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    <div class="login-input-area">
                                                                                        {!! Form::text('name', null) !!}
                                                                                        <i class="fa fa-user login-user" aria-hidden="true"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <div class="login-input-head">
                                                                                        <p>Email Address</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    <div class="login-input-area">
                                                                                        {!! Form::email('email', null,['disabled'])!!}
                                                                                        <i class="fa fa-envelope login-user" aria-hidden="true"></i>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                                <div class="row">
                                                                                    <div class="col-lg-4">
                                                                                        <div class="login-input-head">
                                                                                            <p>{!! Form::label('profile_image', 'Edit Image:') !!}</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-8 ">
                                                                                        <div class="login-input-area">
                                                                                        <div class="file-upload-inner ts-forms">
                                                                                            <div class="input prepend-big-btn">
                                                                                                <label class="icon-right" for="prepend-big-btn">
                                                                                                    <i class="fa fa-download"></i>
                                                                                                </label>
                                                                                                <div class="file-button">
                                                                                                    Browse

                                                                                                    {!! Form::file('profile_image', ['onchange'=>'document.getElementById("prepend-big-btn")
                                                                                                    .value = this.value;document.getElementById("blah").src = window.URL.createObjectURL(this.files[0]);']) !!}
                                                                                                </div>
                                                                                                <input type="text" id="prepend-big-btn" placeholder="no file selected">
                                                                                            </div>
                                                                                        </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>


                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <div class="login-input-head">
                                                                                        <p>Biography</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-8">
                                                                                    <div class="login-textarea-area">
                                                                                        {!! Form::textarea('bio', null, ['class' => 'contact-message','cols' =>'30','rows'=>'10']) !!}

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
