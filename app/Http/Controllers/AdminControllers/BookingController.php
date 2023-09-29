<?php

namespace App\Http\Controllers\AdminControllers;
use App\Models\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listBooking= Booking::all();
        return view('AdminViews.index',['page'=>"booking",'danhsach'=>$listBooking]);
        //return response()->json($listBooking,200); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AdminViews.index',['page'=>"bookingCreate"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $User_Id= $request->input('User_Id');
        $OrderTime= $request->input('OrderTime');
        $AllPrice= $request->input('AllPrice');
        $newBooking= new Booking();
        $newBooking->User_Id=$User_Id;
        $newBooking->OrderTime=$OrderTime;
        $newBooking->AllPrice=$AllPrice;
        
        $newBooking->save();
        //return $this->index();
        return redirect("/admin/booking");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Booking= Booking::find($id);
        return view("AdminViews.index",['page'=>'bookingShow'],['Booking'=>$Booking]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $idBooking= intval($id);
        $BookingExist= Booking::where('id',$idBooking)->first();
        return view('AdminViews.index',['page'=>"bookingEdit", 'Booking'=>$BookingExist]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $User_Id= $request->input('User_Id');
        $OrderTime= $request->input('OrderTime');
        $AllPrice= $request->input('AllPrice');

        $newBooking= Booking::where('id',$id)->first();
        $newBooking->User_Id=$User_Id;
        $newBooking->OrderTime=$OrderTime;
        $newBooking->AllPrice=$AllPrice;
        
        $newBooking->save();
        //return $this->index();
        return redirect("/admin/booking");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $newBooking= Booking::where('id',$id)->first();
        $newBooking->delete();
       // return $this->index();
       return redirect("/admin/booking");
    }
}