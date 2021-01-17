<div class="search-form">
    <div class="booking_form_container__inner-page">
        <form action="#" class="booking_form">
            <div class="d-flex flex-column align-items-start justify-content-start">
                <div class="booking_input_container__inner-page d-flex  flex-column align-items-center justify-content-center">

                    <div class="d-flex align-items-center search-form__header">
                        <div class="yacht-thumb" style="background-image:url('{{ asset('/storage/images/'.$yacht->main_image) }}')"></div>
                        <span class="yacht-item_name"> {{ $yacht->name }} </span>
                    </div>

                    <hr class="grey-hr"/>

                    <div style="margin-top: 0;">
                        <label class="left-form__label">Guests</label>
                        <div class="number-guests d-flex">
                            <span class="minus d-flex justify-content-center align-items-center">-</span>
                            <input disabled type="number" class="booking_input booking-input_dark booking_input_a booking_in" value="{{ $yacht->max_guests }}" max="{{ $yacht->max_guests }}"/>
                            <span class="plus d-flex justify-content-center align-items-center">+</span>
                        </div>
                    </div>

                    <input type="hidden" class="yacht-id" value="{{ $yacht->id }}">


                    <div>
                        <p class="availability-status small text-danger font-weight-bold">
                        @if($reserved)
                            Sorry, this boat is not avalible

                        @endif
                        </p>
                        <label class="left-form__label">Dates</label>
                        @if(isset($startDate) && isset($endDate))

                        <input type="text" name="datePeriod" class="datepickerCard booking_input booking-input_dark booking_input_a booking_in" placeholder="{{ $startDate }} - {{ $endDate }}" required="required" value="{{ $startDate }} - {{ $endDate }}">

                        @else

                            <input type="text" name="datePeriod" class="datepickerCard booking_input booking-input_dark booking_input_a booking_in" placeholder="Choose Date" required="required" value="">

                            @endif

                    </div>

                    <hr class="grey-hr"/>

                    @if(isset($totalPrice))
                    <div class="search-form__price d-flex justify-content-between align-items-center">
                        <span class="search-form__price_label">Total Price</span>
                        <span class="search-form__price_price">&euro;{{ $totalPrice }}</span>
                    </div>
                    @else
                        <div class="search-form__price d-flex justify-content-between align-items-center">
                            <span class="search-form__price_label"></span>
                            <span class="search-form__price_price"></span>
                        </div>
                    @endif

                    <div> <a class="bookingForm_link
                      @if($reserved || (!isset($startDate) && !isset($endDate)))
                            link_disabled
                      @endif
                            " href="#"><button class="booking_button trans_200">Book</button></a></div>

                </div>

            </div>
        </form>
    </div>
</div>


