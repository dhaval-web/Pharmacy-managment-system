<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\catagory;
use App\Models\login;
use App\Models\medicine;
use App\Models\stock;
use App\Models\member;

class managment extends Controller
{

    function index(){
        return view('welcome');
    }

   

    function add(Request $req)
    {
        
        $cat=new catagory;
        $cat->catagory = $req['add_catagory'];
        $cat->save();
        return redirect('/catagory_view');


    }



    function view(Request $request)
    {
            $catagory=catagory::all();
            $catagory=catagory::select('*');
             if(isset($request->catagory)&&$request->catagory!=null){
                $catagory=$catagory->where('catagory','LIKE','%'.$request->catagory.'%');
             }
            $catagory=$catagory->paginate(10);
            $data=compact('catagory');
            return view('catagory_view')->with($data,$catagory);
    }

    public function deleteUser( $id)
    {
        catagory::where('id',$id)
        ->delete();
        return redirect('/catagory_view');
    }

    function editUser($id){
        $catagory = catagory::where('id','=',$id)->first();
        return view('edit_catagory',compact('catagory'));
    }

    public function updateUser(Request $request){
     
         catagory::where('id',$request->id)  
        ->update([
            'catagory' => $request->add_catagory    
        ]);
        return redirect('/catagory_view');
    }


    //madicine filed

    function medicine_view(Request $request)
    {
       
        $medicine=medicine::all();
        $medicine=medicine::select('*');
        if(isset($request->medicine_name)&&$request->medicine_name!=null){
            $medicine=$medicine->where('medicine_name','LIKE','%'.$request->medicine_name.'%');
        }
        $medicine=$medicine->paginate(6);
        $data=compact('medicine');
        return view('medicine_view')->with($data,$medicine);
    }

    function add_medicine(Request $req){
        $cat=new medicine;
        $cat->medicine_name = $req['medicine_name'];
        $cat->catagory = $req['catagory'];
        $cat->price = $req['price'];
        $cat->quantity = $req['quantity'];
        $cat->discount = $req['discount'];
        $cat->expiry_date = $req['expiry_date'];
        $cat->save();
        return redirect('/medicine_view');
    }


    function editmedicine($id)
    {
        $medicine = medicine::where('id','=',$id)->first();
        return view('edit_medicine',compact('medicine'));
    }

    function updatemedicine(Request $request)
    {
        
        medicine::where('id',$request->id)  
        ->update([
                'medicine_name' => $request->medicine_name,
                'catagory'=>$request->catagory,
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'discount'=>$request->discount,
                'expiry_date'=>$request->expiry_date

        ]);
        return redirect('/medicine_view');
    }


    function deletemedicine($id){
        medicine::where('id',$id)
        ->delete();
        return redirect('/medicine_view');
    }

    //stock filed

    function add_stock(Request $req)
    {

        $stock=new stock;
        $stock->medicine_name = $req['medicine_name'];
        $stock->medicine_catagory = $req['medicine_catagory'];
        $stock->perchase_price = $req['perchase_price'];
        $stock->quantity = $req['quantity'];
        $stock->suplair = $req['suplair'];
        $stock->expair_date = $req['expair_date'];
        $stock->save();
        return redirect('/stock_view');

    }

    function stock_view(Request $request)
    {
        $stock=stock::all();
        $stock=stock::select('*');
        if(isset($request->medicine_name)&&$request->medicine_name!=null){
            $stock=$stock->where('medicine_name','LIKE','%'.$request->medicine_name.'%');
        }
        $stock=$stock->paginate(5);
        $data=compact('stock');
        return view('stock_view')->with($data,$stock);
    }

    

    function editstock($id)
    {
        $stock = stock::where('id','=',$id)->first();
        return view('edit_stock',compact('stock'));
    }

    function updatestock(Request $request)
    {
        
        stock::where('id',$request->id)  
        ->update([
                'medicine_name' => $request->medicine_name,
                'medicine_catagory'=>$request->medicine_catagory,
                'perchase_price'=>$request->perchase_price,
                'quantity'=>$request->quantity,
                'suplair'=>$request->suplair,
                'expair_date'=>$request->expair_date

        ]);
        return redirect('/stock_view');
    }


    function deletestock($id){
        stock::where('id',$id)
        ->delete();
        return redirect('/stock_view');
    }

    //member filed

    function add_member(Request $req)
    {

        $member=new member;
        $member->name = $req['name'];
        $member->email = $req['email'];
        $member->role = $req['role'];
        $member->save();
        return redirect('/member_view');

    }

    function member_view(Request $request)
    {
        $member=member::all();
        $member=member::select('*');
        if(isset($request->name)&&$request->name!=null){
            $member=$member->where('name','LIKE','%'.$request->name.'%');
        }
        $member=$member->paginate(3);
        $data=compact('member');
        return view('member_view')->with($data,$member);
    }

    

    function editmember($id)
    {
        $member = member::where('id','=',$id)->first();
        return view('edit_member',compact('member'));
    }

    function updatemember(Request $request)
    {
        
        member::where('id',$request->id)  
        ->update([
                'name' => $request->name,
                'email'=>$request->email,
                'role'=>$request->role,
                

        ]);
        return redirect('/member_view');
    }


    function deletemember($id){
        member::where('id',$id)
        ->delete();
        return redirect('/member_view');
    }

    
}
