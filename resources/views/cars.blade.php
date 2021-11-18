@section('page_title', 'Moduł samochodów')

@extends('layouts.app')

@section('content')
    <h1 class="mb-4 text-center">Moduł samochodów</h1>
    <button class="btn btn-primary mb-5 btn-add-car">Dodaj</button>
    <table id="datatable-cars" class="table table-striped table-bordered nowrap">
        <thead>
            <tr>
                <th>ID</th>
                <th class="all">Nazwa samochodu</th>
                <th>Opis</th>
                <th class="desktop ">Cena za dzień</th>
                <th class="desktop ">Klucz (API)</th>
                <th class="desktop ">Typ (API)</th>
                <th class="desktop ">Status</th>
                <th class="all">Akcje</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    @include('cars.edit_modal')
    @include('cars.reservation_modal')
@endsection

@section('javascript')
    <script type="text/javascript">
        const carsDatatableApiUrl = '{{ route('datatable.cars') }}';
    </script>
@endsection
