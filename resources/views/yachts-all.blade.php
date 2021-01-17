@extends('layouts/page')

@section('title', 'All yachts')

@section('content')
    <div class="yachts-list__wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('template-parts/search-form-left')
                </div>
                <div class="col-lg-9">

                    @include('template-parts/offers-tabs')

                    @if($reserved)
                        <p>No results</p>

                    @else

                    <div class="yachts-list">
                        @foreach($yachts as $yacht)
                            {{-- Yacht Item --}}

                            <div class="d-flex yacht-item">
                                <div class="yacht-item_image" style="background-image: url({{ asset('storage/images/'.$yacht->main_image) }})">

                                </div>
                                <div class="yacht-item_card d-flex flex-column justify-content-between">
                                    <div class="yacht-item_card_info-section">

                                        <span class="yacht-item_name">{{ $yacht->name }}</span>
                                        <span class="yacht-item-param">Location: {{ $yacht->location }}</span>
                                        <span class="yacht-item-param">{{ $yacht->skippered }}</span>
                                        <span class="yacht-item-param">Cabins: {{ $yacht->cabins }}</span>
                                        <span class="yacht-item-param">Guests: {{ $yacht->max_guests }}</span>


                                    </div>
                                    <div class="yacht-item_card_price-section d-flex justify-content-between">

                                        <p><span>From: </span> &euro;{{ $yacht->base_price }} </p>
                                        <a href="{{ route("YachtItem", [
    'id' => $yacht->id,
    'period'=> $startDate. '-' .$endDate,


    ]) }}" class="see-more_btn d-flex align-items-center">View Details <i class="fa fa-arrow-right" aria-hidden="true"></i></a>

                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>

                        @endif

                </div>
            </div>
        </div>
    </div>
@endsection
