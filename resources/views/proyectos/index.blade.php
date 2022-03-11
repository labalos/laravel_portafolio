<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Portafolio de Proyectos Realizados por COSEMA') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
            <a type="button" href="{{ route('proyectos.create') }}" class="bg-indigo-500 px-12 py-2 rounded text-gray-200 font-semibold hover:bg-indigo-800 transition duration-200 each-in-out">Crear</a>
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th style="display: none;">ID</th>
                        <th class="border px-4 py-2">NOMBRE</th>
                        <th class="border px-4 py-2">DESCRIPCION</th>
                        <th class="border px-4 py-2">URL</th>
                        <th class="border px-4 py-2">IMAGEN</th>
                        <th class="border px-4 py-2">ACCIONES</th>
                    </tr>  
                </thead>    
                <tbody>
                    @foreach ($proyectos as $proyecto)
                    <tr>
                        <td style="display: none;">{{$proyecto->id}}</td>
                        <td>{{$proyecto->nombre}}</td>
                        <td>{{$proyecto->descripcion}}</td>
                        <td>{{$proyecto->url}}</td>

                        <td  class="border px-14 py-1">
                            <img src="/imagen/{{$proyecto->imagen}}" width="60%">
                        </td>  

                        <td class="border px-4 py-2">
                            <div class="flex justify-center rounded-lg text-lg" role="group">
                                <!-- botón mostrar -->
                                <a href="{{ route('proyectos.show', $proyecto->id) }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Show</a>

                                <!-- botón editar -->
                                <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="bg-transparent hover:bg-green-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Edit</a>

                                <!-- botón borrar -->
                                <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" class="formEliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-transparent hover:bg-red-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach   
                </tbody>  
                     
            </table>   
                <div>
                    {!! $proyectos->links() !!}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

<script>
    (function () {
  'use strict'
  //debemos crear la clase formEliminar dentro del form del boton borrar
  //recordar que cada registro a eliminar esta contenido en un form  
  var forms = document.querySelectorAll('.formEliminar')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {        
          event.preventDefault()
          event.stopPropagation()        
          Swal.fire({
                title: '¿Confirma la eliminación del Proyecto?',        
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#2a7fc9',
                cancelButtonColor: '#db621d',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                    Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.','success');
                }
            })                      
      }, false)
    })
})()
</script>