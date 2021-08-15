@extends('layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Superheroes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('superhero.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Superheroes</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->

            <div class="card card-solid">
                <div class="card-body pb-0">
                    <div class="row">
                        @foreach($superheros as $superhero)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    Superhero
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="ml-4 mb-2 text-muted text-center"><b>{{$superhero->nickname}}</b></h2>
{{--                                            <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>--}}
{{--                                            <ul class="ml-4 mb-0 fa-ul text-muted">--}}
{{--                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>--}}
{{--                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>--}}
{{--                                            </ul>--}}
                                        </div>
                                        <div class="col-5 text-center">
                                            @foreach($superhero->superhero_images as $image)
                                            <img src="{{asset('photos/'.$image['filename'])}}" alt="user-avatar" class="img-thumbnail img-fluid" width="100px">
                                          @break
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <form action="{{route('superhero.destroy',$superhero->id)}}" method="POST">
                                        <a href="{{route('superhero.show',$superhero->id)}}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> View Profile
                                        </a>
                                        <a href="{{route('superhero.edit',$superhero->id)}}" class="btn btn-sm btn-info">
                                            <i class="fas fa-user"></i> Edit Profile
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete Profile</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    <nav aria-label="Contacts Page Navigation">
                        <ul class="pagination justify-content-center m-0">
                            <li class="page-item">{{$superheros->onEachSide(5)->links()}}</li>
                        </ul>
                    </nav>

                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
