<x-layout title="Filter Presensi">
    <x-navbar-teacher>
    </x-navbar-teacher>

    <div class=" px-4 py-10 sm:py-0 sm:mx-[250px]">
        @if ($errors->any())
            <div id="error-any" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <div class="flex justify-between">
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button class="btn-error-any p-3" onclick="closeErrorBtn('error-any')">&#10006</button>
                </div>
            </div>
        @endif

        <div class="p-2  border rounded-md shadow-sm sm:px-10 sm:w-2/3 sm:mx-auto sm:py-10">
            <h1 class="font-bold text-center text-simipa-1 mb-5 sm:text-xl">Lihat Presensi</h1>
            <form action="/teacher/attendance/read" method="GET">
                <div class="mb-3">
                    <label for="name" class="block font-semibold mb-1">Rombongan Belajar</label>
                    <select name="group_id" id="groupSelect" class="border w-full rounded-lg px-2 py-1.5" required>
                        @foreach ($groups as $g)
                            <option value="{{ $g->id }}">{{ $g->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="mb-3">
                    <label for="activity" class="block font-semibold mb-1">Jenis Presensi</label>
                    <select name="activity_id" id="activity" class="border w-full rounded-lg px-2 py-1.5" required>
                        @foreach ($activities as $act)
                            <option value="{{ $act->id }}">{{ $act->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-10">
                    <label for="day" class="block font-semibold mb-1">Tanggal</label>
                    <input type="date" id="day" name="day" class="w-full px-2 py-2 border rounded-lg">
                </div>
                <div class="flex justify-end mt-3">
                    <button type="button" onclick="batal()"
                        class="px-4 py-1 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 mr-2">Batal</button>
                    <button type="submit"
                        class="px-4 py-1 bg-simipa-2 text-white rounded hover:bg-gray-400 mr-2">Lihat</button>
                </div>
            </form>
        </div>

    </div>

    <script>
        function closeErrorBtn(id) {
            document.getElementById(id).classList.toggle('hidden');
        }

        function batal() {
            window.location.href = '/';
        }
    </script>
</x-layout>
