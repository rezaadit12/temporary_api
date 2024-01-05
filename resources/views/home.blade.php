@extends('layout.main')
@section('content')
    
    <div class="table-content">
        <div class="title">
            <h1>PAGE | PORTAL BERITA </h1>
        </div>
        <i class="link"><a href="{{ route('berita.create') }}">Tambah Data</a></i>
        <table border="1" cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Author</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item['title'] }}</td>
                        <td>{{ $item['news_content'] }}</td>
                        <td>{{ $item['writer']['username'] }}</td>
                        <td>
                            <a href="">Delete</a> |
                            <a href="">Update</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection