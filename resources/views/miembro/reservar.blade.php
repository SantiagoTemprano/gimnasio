<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Proximas clases
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-white max-w-3xl divide-y">
                    @forelse ($clasesProgramadas as $claseProgramada)
                  <div class="py-6">
                     <div class="flex gap-6 justify-between">
                        <div>
                           <p class="text-2xl font-bold text-purple-700">{{ $claseProgramada->tipo_clases->nombre }}</p>
                           <p class="text-sm dark:text-white">{{ $claseProgramada->instructor->name }}</p>
                           <p class="text-sm mt-2 dark:text-white">{{ $claseProgramada->tipo_clases->descripcion }}</p>
                           <span class="text-slate-600 text-sm">{{ $claseProgramada->tipo_clases->minutos }} minutos</span>
                        </div>
                        <div class="text-right flex-shrink-0">
                           <p class="text-lg font-bold">{{ $claseProgramada->date_time->format('g:i a') }}</p>
                           <p class="text-sm">{{ $claseProgramada->date_time->format('jS M') }}</p>
                        </div>
                     </div>
                     <div class="mt-1 text-right">
                        <form method="post" action="{{ route('reserva.store') }}">
                           @csrf
                           <input type="hidden" name="clase_programada_id" value="{{ $claseProgramada->id }}"></input>
                           <x-primary-button class="px-3 py-1">Reserva</x-primary-button>
                        </form>
                     </div>
                  </div>
                  @empty
                  <div>
                     <p>No hay ninguna clase programada próximamente</p>
                  </div>
                  @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>