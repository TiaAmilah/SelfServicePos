<h1>Profile</h1>
<hr>
<table border='0'>
    @if($nama == 'Tia Amilah')
    <tr>
    @else
    <tr>
        <td>Nama Lengkap</td>
        <td>{{$nama}}</td>
    <tr>
    @endif
</table> 
<hr>
<h1>Contoh pengulangan</h1>
<table>
    @foreach($data_array['nama'] as $data)
    <tr>
        <td>Nama</td>
        <td>Data</td>
</tr>
@empty
</tr>
<td colspan="2">Data Masih Kosong</td>
</tr>
@endforelse
</table