<!DOCTYPE html>
<html lang="id">

<head>
    @include('admin.css')
    <style>
        /* Styling untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @include('admin.sidebar')

    <!-- Page Content -->
    <div id="page-content-wrapper">
        @include('admin.navbar')

        <div class="container mt-4">

            <div>
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
            </div>

            <h4>Add Book</h4>
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ url('book_stock') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Buku" required>
                        </div>
                        <div class="mb-3">
                            <label for="penulis" class="form-label">Penulis</label>
                            <input type="text" class="form-control" name="penulis" placeholder="Masukkan nama Penulis" required>
                        </div>
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre Buku</label>
                            <select class="form-select" name="category_id" required>
                                @foreach($data as $category)
                                <option value="{{ $category->id }}">{{ $category->cat_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" name="penerbit" placeholder="Masukkan nama Penerbit" required>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                            <input type="number" class="form-control" name="tahun_terbit" placeholder="Masukkan Tahun Terbit" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi Buku</label>
                            <textarea class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Jumlah Buku</label>
                            <input type="number" class="form-control" name="stock" placeholder="Masukkan Jumlah Buku" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Tambahkan Sampul Buku</label>
                            <input type="file" class="form-control" name="gambar" required>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Tambah Buku">
                    </form>
                </div>
            </div>

        </div>
        <!-- Footer -->
        @include('admin.footer')
</body>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const deleteButtons = document.querySelectorAll(".delete-btn");

        deleteButtons.forEach(button => {
            button.addEventListener("click", function() {
                const deleteUrl = this.getAttribute("data-url");

                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Kategori yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#6c757d",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = deleteUrl;
                    }
                });
            });
        });
    });
</script>

</html>