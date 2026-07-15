<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Unos novog studenta
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">

            <div class="overflow-hidden rounded-lg bg-white shadow">
                <div class="p-6">

                    <form method="POST" action="{{ route('students.store') }}">
                        @csrf

                        <div class="space-y-6">

                            <div>
                                <label for="ime" class="block text-sm font-medium text-gray-700">
                                    Ime
                                </label>

                                <input
                                    type="text"
                                    id="ime"
                                    name="ime"
                                    value="{{ old('ime') }}"
                                    required
                                    minlength="2"
                                    maxlength="255"
                                    autofocus
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                >

                                @error('ime')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div>
                                <label for="prezime" class="block text-sm font-medium text-gray-700">
                                    Prezime
                                </label>

                                <input
                                    type="text"
                                    id="prezime"
                                    name="prezime"
                                    value="{{ old('prezime') }}"
                                    required
                                    minlength="2"
                                    maxlength="255"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                >

                                @error('prezime')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">
                                    Status
                                </label>

                                <select
                                    id="status"
                                    name="status"
                                    required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                >
                                    <option value="">Odaberite status</option>

                                    <option
                                        value="redovni"
                                        @selected(old('status') === 'redovni')
                                    >
                                        Redovni
                                    </option>

                                    <option
                                        value="izvanredni"
                                        @selected(old('status') === 'izvanredni')
                                    >
                                        Izvanredni
                                    </option>
                                </select>

                                @error('status')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div>
                                <label for="godiste" class="block text-sm font-medium text-gray-700">
                                    Godište
                                </label>

                                <input
                                    type="number"
                                    id="godiste"
                                    name="godiste"
                                    value="{{ old('godiste') }}"
                                    min="1980"
                                    max="{{ date('Y') }}"
                                    step="1"
                                    required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                >

                                @error('godiste')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div>
                                <label for="prosjek" class="block text-sm font-medium text-gray-700">
                                    Prosjek
                                </label>

                                <input
                                    type="number"
                                    id="prosjek"
                                    name="prosjek"
                                    value="{{ old('prosjek') }}"
                                    min="1"
                                    max="5"
                                    step="0.01"
                                    required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                >

                                @error('prosjek')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div>
                                <label for="stipendija" class="block text-sm font-medium text-gray-700">
                                    Stipendija
                                </label>

                                <input
                                    type="number"
                                    id="stipendija"
                                    name="stipendija"
                                    value="{{ old('stipendija', '0.00') }}"
                                    min="0"
                                    step="0.01"
                                    required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                                >

                                @error('stipendija')
                                <p class="mt-1 text-sm text-red-600">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <div class="flex gap-3">
                                <button
                                    type="submit"
                                    class="rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-700"
                                >
                                    Spremi studenta
                                </button>

                                <a
                                    href="{{ route('students.index') }}"
                                    class="rounded-md bg-gray-200 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-300"
                                >
                                    Odustani
                                </a>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
