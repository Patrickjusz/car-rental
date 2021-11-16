@section('page_title', 'Moduł samochodów')

@extends('layouts.app')
@extends('layouts.head')
@extends('layouts.js_links')

@section('content')
    <h1 class="mb-4 text-center">Moduł samochodów</h1>
    <table id="datatable-cars" class="table table-bordered">
        <thead>
            <tr>
                <th></th>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Cena za dzień</th>
                <th>Dostępne</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
@endsection

@section('javascript')
    <script type="text/javascript">
        const carsDatatableApiUrl = '{{ route('datatable.cars') }}';
    </script>
@endsection
