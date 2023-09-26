<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit URL') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(session()->has('errors'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-sm">{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif



                <div class="p-6 text-gray-900">
                    <a  href="{{route('urls.index')}}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-2 float-right">
                        Back
                    </a>



                    <form method="post" action="{{ route('urls.update',$url->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="name" :value="__('Enter Url')" />
                            <x-text-input id="name" name="url" type="text" class="mt-1 block w-full" :value="old('url',$url->long_url)"   autofocus autocomplete="url" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
