/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Menu
4. Init Home Slider
5. Init Date Picker
6. Init SVG
7. Init Gallery
8. Init Testimonials Slider
9. Init Booking Slider
10. Init Blog Slider


******************************/

$(document).ready(function()
{
	"use strict";
/* Plus and menus */
    $('.minus').click(function () {
        let $input = $(this).parent().find('input');
        let count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function () {
        let $input = $(this).parent().find('input');
        let max = $input.attr('max');

       if(($input.val()) >= max){
           $input.val(max);
       }else {
           $input.val(parseInt($input.val()) + 1);
           $input.change();
       }
        return false;
    });


/*  Yacht offers Tabs */
    $( function() {
        $( "#yachts-offers__tabs" ).tabs();
    } );

	/*

	1. Vars and Inits

	*/

	var header = $('.header');

	setHeader();

	$(window).on('resize', function()
	{
		setHeader();

		setTimeout(function()
		{
			$(window).trigger('resize.px.parallax');
		}, 375);
	});

	$(document).on('scroll', function()
	{
		setHeader();
	});

	initMenu();
	initHomeSlider();
	initDatePicker();
    initDatePickerCard();
	initSvg();
	initGallery();
	initTestSlider();
	initBookingSlider();
	initBlogSlider();

	/*

	2. Set Header

	*/

	function setHeader()
	{
		if($(window).scrollTop() > 91)
		{
			header.addClass('scrolled');
		}
		else
		{
			header.removeClass('scrolled');
		}
	}

	/*

	3. Init Menu

	*/

	function initMenu()
	{
		if($('.menu').length)
		{
			var menu = $('.menu');
			var hamburger = $('.hamburger');
			var close = $('.menu_close');

			hamburger.on('click', function()
			{
				menu.toggleClass('active');
			});

			close.on('click', function()
			{
				menu.toggleClass('active');
			});
		}
	}

	/*

	4. Init Home Slider

	*/

	function initHomeSlider()
	{
		if($('.home_slider').length)
		{
			var homeSlider = $('.home_slider');
			homeSlider.owlCarousel(
			{
				items:1,
				autoplay:true,
				loop:true,
				nav:false,
				smartSpeed:1200
			});

			/* Custom dots events */
			if($('.home_slider_custom_dot').length)
			{
				$('.home_slider_custom_dot').on('click', function()
				{
					$('.home_slider_custom_dot').removeClass('active');
					$(this).addClass('active');
					homeSlider.trigger('to.owl.carousel', [$(this).index(), 1200]);
				});
			}

			/* Change active class for dots when slide changes by nav or touch */
			homeSlider.on('changed.owl.carousel', function(event)
			{
				$('.home_slider_custom_dot').removeClass('active');
				$('.home_slider_custom_dots li').eq(event.page.index).addClass('active');
			});
		}
	}

	/*

	5. Init Date Picker

	*/

	function initDatePicker()
	{
		if($('.datepicker').length)
		{
			var datePickers = $('.datepicker');
			datePickers.each(function()
			{
				var dp = $(this);
				// Uncomment to use date as a placeholder
				// var date = new Date();
				// var dateM = date.getMonth() + 1;
				// var dateD = date.getDate();
				// var dateY = date.getFullYear();
				// var dateFinal = dateM + '/' + dateD + '/' + dateY;
				let placeholder = dp.data('placeholder');
				//dp.val(placeholder);
				dp.datepicker({
                    dateFormat: 'dd.mm.yy',
                    range: 'period', // возможные значения: period, multiple
                    onSelect: function(dateText, inst, extensionRange) {
                        // extensionRange - добавлен возвращаемый аргумент, содержит в себе объект расширения
                        $('[name=datePeriod]').val(extensionRange.startDateText + ' - ' + extensionRange.endDateText);
                        console.log(extensionRange.startDateText);
                        console.log(extensionRange.endDateText);
                        console.log(extensionRange.dates); // массив дат (объект даты)
                        console.log(extensionRange.startDate); // начало периода (объект даты)
                        console.log(extensionRange.endDate); // окончание периода (объект даты)
                    },

                });

			});
		}
	}
/*

Init datepicker for card
 */
    function initDatePickerCard()
    {
        if($('.datepickerCard').length)
        {
            let datePickers = $('.datepickerCard');
            datePickers.each(function()
            {
                let dp = $(this);

                dp.datepicker({
                    dateFormat: 'dd.mm.yy',
                    showButtonPanel: true,
                    range: 'period', // возможные значения: period, multiple
                    onSelect: function(dateText, inst, extensionRange) {
                        // extensionRange - добавлен возвращаемый аргумент, содержит в себе объект расширения
                        $('[name=datePeriod]').val(extensionRange.startDateText + ' - ' + extensionRange.endDateText);

                    },
                    onClose: function () {

                        let period = $('[name=datePeriod]').val();
                        let id = $('.yacht-id').val();

                        $.ajax({
                           url: "http://laravel1/yacht/public/yacht/"+ id + "/" + period + "/",
                            type: 'POST',
                            data: {
                               id: id,
                               period: period,
                            },
                            success:function(response) {
                                let div = document.createElement('div');
                                div.innerHTML = response;

                                let message = div.querySelector('.availability-status');
                                let button = div.querySelector('.bookingForm_link');
                                let totalPrice = div.querySelector('.search-form__price_price');
                                $('.availability-status').replaceWith(message);
                                $('.bookingForm_link').replaceWith(button);

                                if($(totalPrice).text() == "€0"){
                                    $('.search-form__price_price').text(" ");
                                    $('.search-form__price_label').text(" ");
                                }else {
                                    $('.search-form__price_label').text("Total price");
                                    $('.search-form__price_price').replaceWith(totalPrice);
                                }
                            }
                        });



                    },

                });

            });
        }
    }

    /*

    6. Init SVG

    */

	function initSvg()
	{
		if($('img.svg').length)
		{
			jQuery('img.svg').each(function()
			{
				var $img = jQuery(this);
				var imgID = $img.attr('id');
				var imgClass = $img.attr('class');
				var imgURL = $img.attr('src');

				jQuery.get(imgURL, function(data)
				{
					// Get the SVG tag, ignore the rest
					var $svg = jQuery(data).find('svg');

					// Add replaced image's ID to the new SVG
					if(typeof imgID !== 'undefined') {
					$svg = $svg.attr('id', imgID);
					}
					// Add replaced image's classes to the new SVG
					if(typeof imgClass !== 'undefined') {
					$svg = $svg.attr('class', imgClass+' replaced-svg');
					}

					// Remove any invalid XML tags as per http://validator.w3.org
					$svg = $svg.removeAttr('xmlns:a');

					// Replace image with new SVG
					$img.replaceWith($svg);
				}, 'xml');
			});
		}
	}

	/*

	7. Init Gallery

	*/

	function initGallery()
	{
		if($('.gallery_slider').length)
		{
			var gallerySlider = $('.gallery_slider');
			gallerySlider.owlCarousel(
			{
				items:4,
				loop:false,
				autoplay:false,
				dots:false,
				nav:false,
				smartSpeed:1200,
				responsive:
				{
					0:{items:1},
					576:{items:2},
					768:{items:3},
					992:{items:4}
				}
			});

			if($('.colorbox').length)
			{
				$('.colorbox').colorbox(
				{
					rel:'colorbox',
					photo: true,
					maxWidth:'95%',
					maxHeight:'95%'
				});
			}
		}
	}

	/*

	8. Init Testimonials Slider

	*/

	function initTestSlider()
	{
		if($('.test_slider').length)
		{
			var testSlider = $('.test_slider');
			testSlider.owlCarousel(
			{
				items:3,
				autoplay:true,
				loop:true,
				smartSpeed:1200,
				dots:false,
				nav:false,
				margin:30,
				autoplayHoverPause:true,
				responsive:
				{
					0:{items:1},
					768:{items:2},
					992:{items:3}
				}
			});
		}
	}

	/*

	9. Init Booking Slider

	*/

	function initBookingSlider()
	{
		if($('.booking_slider').length)
		{
			var bookingSlider = $('.booking_slider');
			bookingSlider.owlCarousel(
			{
				items:3,
				autoplay:true,
				autoplayHoverPause:true,
				loop:true,
				smartSpeed:1200,
				dots:false,
				nav:false,
				margin:30,
				responsive:
				{
					0:{items:1},
					768:{items:2},
					992:{
					    items:3,
                        loop:false
                    }
				}
			});
		}
	}

	/*

	10. Init Blog Slider

	*/

	function initBlogSlider()
	{
		if($('.blog_slider').length)
		{
			var blogSlider = $('.blog_slider');
			blogSlider.owlCarousel(
			{
				items:3,
				autoplay:true,
				loop:true,
				smartSpeed:1200,
				dots:false,
				nav:false,
				margin:2,
				responsive:
				{
					0:{items:1},
					768:{items:2},
					992:{items:3}
				}
			});
		}
	}

});
