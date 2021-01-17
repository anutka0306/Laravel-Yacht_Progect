<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yacht;
use App\Date;
use App\Image;
use App\Discount;
use Illuminate\Http\Response;

class YachtController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $daysStartEnd = explode(" - ", $request->datePeriod);
        $days = range(strtotime($daysStartEnd[0]), strtotime($daysStartEnd[1]), (24*60*60));
        $formatedDays = [];
        $location = $request->location;
        $reserved = false;
        $avalible_yachts_ids = [];

        for($i = $days[0]; $i <= $days[count($days)-1]; $i+=86400){
            $formatedDays[] = date('Y-m-d', $i);
        }

        if($location == null){
            $yacht_ids = Yacht::query()->select('id')->get();

        }
        else {
            $yacht_ids = Yacht::query()->select('id')->where('location', $location)->get();
        }
        $yacht_ids_array = [];
        for ($i = 0; $i < count($yacht_ids); $i++) {
            $yacht_ids_array[] = $yacht_ids[$i]->id;
        }

            foreach ($yacht_ids_array as $yacht){
                foreach ($formatedDays as $date){
                    $item = Date::query()->where([
                        'date' => $date,
                        'yacht_id' => $yacht,
                    ])->get();

                    if(count($item) > 0){
                        break;
                    }
                        $avalible_yachts_ids[] = $yacht;
                }



            }
            $avalible_yachts_ids = array_unique($avalible_yachts_ids);

            if(empty($avalible_yachts_ids)){
                $reserved = true;
            }

            $destinations = Yacht::query()->select('location')->get();
           $destinations_array = [];
           for($i = 0; $i < count($destinations); $i++){
               $destinations_array[] = $destinations[$i]->location;
           }

          // dd($destinations_array);
        $destinations_array = array_unique($destinations_array);


        return view('yachts-all')->with([
            'reserved'=> $reserved,
            'startDate'=>$daysStartEnd[0],
            'endDate' => $daysStartEnd[1],
            'location' => $location,
            'yachts'=> Yacht::query()->whereIn('id', $avalible_yachts_ids)->get(),
            'destinations' => $destinations_array,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  date  $period
     *
     * @return Response
     */
    public function show($id, $period)
    {
        //dd($period);
        $daysStartEnd = explode("-", $period);
        $reserved = false;
        $days = range(strtotime($daysStartEnd[0]), strtotime($daysStartEnd[1]), (24*60*60));
        $formatedDays = [];
        $totalPrice = 0;
        $basePrice = Yacht::query()->where('id', $id)->value('base_price');
        for($i = $days[0]; $i <= $days[count($days)-1]; $i+=86400){
            $formatedDays[] = date('Y-m-d', $i);
        }

        foreach ($formatedDays as $date){
            $item = Date::query()->where([
                'date' => $date,
                'yacht_id' => $id,
            ])->get();

            if(count($item) > 0){
                $reserved = true;
                break;
            }
        }

        if($reserved == false){

            foreach ($formatedDays as $date){
                $discount_price = Discount::query()->where([
                    ['yacht_id','=', $id],
                    ['start_date', '<=', $date],
                    ['end_date', '>=', $date],
                ])->value('price');
                if($discount_price){
                   $totalPrice += $discount_price;
                }else{

                    $totalPrice += $basePrice;
                }
            }
        }

        //dd($totalPrice);
       return view("yacht")->with([
           'startDate'=>$daysStartEnd[0],
           'endDate'=>$daysStartEnd[1],
           'images'=> Image::query()->where('yacht_id', $id)->get(),
           'yacht' => Yacht::query()->find($id),
           'reserved' => $reserved,
           'totalPrice' => $totalPrice,

       ]);
    }

    /**
     * Display the specified resource without period
     *
     * @param int $id
     *
     * @return Response
     */

    public function showWithoutPeriod($id){
        return view("yacht")->with([
            'images'=> Image::query()->where('yacht_id', $id)->get(),
            'yacht' => Yacht::query()->find($id),
            'reserved'=> false,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
