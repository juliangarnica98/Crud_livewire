<x-slot name="header">
    <h1 class="text-gray-900">Productos</h1>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-x1 sm:rounded-lg px-4 py-4">
            <button wire:click="crear()" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 my-3">Nuevo producto</button>
            @if ($modal)
                @include('livewire.crear')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                       <th class="px-4 py-2">ID</th> 
                       <th class="px-4 py-2">DESCRIPCION</th> 
                       <th class="px-4 py-2">CANTIDAD</th> 
                       <th class="px-4 py-2">ACCIONES</th> 
                    </tr>
                </thead>
                <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td class="border px-4 py-2">{{$product->id}}</td>
                            <td class="border px-4 py-2">{{$product->description}}</td>
                            <td class="border px-4 py-2">{{$product->cantidad}}</td>
                            <td class="border px-4 py-2 text-center">
                                <button wire:click="editar({{$product->id}})" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4">EDITAR</button>
                                <button wire:click="eliminar({{$product->id}})" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4">ELIMINAR</button>
                            </td>     
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
