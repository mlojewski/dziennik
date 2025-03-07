@extends('layouts.template')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Stwórz szkołę</h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="card-body">
        <div class="card-wrapper border rounded-3">
            <form id="school_creation" action="{{route('schools.store')}}" method="post" class="row g-3">
                {{csrf_field()}}
                <div class="col-md-12">
                    <label class="form-label" for="name">Nazwa</label>
                    <input class="form-control" name="name" id="name" required="required" type="text" placeholder="Wpisz nazwę szkoły">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="address">Adres</label>
                    <input class="form-control" name="address" id="address" required="required" type="textarea" placeholder="Wpisz adres szkoły">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="city">Miasto</label>
                    <input class="form-control" name="city" id="city" required="required" type="text" placeholder="Wpisz nazwę miejscowości">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="postal_code">Kod pocztowy</label>
                    <input class="form-control" name="postal_code" id="postal_code" type="text" required="required" placeholder="Wpisz kod pocztowy">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="schedule">Terminy treningów (wpisz planowane dni tygodnia i godziny)</label>
                    <input class="form-control" name="schedule" id="schedule" type="textarea" placeholder="Wpisz terminy treningów">
                </div>
                
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Zapisz</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
