<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AccountEmployeeController extends Controller
{
    public function index()
    {
       // $listUser= User::all();
       // return view('AdminViews.index',['page'=>"user",'danhsach'=>$listUser]);
        //return response()->json($listUser,200);
        $listUser= User::with('Role')->where('Role_Id','=',2)->where('Deleted',0)->get();
        return view("AdminViews.index",['page'=>'accountEmployee'],['danhsach'=>$listUser]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
      // return view('AdminViews.index',['page'=>"userCreate"]);
      $ListRole= Role::all();
      return view("AdminViews.index",[
        'page'=>'accountEmployeeCreate',
    "ListRole"=>$ListRole]);
    }
    public function convertPathUpLoad($str)
    {

        $listStr = explode("/", $str);
        array_shift($listStr);
        $realPath = implode("/", $listStr);
        return url("storage/" . $realPath);
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
        // $Image= $request->input('Image');
         $Role_Id= $request->input('Role_Id');
         
         $newUser= new User();
         $newUser->UserName=$UserName;
         if($newUser->Password!=$Password)  $newUser->Password=md5($Password);
       
         $newUser->Name=$Name;
         $newUser->Address=$Address;
         $newUser->DateOfBirth=$DateOfBirth;
         $newUser->Phone=$Phone;
        // $newUser->Image=$Image;
         $newUser->Role_Id=2;

         $fileSrc = $request->file('Image');
         $pathSrc =  $fileSrc->store('public/user_Img');
         $realPathImage = $this->convertPathUpLoad($pathSrc);
         $Image = $realPathImage;
         $newUser->Image=$Image;

         $newUser->save();
        // return $this->index();
        return redirect("/admin/account/employee");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $User= User::find($id);
        return view("AdminViews.index",['page'=>'accountEmployeeShow'],['User'=>$User]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ListRole= Role::all();
        $idUser= intval($id);
        $UserExist= User::where('id',$idUser)->first();
        return view('AdminViews.index',['page'=>"accountEmployeeEdit", 'User'=>$UserExist, "ListRole"=>$ListRole]);
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
        //$Image= $request->input('Image');
        $Role_Id= $request->input('Role_Id');

        $newUser= User::where('id',$id)->first();
        $newUser->UserName=$UserName;
        $newUser->Password=md5($Password);
        $newUser->Name=$Name;
        $newUser->Address=$Address;
        $newUser->DateOfBirth=$DateOfBirth;
        $newUser->Phone=$Phone;
        //$newUser->Image=$Image;

        if ($request->hasFile('Image')) {
            $fileSrc = $request->file('Image');
            $pathSrc =  $fileSrc->store('public/user_Img');
            $realPathImage = $this->convertPathUpLoad($pathSrc);
            $Image = $realPathImage;
            $newUser->Image=$Image;
           }

        $newUser->Role_Id=$Role_Id;
        $newUser->save();
        //return $this->index();
        return redirect("/admin/account/employee");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $newUser= User::where('id',$id)->where('Deleted',0)->first();

        $newUser->Deleted=1;
        $newUser->save();
        //return $this->index();
        return redirect("/admin/account/employee");
    }
}
