@extends('layouts.template')
@section('content')
    <!-- Page Body Start-->
        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                            <h4>Edycje</h4>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('editions.create') }}" class="btn" style="background-color: #006666; color: white;">Dodaj edycję</a>
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
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($editions as $edition)
                            <tr>
                                <th scope="row">{{$edition->id}}</th>
                                <td>{{$edition->name}}</td>
                                <td><i class="bg-light-danger font-danger" data-feather="alert-triangle"></i><span class="font-danger"><form method="post" action="{{route('editions.delete', ['id' => $edition->id])}}">
                                @csrf
                                @method('delete')
                                    <button type="submit" class="bg-light-success font-danger"> Usuń</button>
                                                                </form></span></td>
                                <td><a href="{{route('editions.edit', ['id' => $edition->id])}}" > <i class="bg-light-success font-success " data-feather="alert-triangle"></i><span class="font-success">Edytuj</span></a></td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
@endsection
