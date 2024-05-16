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
            <form id="practice_creation" action="{{route('practices.store')}}" method="post" class="row g-3">
                {{csrf_field()}}
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
                    <input class="form-control" name="date" id="date" type="date" required="required" placeholder="Wybierz datę treningu">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="stage">Etap (kliknij by rozwinąć listę)</label>
                    <select class="form-control" name="stage" id="stage" required="required">
                        @foreach($stages as $stage)
                            <option value="{{$stage->id}}">{{$stage->start_date}} - {{$stage->end_date}}</option>
                        @endforeach
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
