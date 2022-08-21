<x-app-layout>
    <x-slot name="header"></x-slot>


    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-center">
                    <x-auth-validation-errors class="my-2" :errors="$errors" />
                </div>
                <div class="flex justify-center w-1/2 mx-auto items-center p-6 bg-white border-b border-gray-200">
                    <form method="POST" class="w-full" action="{{ route('link.store') }}">
                        @csrf
                        <div class="flex w-full">
                            <div class="mt-1 flex w-full rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                                    <label for="company-website"> Website </label>
                                </span>
                                <input type="text" name="link" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="www.example.com">
                            </div>
                        </div>
                        <div class="px-4 py-3 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
