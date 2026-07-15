<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Studenti
            </h2>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                CRUD Operacije za studenata
            </h2>

            <a
                href="{{ route('students.create') }}"
                class="rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700"
            >
                Dodaj studenta
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 rounded-md border border-green-300 bg-green-100 px-4 py-3 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-hidden rounded-lg bg-white shadow">

                @if ($students->isEmpty())
                    <div class="p-6 text-center text-gray-500">
                        Trenutno nema unesenih studenata.
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">

                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-600">
                                        ID
                                    </th>

                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-600">
                                        Ime i prezime
                                    </th>

                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-600">
                                        Status
                                    </th>

                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-600">
                                        Godište
                                    </th>

                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-600">
                                        Prosjek
                                    </th>

                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase text-gray-600">
                                        Stipendija
                                    </th>

                                    <th class="px-4 py-3 text-right text-xs font-semibold uppercase text-gray-600">
                                        Akcije
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($students as $student)
                                    <tr class="hover:bg-gray-50">

                                        <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-700">
                                            {{ $student->id }}
                                        </td>

                                        <td class="whitespace-nowrap px-4 py-3 text-sm font-medium text-gray-900">
                                            {{ $student->ime }} {{ $student->prezime }}
                                        </td>

                                        <td class="whitespace-nowrap px-4 py-3 text-sm">
                                            @if ($student->status === 'redovni')
                                                <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-800">
                                                    Redovni
                                                </span>
                                            @else
                                                <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-800">
                                                    Izvanredni
                                                </span>
                                            @endif
                                        </td>

                                        <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-700">
                                            {{ $student->godiste }}
                                        </td>

                                        <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-700">
                                            {{ number_format((float) $student->prosjek, 2, ',', '.') }}
                                        </td>

                                        <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-700">
                                            {{ number_format((float) $student->stipendija, 2, ',', '.') }} €
                                        </td>

                                        <td class="whitespace-nowrap px-4 py-3 text-right text-sm">
                                            <div class="flex justify-end gap-2">

                                                <a
                                                    href="{{ route('students.edit', $student) }}"
                                                    class="rounded-md bg-amber-500 px-3 py-2 text-xs font-semibold text-white hover:bg-amber-600"
                                                >
                                                    Uredi
                                                </a>

                                                <form
                                                    method="POST"
                                                    action="{{ route('students.destroy', $student) }}"
                                                    onsubmit="return confirm('Želite li sigurno obrisati ovog studenta?')"
                                                >
                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="rounded-md bg-red-600 px-3 py-2 text-xs font-semibold text-white hover:bg-red-700"
                                                    >
                                                        Obriši
                                                    </button>
                                                </form>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
