@extends('layouts.main')

@section('container')
<div id="auth">
    <div class="row h-100">
        <div class="col-lg-8 col-12 m-auto">
            <div id="auth-left">
                <h1 class="auth-title">Start for Librarian</h1>
                <p class="auth-subtitle mb-3">Register to become a Librarian</p>
                <p>
                    Perpustakaan khusus merupakan salah satu unit strategis dalam lembaga pemerintah atau swasta yang ditujukan untuk mendukung pelayanan informasi dan dokumentasi di lingkungan lembaga yang bersangkutan. Perpustakaan khusus mempunyai tugas mengumpulkan, mengolah, memelihara, melestarikan dan mendayagunakan informasi dalam bentuk bahan pustaka, baik yang dihasilkan lembaga yang bersangkutan maupun dari pihak luar. Salah satu contoh perpustakaan khusus adalah perpustakaan yang dibentuk oleh lembaga pemerintah yang menangani atau mempunyai misi bidang tertentu dengan tujuan untuk memenuhi kebutuhan materi perpustakaan/informasi di lingkungannya dalam rangka mendukung pencapaian misi instansi induknya.
                </p>
                <p>
                    Menurut Online Dictionary for Library and Information Science (Reitz 2004), disebutkan bahwa perpustakaan khusus adalah sebuah perpustakaan yang didirikan dan dibiayai oleh perusahaan komersial, asosiasi swasta, agen pemerintah, organisasi nonprofit, kelompok dengan ketertarikan di bidang khusus, untuk mempertemukan kebutuhan informasi dari pekerja/karyawan, anggota, atau staf yang sesuai dengan misi dan tujuan organisasi. Cakupan koleksi yang dimiliki biasanya dibatasi pada subjek yang menjadi perhatian organisasi tersebut.
                </p>
                <p>
                    The International Standard for Library Statistic (UNESCO, 1969) mendefinisikan perpustakaan khusus sebagai perpustakaan yang berdiri sendiri yang mencakup satu disipilin atau bidang pengetahuan khusus atau area minat khusus. Istilah perpustakaan khusus meliputi perpustakaan yang secara utama melayani pengguna dengan kategori tertentu, atau terutama menyediakan bagian dokumen spesifik, atau perpustakaan yang dibiayai atau didukung oleh sebuah organisasi untuk melayani pekejaan mereka yang sesuai dengan tujuan/sasaran organisasi.
                </p>
                <p>
                    Dalam Undang-Undang Republik Indonesia Nomor 43 Tahun 2007 Tentang Perpustakaan disebutkan bahwa definisi perpustakaan khusus adalah perpustakaan yang diperuntukkan secara terbatas bagi pemustaka di lingkungan lembaga pemerintah, lembaga masyarakat, lembaga pendidikan keagamaan, rumah ibadah, atau organisasi lain. Secara lebih khusus St. Clair & Williamson (1992) berpendapat bahwa perpustakaan khusus adalah suatu unit atau bagian dari organisasi, terutama menyediakan informasi yang lain dari yang disediakan oleh perpustakaan lain. Perpustakaan perusahaan, atau perpustakaan instansi, atau perpustakaan lembaga negara pada hakikatnya adalah perpustakaan khusus, yaitu sebagai salah satu tipe dari perpustakaan yang mencakup bermacam-macam disiplin ilmu atau badan usaha sesuai dengan sifat dan ciri yang dimiliki tiap instansi atau lembaga yang bersangkutan. ‘Khusus’ benar-benar berarti layanan perpustakaan dikhususkan atau dijalankan untuk kepentingan organisasi atau untuk kebutuhan staf atau karyawannya.
                </p>
                
                <form action="/start-librarian" method="POST">
                    @csrf
                    @method('put')

                    <div class="form-check">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="form-check-input form-check-primary form-check-glow" name="roles" id="rolescheck" required>
                            <label class="form-check-label" for="rolescheck">I have read and agreed with the terms and conditions.</label>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Agree and Get started</button>
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection