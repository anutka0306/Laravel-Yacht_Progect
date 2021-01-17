@extends('layouts/page')

@section('title', 'Yacht')

@php
    {{
        $below_equipment_items = explode('&', $yacht->below_deck_equipment);
        $above_equipment_items = explode('&', $yacht->above_deck_equipment);

    }}
@endphp

@section('content')
    <div class="yachts-list__wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('template-parts/book-form-card')
                </div>
                <div class="col-lg-9">
                    <div class="yacht-page__wrapper">

                        <div class="yacht-page__header">
                           <h1>{{ $yacht->name }}</h1>
                            <p class="yacht-page__header_small-title">
                                {{ $yacht->location }}
                            </p>
                        </div>

                        @include('template-parts/yacht-gallery')

                        <div class="yacht-page__specifications">
                            <div class="yacht-page__specifications_header">
                                <h2>{{ $yacht->name }}</h2>
                                <p>{{ $yacht->location }}</p>
                                <div class="yacht-page__specifications_header_main-spec">
                                    <span>{{ $yacht->skippered }}</span>
                                    <span>Max guests: {{ $yacht->max_guests }}</span>
                                    <span>berths: {{ $yacht->berths }}</span>
                                    <span>bathrooms: {{ $yacht->bathrooms }}</span>

                                </div>
                            </div>

                            <hr class="grey-hr">

                            <div class="yacht-page__specifications_about">
                                <h3>About</h3>
                                {{ $yacht->description }}
                            </div>

                            <hr class="grey-hr">

                            <div class="yacht-page__specifications_specifications">
                                <h3>Specifications</h3>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-12 spec-item">
                                            <span class="blue-spec">Length: </span>{{ $yacht->length }} m
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-12 spec-item">
                                            <span class="blue-spec">Fuel tank: </span>{{ $yacht->fuel_tank }} L
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-12 spec-item">
                                            <span class="blue-spec">Water tank: </span>{{ $yacht->water_tank }} L
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-12 spec-item">
                                            <span class="blue-spec">Max speed: </span>{{ $yacht->max_speed }} kt
                                        </div>
                                        <div class="col-md-4 col-sm-6 col-12 spec-item">
                                            <span class="blue-spec">Power: </span>{{ $yacht->power }} HP
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="grey-hr">

                            <div class="yacht-page__specifications_equipment">
                                <h3>Equipment</h3>
                                <p class="exclamation-equipment"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Every boat comes with safety equipment</p>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-6 col-12 equipment-column">
                                            <p class="blue-spec">Below Deck</p>


                                            @foreach($below_equipment_items as $item)
                                                <span>{{ $item }}</span>
                                            @endforeach
                                        </div>
                                        <div class="col-sm-6 col-12 equipment-column">
                                            <p class="blue-spec">Above Deck</p>
                                            @foreach($above_equipment_items as $item)
                                                <span>{{ $item }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="grey-hr">

                            <div class="yacht-page__specifications_check">
                                <h3>Check-in / Check-out</h3>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-sm-6 col-12">
                                           <span class="blue-spec">Check-in: </span>{{ $yacht->check_in_time }}
                                        </div>

                                        <div class="col-sm-6 col-12">
                                            <span class="blue-spec">Check-out: </span>{{ $yacht->check_out_time }}
                                        </div>

                                    </div>
                                </div>
                                <p style="margin-top: 20px;">Please contact us if you would like to request non-standard check-in and check-out times or locations.</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

