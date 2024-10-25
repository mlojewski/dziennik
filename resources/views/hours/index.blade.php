@extends('layouts.template')
@section('content')
    <!-- Page Body Start-->
        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                            <h4>Stawki</h4>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">

                    <div class="table-responsive signal-table custom-scrollbar">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nazwa</th>
                                <th scope="col">Wartość</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($hours as $hour)
                            <tr>
                                <th scope="row">{{$hour->id}}</th>
                                <td>{{$hour->name}}</td>
                                <td>{{$hour->value}}</td>
                                <td><i class="bg-light-danger font-danger" data-feather="alert-triangle"></i><span class="font-danger"><form method="post" action="{{route('hours.delete', ['id' => $hour->id])}}">
                                @csrf
                                @method('delete')
                                    <button type="submit" class="bg-light-success font-danger"> Usuń</button>
                                                                </form></span></td>
                                <td><a href="{{route('hours.edit', ['id' => $hour->id])}}" > <i class="bg-light-success font-success " data-feather="alert-triangle"></i><span class="font-success">Edytuj</span></a></td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
@endsection
