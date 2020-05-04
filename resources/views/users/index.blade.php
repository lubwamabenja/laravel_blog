@extends('admin')

@section('title','|All Users')


@section('content')


<div class="contact-clients-area mg-b-40">
    <div class="container-fluid">
        <div class="row">
            @foreach ($users as $user)


            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"  style="margin-top: 10px">
                <div class="contact-client-single ct-client-b-mg-30 ct-client-b-mg-30-n shadow-reset">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="contact-client-img">
                                <a href="{{route('users.edit',$user->id)}}"><img src="{{ asset('images/profile/'.$user->image) }}" alt="" />
                                </a>
                                <h1><a id="group" data-type="select" data-pk="1" data-value="5" data-source="/groups" data-title="Select group" href="{{route('users.edit',$user->id)}}">Admin</a></h1>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="contact-client-content">
                                <h2><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></h2>
                            </div>
                            <div class="contact-client-address">
                                <p class="address-client-ct"><strong>Name:</strong> <span style="color: #1760be;">{{$user->name}}</span></p>
                                <p class="address-client-ct"><strong>Email:</strong> <span style="color: #1760be;">{{$user->email}}</span></p>
                                <p class="address-client-ct"><strong>Posts:</strong> <span style="color: #1760be;">{{$user->posts()->count()}}</span></p>
                                <p class="address-client-ct"><strong>Views:</strong><span style="color: #1760be;">  {{$user->posts()->sum('views')}}</span></p>
                                <p><strong>Role:</strong> Admin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach



        </div>

    </div>
</div>

@endsection
