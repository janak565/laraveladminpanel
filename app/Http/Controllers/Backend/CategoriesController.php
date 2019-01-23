<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class CategoriesController extends Controller
{
   public function addCategory(Request $request)
   {
   		if($request->isMethod('post')){	
	   		$categroy_data = $request->all();
            

	   		$category_model = new Category;
	   		$category_model->category_name = $categroy_data['category_name'];
	   		$category_model->category_desc = $categroy_data['category_desc'];;
	   		$category_model->url = $categroy_data['category_url'];
	   	 	$category_model->category_parent_id = $categroy_data['category_parent_id'];

	   	 	$category_model->save();
	   	 	return redirect()->route('admin.viewcategory')->with('flash_message_success', 'Category Added Successfully.');
   	 	}
         $categories = Category::where('category_parent_id', '=', 0)->get();
         
   	 	return view ('backend.categories.add_category')->with(compact('categories'));
   }

   public function viewCategory()
   {
   		$categroy_data = Category::all();
         $allCategories = Category::pluck('category_name','id')->all();
 
//    			foreach ($categroy_data as $user) {
//     echo $user->category_name;
// }
//    		 //$categroy_data = DB::table('categories')->get();
//    		 dd($categroy_data);
   		// exit;	
   	return view ('backend.categories.view_category')->with(compact('categroy_data','allCategories'));
   }

   public function editCategory(Request $request,$id)
   {
      // echo $request->isMethod('post');
      // exit;
         if($request->isMethod('post')){  
            $categroy_data = $request->all();

            Category::where('id',$id)->update(['category_name'=>$categroy_data['category_name'],'category_desc'=>$categroy_data['category_desc'],'url'=>$categroy_data['category_url'],'category_parent_id'=>$categroy_data['category_parent_id']]); 
            return redirect()->route('admin.viewcategory')->with('flash_message_success', 'Category Updated Successfully.'); 
         }
	     $categroy_data = Category::where('id',$id)->first();
        $categories = Category::where('category_parent_id', '=', 0)->get();
        //dd($categroy_data);
   	  return view ('backend.categories.edit_category')->with(compact('categroy_data','categories'));   	
   }

   public function deleteCategory($id){
      if(!empty($id)){
            Category::where('id',$id)->delete();
            return redirect()->back()->with('flash_message_success', 'Category Deleted Successfully.');
      }else{
        return redirect()->route('admin.viewcategory')->with('flash_message_error', 'Category Delete Fail, Record is not found.');    
      }         
   }
}
