<div class="search-form">
    <div class="booking_form_container__inner-page">
        <form action="{{ route('yachts.index') }}" class="booking_form">
            <div class="d-flex flex-column align-items-start justify-content-start">
                <div class="booking_input_container__inner-page d-flex  flex-column align-items-center justify-content-center">
                    <div>
                        <select name="location" class="custom-select booking_input booking_input_a booking_in booking_select booking-input_dark">
                            @if($location)
                                <option value="" selected>All locations</option>
                            @else
                                <option value="" >All locations</option>
                            @endif
                            @foreach($destinations as $destination)

                                <option
                                    @if($destination == $location)
                                        selected
                                    @endif
                                    value="{{ $destination }}">{{ $destination }}</option>

                            @endforeach


                        </select>
                    </div>
                    <div>
                        <input type="text" name="datePeriod" class="datepicker booking_input booking-input_dark booking_input_a booking_in" placeholder="{{ $startDate }} - {{ $endDate }}" required="required" value="{{ $startDate }} - {{ $endDate }}">

                    </div>
                    <div> <a href="#"><button class="booking_button trans_200">Ricerca</button></a></div>

                </div>

            </div>
        </form>
    </div>
</div>
