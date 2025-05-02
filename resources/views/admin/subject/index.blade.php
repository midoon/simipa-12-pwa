<x-layout title="Mapel | Admin">
    <x-navbar-admin>
        {{-- header --}}
        <header class="flex items-center justify-between">
            <h1 class="text-3xl font-semibold">Data Mata Pelajaran</h1>
            <div class="flex gap-3">
                <button onclick="uploadSubject()" class="px-4 py-2 bg-simipa-1 text-white rounded-lg hover:bg-simipa-2 ">
                    Upload Data Mapel
                </button>
                <button onclick="createSubjectModal()"
                    class="px-4 py-2 bg-simipa-1 text-white rounded-lg hover:bg-simipa-2 ">
                    Tambah Data Mapel
                </button>

            </div>

        </header>
        <hr class="my-4">

        {{-- error handling --}}
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

        {{-- table --}}
        <div>
            {{-- filter --}}
            <div class="mb-3 flex gap-3">
                <form action="/admin/subject" method="GET" class="flex gap-2  items-center w-1/2">
                    <div class="w-full">
                        <select name="grade_id" id="gradeSelect" class="px-2 py-2 w-full rounded-lg shadow-md">
                            <option disabled selected>Filter Kelas</option>
                            @foreach ($grades as $grade)
                                <option value="{{ $grade->id }}">
                                    {{ $grade->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Tombol Aksi -->
                    <button type="submit"
                        class="px-4 py-1 bg-simipa-1 text-white rounded hover:bg-simipa-2">Cari</button>
                </form>
                <form action="/admin/subject" method="GET" class="flex gap-2  items-center w-1/2">
                    <div class="w-full">
                        <input type="text" placeholder="Cari berdasarkan nama" name="name"
                            class="px-2 py-2 w-full rounded-lg shadow-md">
                    </div>
                    <!-- Tombol Aksi -->
                    <button type="submit"
                        class="px-4 py-1 bg-simipa-1 text-white rounded hover:bg-simipa-2">Cari</button>
                </form>
                <div class="flex justify-end  w-full">
                    <a href="/admin/subject">
                        <button type="submit"
                            class="px-8 py-2 bg-simipa-1 text-white rounded-lg hover:bg-simipa-2">Hapus
                            Filter</button>
                    </a>
                </div>
            </div>
            {{-- main table --}}
            <div class="relative overflow-x-auto rounded">
                <table class="w-full text-sm text-left rtl:text-right">
                    <thead class="text-xs text-simipa-1 uppercase bg-gray-300">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kelas
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Deskripsi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Opsi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $subject)
                            <tr class="bg-simipa-6 ">
                                <td class="px-6 py-4 ">
                                    {{ $subject->name }}
                                </td>
                                <td class="px-6 py-4 ">
                                    {{ $subject->grade->name }}
                                </td>
                                <td class="px-6 py-4 ">
                                    <p class="hover:text-blue-500 hover:cursor-pointer"
                                        onclick="showDescription({{ $subject->id }})">Lihat selengkapnya...</p>
                                </td>
                                <td class="px-6 py-4 ">
                                    <div class="flex gap-3">
                                        <button onclick="editSubjectModal({{ $subject->id }})">
                                            <svg class="w-6 h-6 text-gray-800 hover:text-simipa-2 mx-1"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                            </svg>
                                        </button>
                                        <form action="/admin/subject/{{ $subject->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirmDeletion()">
                                                <svg class="w-6 h-6 text-grey-800 hover:text-red-700" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <x-modal-edit-subject :subject="$subject" :grades="$grades"></x-modal-edit-subject>
                            <x-modal-show-subject-desc :subject="$subject"></x-modal-show-subject-desc>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-navbar-admin>

    <x-modal-create-subject :grades="$grades"></x-modal-create-subject>

    <x-modal-upload-subject></x-modal-upload-subject>

    <script>
        function closeErrorBtn(id) {
            document.getElementById(id).classList.toggle('hidden');
        }

        function confirmDeletion() {
            return confirm("Apakah Anda yakin ingin menghapusnya?");
        }

        // create
        function createSubjectModal() {
            document.getElementById('createModalSubject').classList.toggle('hidden');
        }



        // edit
        function editSubjectModal(id) {
            document.getElementById('editModalSubject' + id).classList.toggle('hidden');
        }



        // show more
        function showDescription(id) {
            document.getElementById('showModalSubjectDesc' + id).classList.toggle('hidden');
        }


        // upload
        function uploadSubject() {
            document.getElementById('uploadSubject').classList.toggle('hidden');
        }
    </script>

</x-layout>
