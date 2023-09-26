<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('URL') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(session()->has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <ul>
                            <li class="text-sm">{{session()->get('success')}}</li>
                        </ul>
                    </div>
                @endif
                <div class="p-6 text-gray-900">
                    <a  href="{{route('urls.create')}}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-2 float-right">
                         Add New
                    </a>
                    <table class="min-w-full border border-gray-300">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Short Url</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Long Url</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Total Click</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Action</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @if(isset($urls))
                            @foreach($urls as $key => $url)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                                         {{$key+1}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                                       {{$url->short_url}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                                        {{$url->long_url}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                                      {{$url->clicks}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
                                        <a href="{{route('urls.edit',$url->id)}}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-3 px-4 rounded">Edit</a>

                                        <form action="{{route('urls.destroy',$url->id)}}" method="post" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-700 hover:bg-red-600 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                          @endforeach
                        @endif
                        <!-- More table rows here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
