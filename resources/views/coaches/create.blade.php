@extends('layouts.template')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h4>{{Auth::user()->name}} uzupełnij swoje dane</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
        <div class="card-wrapper border rounded-3">
            <form id="athlete_creation" action="{{route('coaches.store')}}" method="post" class="row g-3">
                {{csrf_field()}}
                <div class="col-md-6">
                    <label class="form-label" for="last_name">Nazwisko</label>
                    <input class="form-control" name="last_name" id="last_name" required="required" type="text" placeholder="Wpisz nazwisko">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="phone">Numer telefonu</label>
                    <input class="form-control" name="phone" id="phone" type="text" required="required" placeholder="Wpisz numer telefonu">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="nip">NIP</label>
                    <input class="form-control" name="nip" id="nip" type="text" required="required" pattern="[0-9]{10}" maxlength="10" placeholder="Wpisz 10-cyfrowy NIP">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="is_b2b">Czy chcesz rozliczać się fakturą?</label>
                    <select class="form-control" name="is_b2b" id="is_b2b" required="required">
                        <option value="1">Tak</option>
                        <option value="0">Nie</option>
                    </select>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Zapisz</button>
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
