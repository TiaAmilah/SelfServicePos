<html>
    <title>Product</title>
    <body>
        <h2>List Product</h2>
        <hr>
        @if(session()->has('success'))
            <h3>{{ session('success') }}</h3>
        @endif
        <a href="{{ URL('produk/create') }}">Create Product</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($produk as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->product }}</td>
                        <td>{{ $data->price }}</td>
                        <td>{{ $data->stock }}</td>
                        <td>
                            <a href="{{ URL('product')}}/{{ $data->id }}/edit">Edit</a>
                            <a href="{{ route('product.edit', $data->id) }}">Edit</a>
                            <form onsubmit="return confirm('Apakah anda yakin ?');" 
                                    action="{{ URL('/product') }}/{{ $data->id }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">List Product Empty</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </body>
</html>