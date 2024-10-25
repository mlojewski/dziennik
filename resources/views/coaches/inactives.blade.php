@extends('layouts.template')
@section('content')
    <!-- Page Body Start-->


    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Trenerzy</h4>
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
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Imię</th>
                                                    <th scope="col">Nazwisko</th>
                                                    <th scope="col">Numer telefonu</th>
                                                    <th scope="col">Szkoła uzupełniona?</th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($coaches as $coach)
                                                    <tr>
                                                        <th scope="row">{{$coach->id}}</th>
                                                        <td>{{$coach->name}}</td>
                                                        <td>{{$coach->last_name}}</td>
                                                        <td>{{$coach->phone}}</td>
                                                        <td>
                                                            @if (!empty($coach->schools))
                                                            tak
                                                            @else Nie
                                                            @endif
                                                        
                                                        </td>
                                                        <td><i class="bg-light-danger font-danger" data-feather="alert-triangle"></i><span class="font-danger"><form method="post" action="{{route('coaches.delete', ['id' => $coach->id])}}">
                                @csrf

                                                                    @method('delete')
                                    <button type="submit" class="bg-light-success font-danger"> Usuń</button>
                                                                </form></span></td>

                                                        <td><i class="bg-light-success font-success" data-feather="alert-triangle"></i><span class="font-success"><form method="post" action="{{route('coaches.activate', ['id' => $coach->id])}}">
                                @csrf

                                                                    @method('get')
                                    <button type="submit" class="bg-light-success font-success"> Aktywuj</button>
                                                                </form></span></td>
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
