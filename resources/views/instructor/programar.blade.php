<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Programa una clase
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Instructor
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 text-gray-900">
                    <form action="{{ route('programadas.store') }}" method="post" class="max-w-lg">
                        @csrf
                        <div class="space-y-6">
                            <div>
                                <label class="text-sm text-white">Selecciona el tipo de clase</label>
                                <select name="tipo_clases_id" class="block mt-2 w-full dark:bg-gray-600 border-gray-500 focus:ring-0">
                                    @foreach ($tipos_clase as $tipo_clase)
                                        <option value="{{ $tipo_clase->id }}">{{ $tipo_clase->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex gap-6">
                                <div class="flex-1">
                                    <label class="text-sm text-white">Día</label>
                                    <input type="date" name="dia" class="block mt-2 w-full dark:bg-gray-600  sborder-gray-500 focus:ring-0" min="{{ date('Y-m-d', strtotime('tomorrow')) }}">
                                </div>
                                <div class="flex-1">
                                    <label class="text-sm text-white">Hora</label>
                                    <select type="time" name="hora" class="block mt-2 w-full dark:bg-gray-600 border-gray-500 focus:ring-0">
                                        <option value="05:00:00">5 am</option>
                                        <option value="06:00:00">6 am</option>
                                        <option value="07:00:00">7 am</option>
                                        <option value="08:00:00">8 am</option>
                                        <option value="17:00:00">5 pm</option>
                                        <option value="18:00:00">6 pm</option>
                                        <option value="19:00:00">7 pm</option>
                                        <option value="20:00:00">8 pm</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                @error('date_time')
                                    <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <x-primary-button>Programar</x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
