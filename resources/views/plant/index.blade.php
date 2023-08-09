<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show plant') }}
        </h2>
    </x-slot>

{{--    <div class="container" style="margin-left: 40%">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12 col-sm-12 col-12">--}}
{{--                <div class="dropdown">--}}
{{--                    <button type="button" class="btn btn-primary" data-toggle="dropdown">--}}
{{--                        Cart <span class="badge badge-pill badge-danger">{{count((array) session('cart')) }}</span>--}}
{{--                    </button>--}}
{{--                    <div class="dropdown-menu">--}}
{{--                        <div class="row total-header-section">--}}
{{--                            @php $total=100 @endphp--}}
{{--                            @foreach((array) session('cart') as $id => $details)--}}
{{--                                @php $total += $details['price'] * $details['quantity'] @endphp--}}
{{--                            @endforeach--}}
{{--                            <div class="total">--}}
{{--                                <span>Total: ${{$total}}</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <a href="">View All</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

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
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">{{++$i}}</th>
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >{{$plant->id}}</td>
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >{{$plant->name}}</td>
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >{{$plant->description}}</td>
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >{{$plant->price}}</td>
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   ><img src="/images/{{$plant->image}}"  width="100px"></td>
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   >{{$plant->category_id}}</td>

                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                <a href="{{url('/edit-plant/'.$plant->id)}}" class="btn-btn-primary" style="color: #2563eb">
                                    Edit
                                </a>
                            </td>
{{--                            <td>--}}
{{--                                <a href="{{route('AddToCart',$product->id)}}"  style="color: #25eb2f">--}}
{{--                                    Add to cart--}}
{{--                                </a>--}}
{{--                            </td>--}}
                            <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800" >

                                <form action="{{url('delete-product/'.$plant->id)}} " method="POST">
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
