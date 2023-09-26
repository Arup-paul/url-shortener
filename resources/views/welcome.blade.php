<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-black-600 hover:text-black-900 dark:text-black-400 dark:hover:text-indigo-500 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-black-600 hover:text-black-900 dark:text-black-400 dark:hover:text-indigo-500 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-black-600 hover:text-black-900 dark:text-black-400 dark:hover:text-indigo-500 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif

                <div class="p-6 text-gray-900">

                    <table class="min-w-full border border-gray-300">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">#</th>
                            <th class="px-6 py-3 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">Url</th>
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
                                        <a class="underline" href="{{ route('url.shortener', $url->short_url) }}" target="_blank">
                                            {{ route('url.shortener', $url->short_url) }}
                                        </a>

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


