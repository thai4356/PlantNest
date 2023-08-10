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
        $request->validated();
//        $plant =  plant::create($data);


        $input = $request->all();
        if($request->hasFile('image')){
            $destinationPath = 'public/images/';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destinationPath,$image_name);
            $input ['image']=$image_name;
        }

        plant::create($input);
        return redirect('/add-plant')-> with('message','added successfully');
//        $fileName = time().$request->file('image')->getClientOriginalExtension();
//        $path=$request->file('image')->storeAs("image",$fileName,'public');
//        $requestData['images']='/storage/'.$path;
//        plant::create($requestData);
//        return redirect()->route('index')->with('message','added successfully');
    }

    public function edit($plant_id){
        $plant = plant::find($plant_id);
        return view('plant.edit',compact('plant'));
    }

    public function update(PlantFormRequest $request,$plant_id){
        $data = $request->validated();
        $plant =  plant::where('id',$plant_id)->update([
            'name'=> $data['name'],
            'description'=> $data['description'],
            'price'=> $data['price'],
            'image'=> $data['image'],
            'category_id'=> $data['category_id'],
        ]);
        return redirect('/show-plant')-> with('message','update successfully');
    }

    public function destroy($plant_id){
        $plant =  plant::find($plant_id)->delete();
        return redirect('/show-plant')-> with('message','delete successfully');
    }

    public function addToCart($plant_id){
        $plant =  PlantController::index($plant_id);
        $plant = plant::findOrFail($plant_id);
        $cart = session()->get('cart',[]);
        if(isset($cart[$plant_id])){
            $cart[$plant_id]['quantity']++;
        }
        else{
                $cart[]=[
                "name"=>$plant_id->name,
                "description"=>$plant_id->description,
                "image"=>$plant_id->image,
                "price"=>$plant_id->price,
                "category_id"=>$plant_id->category_id,
                "quantity"=> 1,
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()-> with('message','add to cart successfully');
    }
}

