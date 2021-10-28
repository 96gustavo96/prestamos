<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nuevo Prestamo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden  sm:rounded-lg">
                
                <form class="w-full max-w-lg" action="{{route('cuentas.store')}}" method="post">
                    @csrf
                    <!-- component -->
                        <div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
                            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                                <div class="lg:col-span-2">
                                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                    <div class="md:col-span-5">
                                        <label for="full_name">ID Cliente</label>
                                        <input type="text" name="cliente_id" id="cliente_id" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                                    </div>

                                    <div class="md:col-span-5">
                                        <label for="email">Articulo</label>
                                        <input type="text" name="Articulo" id="Articulo" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                                    </div>

                                    <div class="md:col-span-3">
                                        <label for="address"> Forma de Pago</label>
                                        <input type="text" name="F_Pago" id="F_Pago" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                                    </div>
                                    <div class="md:col-span-3">
                                        <label for="address"> Cantidad de Pagos</label>
                                        <input type="number" name="C_Pagos" id="C_Pagos" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                                    </div>

                                    <div class="md:col-span-2">
                                        <label for="city">Cuotas</label>
                                        <input type="number" name="Cuotas" id="Cuotas" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="city">Fecha de Inicio</label>
                                        <input type="date" name="F_Inicio" id="F_Inicio" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="city">Fecha de Vencimiento</label>
                                        <input type="date" name="F_Vencimiento" id="F_Vencimiento" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
                                    </div>
                                    <div class="md:col-span-1">
                                        <label for="zipcode">Observaciones</label>
                                        <input type="text" name="Observaciones" id="Observaciones" class="transition-all flex items-center h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="" value="" />
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
                    <form action="{{ route('pagos.create') }}" method="POST">
                    @csrf
                        <?php 
                            $count=1;
                        ;?>
                             
                        <button type="submit" class="btn btn-primary btn-sm pull-right">Submit</button>
                        <a href="../mostrar.php">mostra</a>
                    </form>
            </div>
        </div>
    </div>

</x-app-layout>