@extends('layouts.template')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Wpisz informacje o treningu</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="card-wrapper border rounded-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form id="practice_creation" action="{{ route('practices.store') }}" method="post" class="row g-3">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <label class="form-label" for="warm_up">Rozgrzewka</label>
                        <input class="form-control" name="warm_up" id="warm_up" required="required" type="textarea" placeholder="Wpisz informacje o rozgrzewce (min. 300 znaków)">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="drills">Trening właściwy</label>
                        <input class="form-control" name="drills" id="drills" required="required" type="textarea" placeholder="Wpisz informacje o treningu (min. 300 znaków)">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="date">Data treningu</label>
                        <input class="form-control" name="date" id="date" type="text" required="required" placeholder="Wybierz datę treningu" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="stage">Etap (kliknij by rozwinąć listę)</label>
                        <select class="form-control" name="stage_id" id="stage_id" required="required">
                            <option value="">Wybierz etap</option>
                            @foreach($stages as $stage)
                                @if($stage->edition)
                                    <option value="{{$stage->id}}" 
                                            data-start="{{$stage->start_date}}" 
                                            data-end="{{$stage->end_date}}" 
                                            data-excluded="{{json_encode($stage->edition->excluded_dates ?? [])}}">
                                        {{$stage->name}} ({{$stage->start_date}} - {{$stage->end_date}})
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <!-- Dodana lista rozwijana szkół -->
                    <div class="col-md-12">
                        <label class="form-label" for="school_id">Szkoła</label>
                        <select class="form-control" name="school_id" id="school_id" required="required">
                            <option value="">Wybierz szkołę</option>
                            @foreach($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Dodana sekcja z listą zawodników -->
                    <div class="col-md-12 mt-3" id="athletes-section" style="display: none;">
                        <label class="form-label">Wybierz zawodników</label>
                        <div id="athletes-list">
                            <!-- Tu będą dynamicznie dodawane checkboxy z zawodnikami -->
                        </div>
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
    const dateInput = document.getElementById('date');
    const stageSelect = document.getElementById('stage_id');
    let flatpickrInstance;

    stageSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const startDate = selectedOption.dataset.start;
        const endDate = selectedOption.dataset.end;
        const excludedDates = JSON.parse(selectedOption.dataset.excluded || '[]');

        if (flatpickrInstance) {
            flatpickrInstance.destroy();
        }

        flatpickrInstance = flatpickr(dateInput, {
            minDate: startDate,
            maxDate: endDate,
            disable: excludedDates,
            dateFormat: "Y-m-d",
            onChange: function(selectedDates, dateStr, instance) {
                // Opcjonalnie: możesz tutaj dodać dodatkową logikę
            }
        });

        dateInput.disabled = false;
    });

    // Inicjalnie wyłącz pole daty
    dateInput.disabled = true;

    const schoolSelect = document.getElementById('school_id');
    const athletesSection = document.getElementById('athletes-section');
    const athletesList = document.getElementById('athletes-list');

    schoolSelect.addEventListener('change', function() {
        const schoolId = this.value;
        if (schoolId) {
            fetch(`{{ url('/schools') }}/${schoolId}/athletes`)
                .then(response => response.json())
                .then(athletes => {
                    athletesList.innerHTML = '';
                    athletes.forEach(athlete => {
                        const checkbox = document.createElement('div');
                        checkbox.className = 'form-check';
                        checkbox.innerHTML = `
                            <input class="form-check-input" type="checkbox" name="athletes[]" value="${athlete.id}" id="athlete${athlete.id}">
                            <label class="form-check-label" for="athlete${athlete.id}">
                                ${athlete.name}
                            </label>
                        `;
                        athletesList.appendChild(checkbox);
                    });
                    athletesSection.style.display = 'block';
                })
                .catch(error => console.error('Błąd podczas pobierania zawodników:', error));
        } else {
            athletesSection.style.display = 'none';
        }
    });
});
</script>
@endpush
