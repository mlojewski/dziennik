@extends('layouts.template')
@section('content')
    <!-- Page Body Start-->


    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Etapy</h4>
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
                                        <div class="card-body">
                                            <div class="card-wrapper border rounded-3">
                                                <form id="athlete_edition" action="{{route('athletes.update',['id' => $athlete->id])}}" method="post" class="row g-3">
                                                    {{csrf_field()}}
                                                    @method('put')
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="name">Imię</label>
                                                        <input value="{{$athlete->name}}" class="form-control" name="name" id="name" required="required" type="text" placeholder="Wpisz imię uczestnika">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="last_name">Nazwisko</label>
                                                        <input value="{{$athlete->last_name}}" class="form-control" name="last_name" id="last_name" required="required" type="text" placeholder="Wpisz nazwisko uczestnika">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="birth_date">Data urodzenia</label>
                                                        <input value="{{$athlete->birth_date}}"class="form-control" name="birth_date" id="birth_date" type="date" required="required" placeholder="Wpisz datę urodzenia">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="gender">Płeć (kliknij, by dokonać wyboru)</label>
                                                        <select class="form-control" name="gender" id="gender" required="required">
                                                            <option value="Chłopiec">Chłopiec</option>
                                                            <option value="Dziewczynka">Dziewczynka</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="guardian">Dane opiekuna</label>
                                                        <input value="{{$athlete->guardian}}" class="form-control" name="guardian" id="guardian" required="required" type="textarea" placeholder="Wpisz dane rodzica/opiekuna">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label" for="guardian_number">Numer kontaktowy opiekuna</label>
                                                        <input value="{{$athlete->guardian_number}}" class="form-control" name="guardian_number" id="guardian_number" required="required" type="text" placeholder="Wpisz numer kontaktowy rodzica/opiekuna">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="form-label" for="school_id">Szkoła</label>
                                                        <select class="form-control" name="school_id" id="school_id" required="required">
                                                            <option value="">Wybierz szkołę</option>
                                                            @foreach($schools as $school)
                                                                <option value="{{ $school->id }}" {{ $athlete->school_id == $school->id ? 'selected' : '' }}>
                                                                    {{ $school->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn btn-primary" type="submit">Zapisz</button>
                                                    </div>
                                                </form>
                                            </div>
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
