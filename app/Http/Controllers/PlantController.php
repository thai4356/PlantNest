<?php
namespace App\Http\Controllers;
use App\Http\Requests\plantFormRequest;
use Illuminate\Http\Request;
use App\Models\plant;

class PlantController extends Controller
{

    public function index(){
        $plants = plant::paginate(5);
        return view('plant.index',compact('plants'))->with('i',(request()->input('page',1)-1)*5);
    }

    public function create()
    {
        return view('plant.create');
    }

    public function store(PlantFormRequest $request)
    {
        $data = $request->validated();
//        $plant =  plant::create($data);
//        return redirect('/add-plant')-> with('message','added successfully');
        $requestData = $request->all();
        $fileName = time().$request->file('images')->getClientOriginalExtension();
        $path=$request->file('images')->storeAs("images",$fileName,'public');
        plant::create($input);
        return redirect()->route('index')->with('message','added successfully');
    }

//    public function edit($product_id){
//        $products = product::find($product_id);
//        return view('product.edit',compact('products'));
//    }
//
//    public function update(ProductFormrequest $request,$product_id){
//        $data = $request->validated();
//        $product =  product::where('id',$product_id)->update([
//            'category'=> $data['category'],
//            'name'=> $data['name'],
//            'price'=> $data['price'],
////            'image'=> $data['image'],
//        ]);
//        return redirect('/show-products')-> with('message','update successfully');
//    }
//
//    public function destroy($product_id){
//        $product =  product::find($product_id)->delete();
//        return redirect('/show-products')-> with('message','delete successfully');
//    }
//
//    public function AddToCart($product_id){
//        $product = ProductController::index($product_id);
//        $cart = session()->get('cart',[]);
//        if(isset($cart[$product_id])){
//            $cart[$product_id]['quantity']++;
//        }
//        else{
//            $cart[$product_id]=[
//                "category"=>$product->category,
//                "name"=>$product->name,
//                "image"=>$product->image,
//                "price"=>$product->price,
//                "quantity"=> 1
//            ];
//        }
//        session()->put('cart',$cart);
//        return redirect()->back()-> with('message','add to cart successfully');
//    }
}

