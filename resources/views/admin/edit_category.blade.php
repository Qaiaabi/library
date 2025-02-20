<!DOCTYPE html>
<html lang="id">

<head>
    @include('admin.css')
    <style>
        /* Styling Card */
        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h4 {
            color: #343a40;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Form Styling */
        .form-label {
            font-weight: bold;
            color: #555;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        /* Button Styling */
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-warning {
            background-color: #ffc107;
            color: black;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        /* Alert Message */
        .alert {
            text-align: center;
            font-size: 14px;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
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

            <h4>Edit Kategori</h4>
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ url('update_category', $data->id) }}" method="Post">
                        @csrf
                        <div class="mb-3">
                            <label for="cat_name" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="cat_name" name="cat_name" value="{{$data->cat_title}}" required>
                        </div>
                        <input class="btn btn-primary" type="submit" value="Simpan Perubahan">
                        <a href="{{ url('category_page') }}" class="btn btn-warning">Kembali</a>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    @include('admin.footer')

</body>

</html>