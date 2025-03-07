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
                    <div class="col-md-12">
                        <label class="form-label" for="excluded_dates">Wykluczone daty</label>
                        <input class="form-control" name="excluded_dates" id="excluded_dates" type="text" readonly>
                        <div id="calendar-container"></div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Zapisz</button>
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
        appendTo: document.getElementById('calendar-container'),
        onChange: function(selectedDates, dateStr, instance) {
            // Opcjonalnie: możesz tutaj dodać dodatkową logikę
        }
    });
});
</script>
@endpush
