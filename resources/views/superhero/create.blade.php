@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{isset($superhero)?'About superhero:':'Create superhero:'}}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('superhero.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Create superhero</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST"
                  @if (isset($superhero))
                  action="{{route('superhero.update',$superhero)}}"
                  @else
                  action="{{route('superhero.store')}}"
                @endif  >
                @csrf
                @isset($superhero)
                    @method('PUT')
                @endisset
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{isset($superhero)?'About superhero:':'Create superhero:'}}
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Nik name</label>
                                    <input type="text" name="nickname" placeholder="nickname" aria-label="nickname"
                                           value="{{old('nickname',isset($superhero) ? $superhero->nickname:null)}}" class="form-control" >
                                    @error('nickname')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Real name</label>
                                    <input type="text" name="real_name" placeholder="real_name" aria-label="real_name"
                                           value="{{old('real_name',isset($superhero) ? $superhero->real_name:null)}}" class="form-control" rows="4">
                                    @error('real_name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputPhone">Origin description</label>
                                    <input type="text" name="origin_description" placeholder="origin_description" aria-label="origin_description"
                                           value="{{old('origin_description',isset($superhero) ? $superhero->origin_description:null)}}" class="form-control" rows="4">
                                    @error('origin_description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Superpowers</label>
                                    <input type="text" name="superpowers" placeholder="superpowers" aria-label="superpowers"
                                           value="{{old('superpowers',isset($superhero) ? $superhero->superpowers:null)}}" class="form-control" rows="4">
                                    @error('superpowers')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Catch phrase</label>
                                    <input type="text" name="catch_phrase" placeholder="catch_phrase" aria-label="catch_phrase"
                                           value="{{old('catch_phrase',isset($superhero) ? $superhero->catch_phrase:null)}}" class="form-control" rows="4">
                                    @error('catch_phrase')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{route('superhero.index')}}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" value="Create new Client" class="btn btn-success float-right">{{isset($superhero)?'Update superhero':'Create superhero'}}</button>
                    </div>
                </div>
            </form>

        </section>

        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->

@endsection
