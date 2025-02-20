<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\books;


class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) { // Periksa apakah user sudah login
            $user_type = Auth::user()->usertype; // Ambil tipe user

            if ($user_type == 'admin') {
                return view('admin.index');
            } else if ($user_type == 'user') {
                return view('home.index');
            } else if ($user_type == 'petugas') { // Tambahkan petugas
                return view('petugas.index');
            } else {
                return redirect()->back(); // Redirect jika tipe tidak dikenali
            }
        }

        return redirect()->route('login'); // Redirect jika tidak login
    }
    public function category_page(Request $request)
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }
    public function add_category(Request $request)
    {
        $data = new Category;
        $data->cat_title = $request->category;

        $data->save();
        return redirect()->back()->with('message', 'Category berhasil di tambahkan');
    }
    public function cat_delete($id)
    {
        $data = category::find($id);

        $data->delete();
        return redirect()->back();
    }
    public function edit_category($id)
    {
        $data = Category::find($id);

        return view('admin.edit_category', compact('data'));
    }
    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->cat_title = $request->cat_name;
        $data->save();
        return redirect('/category_page')->with('message', 'Category Updated Successfully');
    }
    public function add_book(){
        $data = Category::all();
        return view('admin.add_book', compact('data'));
    }
    public function book_stock(Request $request) {
        $request->validate([
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'stock' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        $gambar = $request->file('gambar');
        $book_image_name = time() . '.' . $gambar->getClientOriginalExtension();
        $gambar->storeAs('public/book', $book_image_name);
    
        $gambarPath = $request->file('gambar')->store('buku', 'public');
    
        $book = new Books();
        $book->judul = $request->judul;
        $book->penulis = $request->penulis;
        $book->category_id = $request->category_id;
        $book->penerbit = $request->penerbit;
        $book->tahun_terbit = $request->tahun_terbit;
        $book->deskripsi = $request->deskripsi;
        $book->stock = $request->stock;
        $book->gambar = $gambarPath;
        $book->save();
    
        return redirect()->back()->with('success', 'Buku berhasil ditambahkan!');
    }
    
    public function view_books()
{
    $books = books::with('category')->get(); // Load relasi category
    return view('admin.view_books', compact('books'));
}
}