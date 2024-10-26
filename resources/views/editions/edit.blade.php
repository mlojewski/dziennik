@extends('layouts.template')
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Edytujesz edycję {{$edition->name}}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
        <div class="card-wrapper border rounded-3">
            <form id="edition_edit" action="{{ route('editions.update', $edition->id) }}" method="post" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                    <label class="form-label" for="name">Nazwa edycji</label>
                    <input class="form-control" name="name" id="name" required="required" type="text" value="{{ old('name', $edition->name) }}" placeholder="Wpisz nazwę edycji">
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="excluded_dates">Wykluczone daty</label>
                    <input class="form-control" name="excluded_dates" id="excluded_dates" type="text" value="{{ old('excluded_dates', is_array($edition->excluded_dates) ? implode(',', $edition->excluded_dates) : $edition->excluded_dates) }}" readonly>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Zapisz zmiany</button>
                </div>
            </form>
        </div>
    </div>
    </div>

@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    flatpickr("#excluded_dates", {
        mode: "multiple",
        dateFormat: "Y-m-d",
        conjunction: ",",
        inline: true,
        defaultDate: {!! json_encode(old('excluded_dates', $edition->excluded_dates)) !!},
        onChange: function(selectedDates, dateStr, instance) {
            // Opcjonalnie: możesz tutaj dodać dodatkową logikę
        }
    });
});
</script>
@endpush
