<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Proximas clases
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-white max-w-2xl divide-y">
                    @forelse ($clasesProgramadas as $claseProgramada)
                  <div class="py-6">
                     <div class="flex gap-6 justify-between">
                        <div>
                           <p class="text-2xl font-bold text-purple-700">{{ $claseProgramada->tipo_clases->nombre }}</p>
                           <span class="text-slate-600 text-sm">{{ $claseProgramada->tipo_clases->minutos }} minutos</span>
                        </div>
                        <div class="text-right flex-shrink-0">
                           <p class="text-lg font-bold">{{ $claseProgramada->date_time->format('g:i a') }}</p>
                           <p class="text-sm">{{ $claseProgramada->date_time->format('jS M') }}</p>
                        </div>
                     </div>
                     <div class="mt-1 text-right">
                        <form method="post" action="{{ route('programadas.destroy', $claseProgramada) }}">
                           @csrf
                           @method('DELETE')
                           <x-danger-button class="px-3 py-1">Cancelar</x-danger-button>
                        </form>
                     </div>
                  </div>
                  @empty
                  <div>
                     <p>No tienes ninguna clase programada próximamente</p>
                     <a class="inline-block mt-6 underline text-sm" href="{{ route('programadas.create') }}">
                        Programa
                     </a>
                  </div>
                  @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>