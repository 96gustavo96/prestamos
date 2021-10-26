<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden  sm:rounded-lg">
                
                <form class="w-full max-w-lg" action="{{route('clientes.store')}}" method="post">
                    @csrf
                    <!-- component -->
                        <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
                            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                                <div class="lg:col-span-2">
                                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-5">
                                        <label for="full_name">DNI</label>
                                        <input type="text" name="DNI" id="DNI" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                    </div>

                                    <div class="md:col-span-5">
                                        <label for="email">Nombre y  Apellido</label>
                                        <input type="text" name="Nombre_y_Apellido" id="Nombre_y_Apellido" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="email@domain.com" />
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="address"> Nacimiento</label>
                                        <input type="date" name="Nacimiento" id="Nacimiento" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                                    </div>
                                    <div class="md:col-span-3">
                                        <label for="address"> Telefono</label>
                                        <input type="number" name="Telefono" id="Telefono" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                                    </div>

                                    <div class="md:col-span-2">
                                        <label for="city">Domicilio</label>
                                        <input type="text" name="Domicilio" id="Domicilio" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="city">Barrio</label>
                                        <input type="text" name="Barrio" id="Barrio" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="city">Localidad</label>
                                        <input type="text" name="Localidad" id="Localidad" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                                    </div>
                                    <div class="md:col-span-1">
                                        <label for="zipcode">Rubro</label>
                                        <input type="text" name="Rubro" id="Rubro" class="transition-all flex items-center h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="" value="" />
                                    </div>


                                    <div class="md:col-span-5 text-right">
                                        <div class="inline-flex items-end">
                                        <button type="submit" value="Guardar" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Enviar</button>
                                        <button type="reset" value="Cancelar" class="bg-transparent-500 hover:bg-transparent-700 text-black font-bold py-2 px-4 rounded">Cancelar</button>
                                        </div>
                                    </div>

                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                </form>
                
            </div>
        </div>
    </div>

</x-app-layout>