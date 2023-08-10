<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show plant') }}
        </h2>
    </x-slot>

    <div style="margin-left: 20%">
        @php $total=0 @endphp
        @foreach((array)session('cart') as $plant_id=>$details)
            @php $total += $plant_id * $details['quantity'] @endphp
        @endforeach
        Shopping Cart :
            <span>
                Amount: {{count((array) session('cart'))  }}
                Total: ${{$total}}

            </span>
            <span>
{{--                @dd($details)--}}
            </span>
    </div>

    <div class="py-12">
        <x-success style="margin-left: 10%" class="mb-4" :status="session('message')" />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table-table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">STT</th>
                        {{--                        scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   --}}
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >ID</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >Name</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >Description</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >Price</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >Image</th>
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >Category Id</th>
{{--                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >Delete</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($plants as $plant)
{{--                        @php $total += $plant->price * 1 @endphp--}}
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">{{++$i}}</th>
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >{{$plant->id}}</td>
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >{{$plant->name}}</td>
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >{{$plant->description}}</td>
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >{{$plant->price}}</td>
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   ><img src=" storage/images/{{$plant->image}}"  width="100px"></td>
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >{{$plant->category_id}}</td>

                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                <a href="{{url('/edit-plant/'.$plant->id)}}" class="btn-btn-primary" style="color: #2563eb">
                                    Edit
                                </a>
                            </td>

                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800" style="color: #25eb2f">
                                <a href="{{route('add_to_cart',$plant->id)}}" class="btn-btn-primary" style="color: #25eb2f">
                                    <div>Add to cart</div>

                                </a>
                            </td>

                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800" >

                                <form action="{{url('delete-plant/'.$plant->id)}} " method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button style="color: red"> Delete </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Nothing yet !?</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            {{$plants->links()}}

        </div>

    </div>
</x-app-layout>
