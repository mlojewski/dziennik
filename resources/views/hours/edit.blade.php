@extends('layouts.template')
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Edytujesz stawkę {{$hour->name}}</h4>
                    </div>

                </div>
            </div>
        </div>
        <div class="card-body">
        <div class="card-wrapper border rounded-3">
            <form id="edition_edition" action="{{route('hours.update', ['id' => $hour->id])}}" method="post" class="row g-3">
                {{csrf_field()}}
                @method('put')
                <div class="col-md-12">
                    <label class="form-label" for="name">Nazwa stawki</label>
                    <input value="{{$hour->name}}" class="form-control" name="name" id="name" required="required" type="text">
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="name">Wartość stawki</label>
                    <input value="{{$hour->value}}" class="form-control" name="value" id="value" required="required" type="number">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Zapisz</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
