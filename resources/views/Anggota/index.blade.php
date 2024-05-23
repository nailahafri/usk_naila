@extends('anggota.master')
@section('content')


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No.
                </th>
                <th scope="col" class="px-6 py-3">
                    Judul
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Peminjaman
                </th>
                <th scope="col" class="px-6 py-3">
                    Admin / Pustakawan
                </th>
                <th scope="col" class="px-6 py-3">
                    Anggota
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Pengembalian
                </th>
            </tr>
        </thead>
        <tbody>

            
            @if ($peminjaman->count())
            @foreach ($peminjaman as $a)    
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $a->detailpeminjaman->detailbuku->buku->f_judul }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $a->f_tanggalpeminjaman }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $a->admin->f_nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $a->anggota->f_nama }}
                        </td>
                        <td class="px-6 py-4">
                        @if ($a->detailpeminjaman->f_tanggalkembali == null)
                                Belum Kembali
                        @else
                            {{ $a->detailpeminjaman->f_tanggalkembali }}
                        @endif
                        </td>
                    </tr>
                @endforeach
            
            @else
                <tr class="text-gray-700 uppercase bg-gray-50 border-b">
                    <td colspan="6" class="px-6 py-4 text-center">
                        ANDA BELUM MEMINJAM BUKU
                    </td>
                </tr>
                

            @endif

        </tbody>
    </table>
</div>

@endsection