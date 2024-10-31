<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layout')
    @section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card ">
        <div class="card-header">
            <h3>Danh sách sách</h3>
        </div>
        <div class="card-body">
            <a href="{{ route('books.create') }}" class="btn btn-primary">Thêm mới</a>        
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sách</th>
                        <th>Số ISBN</th>
                        <th>Giá</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->book_name }}</td>
                        <td>{{ $book->isbn_no }}</td>
                        <td>{{ $book->book_price }}</td>
                        <td>
                            <a href="{{ route('books.edit', ['id' => $book->id]) }}" class="btn btn-warning">Sửa</a>
                            <form method="post" action="{{ route('books.destroy', ['id' => $book->id]) }}"@csrf
                                                        @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</body>
</html>
</body>
</html>