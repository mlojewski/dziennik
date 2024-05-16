@extends('layouts.template')
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Stwórz etap</h4>
                    </div>

                </div>
            </div>
        </div>

        <div class="card-body">
        <div class="card-wrapper border rounded-3">
            <form id="stage_creation" action="{{route('stages.store')}}" method="post" class="row g-3">
                {{csrf_field()}}
                <div class="col-md-12">
                    <label class="form-label" for="name">Nazwa etapu</label>
                    <input class="form-control" name="name" id="name" required="required" type="text" placeholder="Wpisz nazwę etapu">
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="start_date">Data początkowa</label>
                    <input class="form-control" name="start_date" id="start_date" type="date" required="required" placeholder="Wpisz początek etapu">
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="end_date">Data końcowa</label>
                    <input class="form-control" name="end_date" id="end_date" required="required" type="date" placeholder="Wpisz koniec etapu">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Zapisz</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
