<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AccountClientController extends Controller
{
    public function index()
    {
       // $listUser= User::all();
       // return view('AdminViews.index',['page'=>"user",'danhsach'=>$listUser]);
        //return response()->json($listUser,200);
        $listUser= User::with('Role')->where('Role_Id','>',2)->where('Deleted',0)->get();
        return view("AdminViews.index",['page'=>'accountClient'],['danhsach'=>$listUser]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
      // return view('AdminViews.index',['page'=>"userCreate"]);
      $ListRole= Role::all();
      return view("AdminViews.index",[
        'page'=>'accountClientCreate',
    "ListRole"=>$ListRole]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $UserName= $request->input('UserName');
         $Password= $request->input('Password');
         $Name= $request->input('Name');
         $Address= $request->input('Address');
         $DateOfBirth= $request->input('DateOfBirth');
         $Phone= $request->input('Phone');
         $Image= $request->input('Image');
         $Role_Id= $request->input('Role_Id');
         
         $newUser= new User();
         $newUser->UserName=$UserName;
         $newUser->Password=md5($Password);
         $newUser->Name=$Name;
         $newUser->Address=$Address;
         $newUser->DateOfBirth=$DateOfBirth;
         $newUser->Phone=$Phone;
         $newUser->Image=$Image;
         $newUser->Role_Id=3;

         $newUser->save();
        // return $this->index();
        return redirect("/admin/account/client");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $User= User::find($id);
        return view("AdminViews.index",['page'=>'accountClientShow'],['User'=>$User]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ListRole= Role::all();
        $idUser= intval($id);
        $UserExist= User::where('id',$idUser)->first();
        return view('AdminViews.index',['page'=>"accountClientEdit", 'User'=>$UserExist, "ListRole"=>$ListRole]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $UserName= $request->input('UserName');
        $Password= $request->input('Password');
        $Name= $request->input('Name');
        $Address= $request->input('Address');
        $DateOfBirth= $request->input('DateOfBirth');
        $Phone= $request->input('Phone');
        $Image= $request->input('Image');
        $Role_Id= $request->input('Role_Id');

        $newUser= User::where('id',$id)->first();
        $newUser->UserName=$UserName;
        $newUser->Password=md5($Password);
        $newUser->Name=$Name;
        $newUser->Address=$Address;
        $newUser->DateOfBirth=$DateOfBirth;
        $newUser->Phone=$Phone;
        $newUser->Image=$Image;
        $newUser->Role_Id=$Role_Id;
       
        $newUser->save();
        //return $this->index();
        return redirect("/admin/account/client");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $newUser= User::where('id',$id)->first();

        $newUser->Deleted=1;
        $newUser->save();
        //return $this->index();
        return redirect("/admin/account/client");
    }
}
