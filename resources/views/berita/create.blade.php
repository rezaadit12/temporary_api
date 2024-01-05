@extends('layout.main')
@section('content')

    <div class="table-content">
        <h3>Tambah Data</h3>
        <table>
           <form action="{{ route('berita.store') }}" method="post">
            @csrf
                <tr>
                    <td>Title</td>
                    <td>:</td>
                    <td><input name="title" type="text"></td>
                </tr>
                <tr>
                    <td>News Content</td>
                    <td>:</td>
                    <td><textarea name="news_content" id="" cols="30" rows="8"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><button>Submit</button></td>
                </tr>
           </form>

        </table>
    </div>
@endsection