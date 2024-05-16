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
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Zapisz</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
