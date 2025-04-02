<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Proximas clases reservadas
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-white max-w-3xl divide-y">
                    @forelse ($reservas as $reserva)
                  <div class="py-6">
                     <div class="flex gap-6 justify-between">
                        <div>
                           <p class="text-2xl font-bold text-purple-700">{{ $reserva->tipo_clases->nombre }}</p>
                           <span class="text-slate-600 text-sm">{{ $reserva->tipo_clases->minutos }} minutos</span>
                        </div>
                        <div class="text-right flex-shrink-0">
                           <p class="text-lg font-bold">{{ $reserva->date_time->format('g:i a') }}</p>
                           <p class="text-sm">{{ $reserva->date_time->format('jS M') }}</p>
                        </div>
                     </div>
                     <div class="mt-1 text-right">
                        <form method="post" action="{{ route('reserva.destroy', $reserva->id) }}">
                           @csrf
                           @method('delete')
                           <input type="hidden" name="clase_programada_id" value="{{ $reserva->id }}"></input>
                           <x-danger-button class="px-3 py-1">Cancelar</x-danger-button>
                        </form>
                     </div>
                  </div>
                  @empty
                  <div>
                     <p>No hay ninguna clase reservada</p>
                  </div>
                  @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>