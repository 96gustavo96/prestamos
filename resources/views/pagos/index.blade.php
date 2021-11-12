<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('PAGOS') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden  sm:rounded-lg">
                <div class="grid grid-cols-3 gap-6">
                <div class="col-span-3 sm:col-span-2 ">
                    <form action="{{route('pagos.index')}}" method="get">
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
                            Buscar
                            </span>
                            <input value="{{$Busqueda}}" type="text" name="Buscar" id="company-website" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="DNI / Nombre y Apellido / ID">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Buscar
                            </button>
                        </div>
                    </form>                    
                </div>

                </div>
                <!-- component -->
                <div class="overflow-x-auto py-2">   
                    <div class="min-w-screen min-h-screen bg-gray-100 flex justify-center bg-gray-100 font-sans overflow-hidden">
                        <div class="w-full lg:w-5/6">
                            <div class="bg-white shadow-md rounded my-6">
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">#</th>
                                            <th class="py-3 px-6 text-left">Id cuenta</th>
                                            <th class="py-3 px-6 text-center">Monto</th>
                                            <th class="py-3 px-6 text-center">Fecha de Pago</th>
                                            <th class="py-3 px-6 text-center">Detalles</th>
                                            <th class="py-3 px-6 text-center">Situacion</th>
                                            <th class="py-3 px-6 text-center">N° Cuota</th>
                                            <th class="py-3 px-6 text-center">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                        @if(count($pagos)<=0)
                                            <tr>
                                                <td colspan="6">No Hay datos</td>
                                            </tr>
                                        @else
                                        @foreach($pagos as $pago)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMF6ARkJLHsIqZprgrtcupTNF-O9BF9SeAPQ&usqp=CAU" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                    ID: {{$pago->id}}
                                                    </div>
                                                </div>
                                                
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                {{$pago->cuenta_id}}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                {{$pago->Monto}}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{$pago->F_Pago}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">Detalles: {{$pago->Detalles}}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{$pago->Situacion}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{$pago->N_Cuota}}
                                            </td>
                                            @if($pago->Situacion!='Pagado')
                                            <td class="py-3 px-6 text-center">                                            
                                                <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <a href="/pagos/mostrar/{{$pago->id}}" class="btn btn-outline-success">Pagar
                                                    </a>
                                                </div>
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                {{$pagos->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>