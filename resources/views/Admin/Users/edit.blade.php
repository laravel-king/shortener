<x-app-layout>
    <x-slot name="header">
        Edit - {{ $user->name }} -
    </x-slot>

    <form method="post" action="{{ route('users.update', $user->id) }}" class="flex flex-col mx-auto w-1/2 bg-white shadow-lg rounded-md border border-gray-100 p-6 mt-6">
        @method('PATCH')
        @csrf
        <div class="w-full justify-between mt-4">
            <label class="w-1/6" for="name">Username</label>
                <input id="name" name="name" type="text" @class([
                    'p-2 mt-2 rounded-sm rounded-md focus:ring-2 focus:ring-offset-2 border border-gray-200 w-full',
                    'border-red-500 bg-red-100 focus:border-red-500 focus:ring-red-300'=> $errors->has('name')
                    ]) placeholder="enter username ..." value="{{ $user->name }}" />
            @if($errors->has('name'))
                <span class="text-red-500 text-semibold text-sm mt-4">* {{ $errors->first() }}</span>
            @endif

        </div>

        <div class="w-full justify-between items-center mt-4">
            <label class="w-1/6" for="email">E-mail</label>
            <input id="email" type="email" name="email"
                   @class([
                    'p-2 mt-2 rounded-sm rounded-md focus:ring-2 focus:ring-offset-2 border border-gray-200 w-full',
                    'border-red-500 bg-red-100 focus:border-red-500 focus:ring-red-300'=> $errors->has('email')
                    ])
                   placeholder="enter a valid e-mail ..." value="{{ $user->email }}" />
            @if($errors->has('email'))
                <span class="text-red-500 text-semibold text-sm mt-4">* {{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="w-full justify-between items-center mt-4">
            <label class="w-1/6" for="password">Password</label>
            <input id="password" type="password" name="password"
                   @class([
                    'p-2 mt-2 rounded-sm rounded-md focus:ring-2 focus:ring-offset-2 border border-gray-200 w-full',
                    'border-red-500 bg-red-100 focus:border-red-500 focus:ring-red-300'=> $errors->has('password')
                    ]) placeholder="Leave it blank if not needed!" />
            @if($errors->has('password'))
                <span class="text-red-500 text-semibold text-sm mt-4">* {{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="flex w-full justify-end items-center mt-4">
            <button type="submit" class="bg-green-400 text-green-800 px-6 py-2 rounded-md text-sm">Submit</button>
        </div>
    </form>
</x-app-layout>
