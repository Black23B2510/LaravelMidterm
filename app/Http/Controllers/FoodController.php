<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $foods =Category::find(1)->food()->get();
        $food2 =Category::find(2)->food()->get();
        $food3 =Category::find(3)->food()->get();
        return view('showFood',compact('foods','food2','food3'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addFoods');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $names = '';
        
        if($req -> hasFile('image')){
            $this->validate($req,[
                'image' =>'mimes:jpg,png,jpeg|max:2048',
            ],[
                'image.mimes'=>'Chỉ chấp nhận files ảnh',
                'image.max' => 'Chỉ chấp nhận files ảnh dưới 2Mb',

            ]);
            $file =$req ->file(('image'));
            $names = time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('images');
            $file -> move($destinationPath, $names);
        }
        $this->validate($req,[
            'name'=>'required', 
            'description'=>'required',
            'detail'=>'required',
            'price'=>'required',
            'cate_id'=>'required'
        ],[
            'name.required' =>'Bạn chưa nhập tên sản phẩm',
            'description.required' =>'Bạn chưa nhập mô tả',
            'detail.required' =>'Bạn chưa nhập chi tiết',
            'price.required' =>'Bạn chưa nhập giá',
            'cate_id'=>'Bạn chưa nhập loại sản phẩm'
        ]);
        $food=new Food();
        $food->name=$req->name;
        $food->description=$req->description;
        $food->detail=$req->detail;
        $food->price=$req->price;
        $food->image=$names;
        $food->category_id=$req->cate_id;
        $food->save();
        return redirect()->route('foods.index')->with('success', 'Bạn đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $food = Food::find($id);
        return view('showDetail',['food'=>$food]);
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
