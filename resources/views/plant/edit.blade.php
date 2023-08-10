<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{--        <x-success-status style="margin-left: 10%" class="mb-4" :status="session('message')" />--}}
        <x-error style="margin-left: 10%" class="mb-4" :errors="$errors" />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action = "{{ url('update-plant/'.$plant->id)  }}" method="POST " enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$plant->name" required autofocus />
                        {{--                        <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
                    </div>
                    <div>
                        <x-input-label for="description" :value="__('description')" />
                        <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="$plant->description" required autofocus />
                        {{--                        <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
                    </div>
                    <div>
                        <x-input-label for="price" :value="__('price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="$plant->price" required autofocus />
                        {{--                        <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
                    </div>
                    <div>
                        <x-input-label for="image" :value="__('image')" />
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="$plant->image" required autofocus />
{{--                        <td  class="px-6 py-3 bg-gray-50 dark:bg-gray-800"   ><img src="storage/images/{{$plant->image}}"  width="100px"></td>--}}
{{--                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
                    </div>
                    <div>
                        <x-input-label for="category_id" :value="__('category_id')" />
                        <x-text-input id="category_id" class="block mt-1 w-full" type="text" name="category_id" :value="$plant->category_id" required autofocus />
                        {{--                        <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
                    </div>
                    <br>
                        <x-primary-button class="ml-3">
                            {{ __('update product') }}
                        </x-primary-button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
