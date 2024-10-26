@extends('layouts.template')
@section('content')
    <!-- Page Body Start-->
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Szkoły</h4>
                        @if(isset($coach))
                            <h5>Trener: {{ $coach->name }} {{ $coach->last_name }}</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="email-wrap bookmark-wrap">
                <div class="row">
                    <div class="col-xl-12 col-md-12 box-col-12">
                        <div class="md-sidebar">
                            <div class="md-sidebar-aside job-left-aside custom-scrollbar">
                                <div class="email-left-aside">
                                    <div class="card">
                                        <div class="table-responsive signal-table custom-scrollbar">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Nazwa</th>
                                                    <th scope="col">Miasto</th>
                                                    @if(!isset($coach))
                                                        <th scope="col">Trenerzy</th>
                                                    @endif
                                                    <th scope="col"></th>
                                                    <th scope="col"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($schools as $school)
                                                    <tr>
                                                        <th scope="row">{{$school->id}}</th>
                                                        <td>{{$school->name}}</td>
                                                        <td>{{$school->city}}</td>
                                                        @if(!isset($coach))
                                                            <td>
                                                                @foreach($school->coaches as $schoolCoach)
                                                                    {{ $schoolCoach->name }} {{ $schoolCoach->last_name }}@if(!$loop->last), @endif
                                                                @endforeach
                                                            </td>
                                                        @endif
                                                        <td>
                                                            <i class="bg-light-danger font-danger" data-feather="alert-triangle"></i><span class="font-danger"><form method="post" action="{{route('schools.delete', ['id' => $school->id])}}">
                                @csrf

                                                                    @method('delete')
                                    <button type="submit" class="bg-light-success font-danger"> Usuń</button>
                                                                </form></span></td>
                                                        <td><a href="{{route('schools.edit', ['id' => $school->id])}}" > <i class="bg-light-success font-success " data-feather="alert-triangle"></i><span class="font-success">Edytuj</span></a></td>
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
