@extends('layouts.template')
@section('content')
    <!-- Page Body Start-->


    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Treningi </h4>
                    </div>

                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="email-wrap bookmark-wrap">
                <div class="row">
                    <div class="col-xl-12 col-md-12 box-col-12">
                        <div class="md-sidebar"><a class="btn btn-primary md-sidebar-toggle" href="javascript:void(0)">contact filter</a>
                            <div class="md-sidebar-aside job-left-aside custom-scrollbar">
                                <div class="email-left-aside">
                                    <div class="card">
                                        <div class="table-responsive signal-table custom-scrollbar">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Szkoła</th>
                                                    <th scope="col">Data</th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($practices as $practice)
                                                    <tr>
                                                        <th scope="row">{{$practice->id}}</th>
                                                        <th scope="row">{{$practice->school->name}}</th>
                                                        <td>{{$practice->date}}</td>
                                                        <td><i class="bg-light-danger font-danger" data-feather="alert-triangle"></i><span class="font-danger"><form method="post" action="{{route('practices.delete', ['id' => $practice->id])}}">
                                @csrf

                                                                    @method('delete')
                                    <button type="submit" class="bg-light-success font-danger"> Usuń</button>
                                                                </form></span></td>
                                                        <td><a href="{{route('practices.edit', ['id' => $practice->id])}}" > <i class="bg-light-success font-success " data-feather="alert-triangle"></i><span class="font-success">Edytuj</span></a></td>

                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
