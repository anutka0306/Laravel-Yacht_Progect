<div class="booking_form_container">
    <form action="{{ route('yachts.index') }}" class="booking_form">
        <div class="d-flex flex-xl-row flex-column align-items-start justify-content-start">
            <div class="booking_input_container d-flex flex-lg-row flex-column align-items-start justify-content-center">
                <div>
                    <select name="location" class="custom-select booking_input booking_input_a booking_in booking_select">
                        <option selected value="" disabled>All locations</option>
                        <option value="Roma">Roma</option>
                        <option value="Ibiza">Ibiza</option>
                        <option value="Como">Como</option>
                    </select>
                </div>
                <div>
                    <input type="text" name="datePeriod" class="datepicker booking_input booking_input_a booking_in" placeholder="Date" required="required">
                </div>
                <div>

                       <button class="booking_button trans_200">Ricerca</button>

                </div>

            </div>

        </div>
    </form>
</div>
