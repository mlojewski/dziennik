@extends('layouts.template')
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Edytuj trenera {{$coach->name}} {{$coach->last_name}}</h4>
                    </div>

                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="card-wrapper border rounded-3">
                <form id="coach_edition" action="{{route('coaches.update',['id' => $coach->id])}}" method="post" class="row g-3">
                    {{csrf_field()}}
                    @method('put')
                    <div class="col-md-6">
                        <label class="form-label" for="name">Imię</label>
                        <input value="{{$coach->name}}" class="form-control" name="name" id="name" required="required" type="text" placeholder="Wpisz imię trenera">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="last_name">Nazwisko</label>
                        <input value="{{$coach->last_name}}" class="form-control" name="last_name" id="last_name" required="required" type="text" placeholder="Wpisz nazwisko trenera">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="phone">Numer kontaktowy trenera</label>
                        <input value="{{$coach->phone}}" class="form-control" name="phone" id="phone" required="required" type="text" placeholder="Wpisz numer kontaktowy trenera">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Zapisz</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
