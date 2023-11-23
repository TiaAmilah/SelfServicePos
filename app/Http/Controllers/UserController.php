namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
// Menampilkan daftar pengguna
public function index()
{
$users = User::all();
return view('users.index', compact('users'));
}

// Menampilkan formulir untuk membuat pengguna baru
public function create()
{
return view('users.create');
}

// Menyimpan pengguna baru ke dalam database
public function store(Request $request)
{
// Validasi data form
$request->validate([
'name' => 'required',
'email' => 'required|email|unique:users',
// Tambahkan validasi lain sesuai kebutuhan
]);

// Simpan data pengguna ke dalam database
User::create($request->all());

return redirect('/users')->with('success', 'Pengguna berhasil ditambahkan!');
}

// Menampilkan informasi tentang pengguna tertentu
public function show(User $user)
{
return view('users.show', compact('user'));
}

// Menampilkan formulir untuk mengedit pengguna
public function edit(User $user)
{
return view('users.edit', compact('user'));
}

// Menyimpan perubahan pengguna ke dalam database
public function update(Request $request, User $user)
{
// Validasi data form
$request->validate([
'name' => 'required',
'email' => 'required|email|unique:users,email,' . $user->id,
// Tambahkan validasi lain sesuai kebutuhan
]);

// Perbarui data pengguna di dalam database
$user->update($request->all());

return redirect('/users')->with('success', 'Pengguna berhasil diperbarui!');
}

// Menghapus pengguna dari database
public function destroy(User $user)
{
$user->delete();
return redirect('/users')->with('success', 'Pengguna berhasil dihapus!');
}
}