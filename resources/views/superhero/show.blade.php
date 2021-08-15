@extends('layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('superhero.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Superhero Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
{{--                                @dd($superhero)--}}

                                <div class="text-center">
                                    @foreach($superhero->superhero_images as $image)
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{asset('photos/'.$image['filename'])}}"
                                         alt="User profile picture" width="200px">
                                    @endforeach
                                </div>

                                <h3 class="profile-username text-center">{{$superhero->nickname}}</h3>

                                <p class="text-muted text-center">{{$superhero->real_name}}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Description</b><p>{{$superhero->origin_description}}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Superpowers</b><p>{{$superhero->superpowers}}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Catch phrase</b><p>{{$superhero->catch_phrase}}</p>
                                    </li>
                                </ul>

                                <a href="{{route('superhero.edit',$superhero->id)}}" class="btn btn-primary btn-block"><b>Edit</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                    </div>
                    <!-- /.col -->

                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
