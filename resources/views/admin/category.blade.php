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

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
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

            <h4>Tambah Kategori</h4>
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ url('add_category') }}" method="Post">
                        @csrf
                        <div class="mb-3">
                            <label for="namaKategori" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" name="category" placeholder="Masukkan nama kategori" required>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Add Category">
                    </form>

                    <!-- Tabel dengan styling -->
                    <table>
                        <thead>
                            <tr>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->cat_title }}</td>
                                <td class="action-buttons">
                                    <a href="{{ url('edit_category', $data->id) }}" class="btn btn-warning">
                                        <i class="bi bi-pencil-square"></i> Update
                                    </a>
                                    <button class="btn btn-danger delete-btn" data-url="{{ url('cat_delete', $data->id) }}">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <!-- Footer -->
        @include('admin.footer')
    </div>
</body>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const deleteButtons = document.querySelectorAll(".delete-btn");

        deleteButtons.forEach(button => {
            button.addEventListener("click", function () {
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
