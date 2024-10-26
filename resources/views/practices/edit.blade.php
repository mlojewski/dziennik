@extends('layouts.template')
@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>Edytuj trening {{$practice->id}} </h4>
                    </div>

                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="card-wrapper border rounded-3">
                <form id="coach_edition" action="{{route('practices.update',['id' => $practice->id])}}" method="post" class="row g-3">
                    {{csrf_field()}}
                    @method('put')
                    <div class="col-md-12">
                        <label class="form-label" for="warm_up">Rozgrzewka</label>
                        <textarea class="form-control" name="warm_up" id="warm_up" required="required">{{$practice->warm_up}}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="drills">Ćwiczenia</label>
                        <textarea class="form-control" name="drills" id="drills" required="required" >{{$practice->drills}} </textarea>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label" for="school_display">Szkoła</label>
                        <input type="text" class="form-control" id="school_display" value="{{ $practice->school->name }}" disabled>
                        <!-- Ukryte pole z faktyczną wartością school_id -->
                        <input type="hidden" name="school_id" value="{{ $practice->school_id }}">
                    </div>
                    <div class="col-md-12 mt-3" id="athletes-section">
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
<script>
document.addEventListener('DOMContentLoaded', function() {
    const athletesSection = document.getElementById('athletes-section');
    const athletesList = document.getElementById('athletes-list');
    const practiceAthletes = @json($practice->athletes->pluck('id'));
    const schoolId = {{ $practice->school_id }};

    function loadAthletes() {
        fetch(`{{ url('/schools') }}/${schoolId}/athletes`)
            .then(response => response.json())
            .then(athletes => {
                athletesList.innerHTML = '';
                athletes.forEach(athlete => {
                    const checkbox = document.createElement('div');
                    checkbox.className = 'form-check';
                    checkbox.innerHTML = `
                        <input class="form-check-input" type="checkbox" name="athletes[]" value="${athlete.id}" id="athlete${athlete.id}" ${practiceAthletes.includes(athlete.id) ? 'checked' : ''}>
                        <label class="form-check-label" for="athlete${athlete.id}">
                            ${athlete.name}
                        </label>
                    `;
                    athletesList.appendChild(checkbox);
                });
                athletesSection.style.display = 'block';
            })
            .catch(error => console.error('Błąd podczas pobierania zawodników:', error));
    }

    // Załaduj zawodników przy ładowaniu strony
    loadAthletes();
});
</script>
@endpush
