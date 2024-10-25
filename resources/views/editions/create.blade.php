@extends('layouts.template')
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Stwórz edycję</h4>
                    </div>

                </div>
            </div>
        </div>

        <div class="card-body">
        <div class="card-wrapper border rounded-3">
            <form id="edition_creation" action="{{route('editions.store')}}" method="post" class="row g-3">
                {{csrf_field()}}
                <div class="col-md-12">
                    <label class="form-label" for="name">Nazwa edycji</label>
                    <input class="form-control" name="name" id="name" required="required" type="text" placeholder="Wpisz nazwę etapu">
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Zapisz</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
