@extends('layouts.template')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Stwórz sportowca</h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="card-body">
        <div class="card-wrapper border rounded-3">
            <form id="athlete_creation" action="{{route('athletes.store')}}" method="post" class="row g-3">
                {{csrf_field()}}
                <div class="col-md-6">
                    <label class="form-label" for="name">Imię</label>
                    <input class="form-control" name="name" id="name" required="required" type="text" placeholder="Wpisz imię uczestnika">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="last_name">Nazwisko</label>
                    <input class="form-control" name="last_name" id="last_name" required="required" type="text" placeholder="Wpisz nazwisko uczestnika">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="birth_date">Data urodzenia</label>
                    <input class="form-control" name="birth_date" id="birth_date" type="date" required="required" placeholder="Wpisz datę urodzenia">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="gender">Płeć (kliknij, by dokonać wyboru)</label>
                    <select class="form-control" name="gender" id="gender" required="required">
                        <option value="M">Chłopiec</option>
                        <option value="K">Dziewczynka</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="guardian">Dane opiekuna</label>
                    <input class="form-control" name="guardian" id="guardian" required="required" type="textarea" placeholder="Wpisz dane rodzica/opiekuna">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="guardian_number">Numer kontaktowy opiekuna</label>
                    <input class="form-control" name="guardian_number" id="guardian_number" required="required" type="text" placeholder="Wpisz numer kontaktowy rodzica/opiekuna">
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="school_id">Szkoła</label>
                    <select class="form-control" name="school_id" id="school_id" required="required">
                        <option value="">Wybierz szkołę</option>
                        @foreach($schools as $school)
                            <option value="{{ $school->id }}">{{ $school->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="parent_approval">Potwierdzam posiadanie zgody na uczestnictwo dziecka w zajęciach</label>
                    <input name="parent_approval" id="parent_approval" required="required" type="checkbox" checked>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Zapisz</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
