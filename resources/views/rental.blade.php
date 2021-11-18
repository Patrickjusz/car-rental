@section('page_title', 'Strona wypożyczalni')

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <h1>@yield('page_title')</h1>
            </div>
            @forelse ($cars as $car)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="item-1">
                        <a href="#"><img src="images/img_{{ RAND(1, 4) }}.jpg" alt="Image" class="img-fluid"></a>
                        <div class="item-1-contents">
                            <div class="text-center">
                                <h3><a href="#">{{ $car->name }}</a></h3>
                                <div class="rating">
                                    <span class="icon-star text-warning"></span>
                                    <span class="icon-star text-warning"></span>
                                    <span class="icon-star text-warning"></span>
                                    <span class="icon-star text-warning"></span>
                                    <span class="icon-star text-warning"></span>
                                </div>
                                <div class="rent-price"><span>{{ $car->price }} zł &#x2f;</span>dzień</div>
                            </div>
                            <ul class="specs">
                                <li>
                                    <span>Drzwi</span>
                                    <span class="spec">{{ RAND(3, 5) }}</span>
                                </li>
                                <li>
                                    <span>Miejsc</span>
                                    <span class="spec">{{ RAND(2, 5) }}</span>
                                </li>
                                <li>
                                    <span>Skrzynia biegów</span>
                                    {{-- Data Mocking! --}}
                                    <span
                                        class="spec">{{ ['Automatyczna', 'Manualna'][array_rand(['Automatyczna', 'Manualna'])] }}</span>
                                </li>
                            </ul>
                            <div class="d-flex action">
                                <a href="#" class="btn btn-primary btn-reservation"
                                    data-id="{{ $car->id }}">Zarezerwuj</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger" role="alert">
                    Brak samochodów!
                </div>
            @endforelse


            <div class="col-12">
                {{ $cars->links() }}
            </div>
        </div>
    </div>

    @include('rental.reservation_modal')
@endsection

@section('javascript')
    <script type="text/javascript">
        const API_KEY_DASHBOARD = '';
        const API_KEY_PUBLIC = "{{ env('API_KEY_PUBLIC') }}";
    </script>
@endsection
