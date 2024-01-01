<html>
    <title>Edit Product</title>
    <body>
        <h2>Edit Product</h2>
        <hr>
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ URL('product') }}/{{ $produk->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <table>
                <tr>
                    <th>Product</th>
                    <td>
                        <input type="text" name="product" value="{{ $produk->produk }}" required>
                    </td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>
                        <input type="number" name="price" value="{{ $produk->price }}" required>
                    </td>
                </tr>
                <tr>
                    <th>Stock</th>
                    <td>
                        <input type="number" name="stock" value="{{ $produk>stock }}" required>
                    </td>
                </tr>
            </table>
            <button type="submit">Save</button>
        </form>
    </body>
</html>