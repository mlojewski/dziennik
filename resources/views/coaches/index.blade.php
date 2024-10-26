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
                                                    
                                                    <th scope="col">Imię</th>
                                                    <th scope="col">Nazwisko</th>
                                                    <th scope="col">Licencja</th>
                                                    <th scope="col">Numer telefonu</th>
                                                    <th scope="col">Szkoły</th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($coaches as $coach)
                                                    <tr>
                                                        <td>{{$coach->name}}</td>
                                                        <td>{{$coach->last_name}}</td>
                                                        <td >{{$coach->licence}}</td>
                                                        <td>{{$coach->phone}}</td>
                                                        <td>
                                                            @if($coach->schools->isEmpty())
                                                                brak
                                                            @else
                                                                @foreach($coach->schools as $school)
                                                                    {{ $school->name }}{{ !$loop->last ? ', ' : '' }}
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <form method="post" action="{{route('coaches.delete', ['id' => $coach->id])}}" style="display: inline-block;">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-link p-0 m-0" style="color: #dc3545; text-decoration: none;">
                                                                    <i class="bg-light-danger font-danger" data-feather="alert-triangle" style="vertical-align: middle; margin-right: 5px;"></i>
                                                                    <span style="vertical-align: middle;">Usuń</span>
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <a href="{{route('coaches.edit', ['id' => $coach->id])}}" class="btn btn-link p-0 m-0" style="color: #28a745; text-decoration: none;">
                                                                <i class="bg-light-success font-success" data-feather="edit" style="vertical-align: middle; margin-right: 5px;"></i>
                                                                <span style="vertical-align: middle;">Edytuj</span>
                                                            </a>
                                                        </td>
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
