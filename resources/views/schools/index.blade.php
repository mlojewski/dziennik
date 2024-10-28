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
                                                        <td class="text-center" style="min-width: 300px;">
                                                            <div class="d-flex justify-content-center" role="group" aria-label="Akcje dla szkoły">
                                                                <a href="{{ route('schools.edit', ['id' => $school->id]) }}" class="btn btn-sm btn-outline-primary mr-2" title="Edytuj">
                                                                    <i data-feather="edit-2" class="feather-icon"></i>
                                                                    <span>Edytuj</span>
                                                                </a>
                                                                <a href="{{ route('getSchoolStats', ['schoolId' => $school->id]) }}" class="btn btn-sm btn-outline-info mr-2" title="Raport">
                                                                    <i data-feather="file-text" class="feather-icon"></i>
                                                                    <span>Raport</span>
                                                                </a>
                                                                <form method="post" action="{{ route('schools.delete', ['id' => $school->id]) }}" class="d-inline">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Usuń" onclick="return confirm('Czy na pewno chcesz usunąć tę szkołę?')">
                                                                        <i data-feather="trash-2" class="feather-icon"></i>
                                                                        <span>Usuń</span>
                                                                    </button>
                                                                </form>
                                                            </div>
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
