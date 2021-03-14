<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg my-4 px-4 py-4">
    @if (session()->has('message'))
    <div class="bg-green-300 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
      <div class="flex">
        <div>
          <p class="text-sm">{{ session('message') }}</p>
        </div>
      </div>
    </div>
   @endif
    <h3 class="panel-heading">Create Customer</h3>
    <form wire:submit.prevent="store">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
         <div class="form-group">
            <label for="name"> Name* </label>
            <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" value="{{ old('name') }}" wire:model="name">
            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone* </label>
            <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" type="text" name="phone" value="{{ old('phone') }}"  wire:model="phone">
            @error('phone') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="email"> Email* </label>
            <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email"  value="{{ old('address') }}" wire:model="email">
            @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="address"> address* </label>
            <input class="shadow appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-500 leading-tight focus:outline-none focus:shadow-outline" type="text" name="address" value="{{ old('address') }}"  wire:model="address">
            @error('address') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>
        <div class="form-group">
            <label for="status">Status* </label>
            <select wire:model="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="status">
            <option value="{{ old('status') }}"></option>    
            <option name="status" value='paid'>active</option>
            <option name="status" value='not-paid'>Not active</option>
            </select>
            @error('status') <span class="text-red-500">{{ $message }}</span>@enderror
        </div> 
        <div class="form-group">
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold my-5 py-2 w-full rounded">Submit</button>
        </div>
    </form>
            <div class="flex flex-row my-5 justify-between w-full">
                <h2 class="text-2xl leading-tight">
                  Customer list
                </h2>
               <div class="flex w-full max-w-sm space-x-3" >
                  <input type="text" wire:model="search"  class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Recherche par Nom Client" />
                </div>
            </div>
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th>ID.</th>
                        <th scope="col" class="px-5 py-3   border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">name</th>
                        <th  scope="col" class="px-5 py-3   border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">phone</th>
                        <th  scope="col" class="px-5 py-3   border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">email</th>
                        <th  scope="col" class="px-5 py-3   border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">address</th>
                        <th  scope="col" class="px-5 py-3   border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">status</th>
                        <th scope="col" class="px-5 py-3   border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">Created At</th>
                        <th scope="col" class="px-5 py-3   border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">Updated At</th>
                        <th  scope="col" class="px-5 py-3   border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    @foreach ($customers as $customer)
                        <td>{{ $customer->id }}</td>
                        <td class="px-5 py-5 border-b border-gray-200  text-sm">{{ $customer->name }}</td>
                        <td class="px-5 py-5 border-b border-gray-200  text-sm">{{ $customer->phone}} </td>
                        <td class="px-5 py-5 border-b border-gray-200  text-sm"> {{ $customer->email }} </td>
                        <td class="px-5 py-5 border-b border-gray-200  text-sm">{{ $customer->address }}</td>
                        <td class="px-5 py-5 border-b border-gray-200  text-sm">{{ $customer->status }}</td>
                        <td class="px-5 py-5 border-b border-gray-200  text-sm">{{ $customer->created_at }}</td>
                        <td class="px-5 py-5 border-b border-gray-200  text-sm">{{ $customer->updated_at }}</td>
                        <td class="border flex px-5 py-3">
                    {{--     @can('customers-delete')    --}}                     
                
                    <a href="{{ route('customers.edit', $customer->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-4 px-4 py-2 rounded">Edit</a>
                {{--        <button wire:click="edit({{ $customer->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-5 py-2.5 rounded">Modifier</button> --}}     
                       <button wire:click="delete({{ $customer->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold my-4 px-4 py-2 rounded">Supprimer</button>
                         {{--  @endcan --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $customers->links('layouts.tailwind') }}
        </div>
        </div>