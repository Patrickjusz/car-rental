@section('page_title', 'Moduł samochodów')

@extends('layouts.app')
@extends('layouts.head')
@extends('layouts.js_links')

@section('content')
    <h1 class="mb-4 text-center">Moduł samochodów</h1>
    <button class="btn btn-primary mb-5 btn-add-car">Dodaj</button>
    <table id="datatable-cars" class="table table-bordered">
        <thead>
            <tr>
                <th></th>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Cena za dzień</th>
                <th>Klucz (API)</th>
                <th>Typ (API)</th>
                <th>Status</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    @include('cars.edit_modal')
@endsection

@section('javascript')
    <script type="text/javascript">
        const carsDatatableApiUrl = '{{ route('datatable.cars') }}';
    </script>
@endsection
