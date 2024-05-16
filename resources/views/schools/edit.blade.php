@extends('layouts.template')
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Edytuj szkołę {{$school->name}} </h4>
                    </div>

                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="card-wrapper border rounded-3">
                <form id="coach_edition" action="{{route('schools.update',['id' => $school->id])}}" method="post" class="row g-3">
                    {{csrf_field()}}
                    @method('put')
                    <div class="col-md-6">
                        <label class="form-label" for="name">Nazwa</label>
                        <input value="{{$school->name}}" class="form-control" name="name" id="name" required="required" type="text" placeholder="Wpisz nazwę szkoły">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="city">Miasto</label>
                        <input value="{{$school->city}}" class="form-control" name="city" id="city" required="required" type="text" placeholder="Wpisz nazwę miejscowości">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="address">Adres</label>
                        <input value="{{$school->address}}" class="form-control" name="address" id="address" required="required" type="text" placeholder="Wpisz adres szkoły">
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="postal_code">kod pocztowy</label>
                        <input value="{{$school->postal_code}}" class="form-control" name="postal_code" id="postal_code" required="required" type="text" placeholder="Wpisz kod pocztowy">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Zapisz</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
