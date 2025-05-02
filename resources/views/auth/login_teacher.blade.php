<x-layout title="Login | Guru">

    <div class="w-full bg-simipa-5 border">
        <div class="w-full flex justify-center items-center min-h-screen  px-8">
            <div class="w-full md:max-w-sm rounded-xl bg-white p-10 ">
                @if (session('success'))
                    <div class="bg-green-500 text-white p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class=" text-red-700 p-4 rounded mb-4 text-center">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h1 class="text-center text-3xl font-bold text-simipa-1">Login</h1>
                <form action="/teacher/login" class="mt-10" method="POST">
                    @csrf
                    <div class="mb-10">
                        <input type="text" name="nik" id="nik" placeholder="nik "
                            class="border-0 border-b w-full focus:outline-none py-1.5">
                    </div>
                    <div class="mb-10">
                        <input type="password" name="password" id="password" placeholder="password"
                            class="border-0 border-b w-full focus:outline-none py-1.5">
                    </div>
                    <div class="w-full text-center">
                        <button type="submit"
                            class="px-16 py-2 bg-simipa-2 text-white rounded-full lg:px-20 hover:cursor-pointer hover:bg-simipa-3">Login
                            Guru</button>
                    </div>
                </form>
                <div class="mt-8">
                    <h3 class="text-simipa-1 font-medium text-center text-sm">Belum mempunyai akun? daftar <a
                            href="/teacher/register" class="hover:underline text-blue-500">disini</a></h3>
                    <h3 class="text-simipa-2 text-center text-sm mt-5 hover:underline"><a href="/admin/login">Login
                            sebagai
                            admin</a></h3>
                </div>
            </div>
        </div>
    </div>
</x-layout>
