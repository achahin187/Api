<?php

namespace App\Http\Controllers\Api;

use App\categories;
use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
    
use GeneralTrait;
    public function index(){
        

     $categories=categories::selection()->get();
     return response()->json($categories);

    }


    public function getCategoryById(Request $request){
        $category=categories::selection()->find($request->id);
        if(!$category)
      return  $this->returnError('001','هذا الجزء غير موجود');
   return $this->returnData('category',$category,'succesfully');
    }



    public function changeStatus(Request $request){
               categories::where('id',$request->id)->update(['active'=>$request->active]);
               return $this->returnSuccessMessage('تم تغير الحاله بنجاح!');

    }
}
