@extends('layouts.template')
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Edytuj etap</h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="card-wrapper border rounded-3">
                <form id="stage_edit" action="{{ route('stages.update', $stage->id) }}" method="post" class="row g-3">
                    @csrf
                    @method('PUT')
                    <div class="col-md-4">
                        <label class="form-label" for="name">Nazwa etapu</label>
                        <input class="form-control" name="name" id="name" required="required" type="text" value="{{ old('name', $stage->name) }}" placeholder="{{ old('name', $stage->name) }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="edition_id">Edycja</label>
                        <select class="form-control" name="edition_id" id="edition_id" required="required">
                            <option value="">Wybierz edycję</option>
                            @foreach($editions as $edition)
                                <option value="{{ $edition->id }}" {{ $stage->edition_id == $edition->id ? 'selected' : '' }}>
                                    {{ $edition->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="limit">Limit treningów w edycji</label>
                        <input class="form-control" name="limit" id="limit" type="number" step="1" value="{{ old('limit', $stage->limit) }}" placeholder="{{ old('limit', $stage->limit) }} ">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="start_date">Data początkowa</label>
                        <input class="form-control" name="start_date" id="start_date" type="date" required="required" value="{{ old('start_date', $stage->start_date) }}" placeholder="Wpisz początek etapu">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="end_date">Data końcowa</label>
                        <input class="form-control" name="end_date" id="end_date" required="required" type="date" value="{{ old('end_date', $stage->end_date) }}" placeholder="Wpisz koniec etapu">
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Zapisz zmiany</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
