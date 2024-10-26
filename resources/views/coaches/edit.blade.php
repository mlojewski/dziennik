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
                    <div class="col-md-6">
                        <label class="form-label" for="phone">Numer kontaktowy trenera</label>
                        <input value="{{$coach->phone}}" class="form-control" name="phone" id="phone" required="required" type="text" placeholder="Wpisz numer kontaktowy trenera">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="licence">Numer licencji trenera</label>
                        <input value="{{$coach->licence}}" class="form-control" name="licence" id="licence" required="required" type="text" placeholder="Wpisz numer licencji trenera">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="nip">NIP</label>
                        <input class="form-control" name="nip" id="nip" type="text" required="required" pattern="[0-9]{10}" maxlength="10" value="{{ $coach->nip }}" placeholder="Wpisz 10-cyfrowy NIP">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="is_b2b">Czy chcesz rozliczać się fakturą?</label>
                        <select class="form-control" name="is_b2b" id="is_b2b" required="required">
                            <option value="1" {{ $coach->is_b2b ? 'selected' : '' }}>Tak</option>
                            <option value="0" {{ !$coach->is_b2b ? 'selected' : '' }}>Nie</option>
                        </select>
                    </div>
                    <!-- Nowe pole dla PESEL -->
                    <div class="col-md-6">
                        <label class="form-label" for="pesel">PESEL</label>
                        <input class="form-control" name="pesel" id="pesel" type="text" pattern="[0-9]{11}" maxlength="11" value="{{ $coach->pesel }}" placeholder="Wpisz 11-cyfrowy PESEL">
                    </div>
                    <!-- Nowe pole dla województwa -->
                    <div class="col-md-6">
                        <label class="form-label" for="voivodeship_id">Województwo</label>
                        <select class="form-control" name="voivodeship_id" id="voivodeship_id">
                            <option value="">Wybierz województwo</option>
                            @foreach($voivodeships as $voivodeship)
                                <option value="{{ $voivodeship->id }}" {{ $coach->voivodeship_id == $voivodeship->id ? 'selected' : '' }}>
                                    {{ $voivodeship->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Zapisz zmiany</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script>
document.getElementById('nip').addEventListener('input', function (e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});
</script>
