@extends('layouts.app') @section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            <h3>Chinh sua</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('books.update',['id'=>$book->id]) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label>Ten sach :</label>
                    <input type="text" class="form-control" name="book_name" value="{{$book->book_name}}"/>
                </div>
                <div class="form-group">
                    <label>Tac Gia :</label>
                    <input type="text" class="form-control" name="book_author" value="{{$book->book_author}}"/>
                </div>
                <div class="form-group">
                    <label>Ngay San Xuat :</label>
                    <input type="date" class="form-control" name="publication_date" value="{{$book->publication_date}}"/>
                </div>
                <div class="form-group">
                    <label>Mo Ta :</label>
                    <textarea type="text" class="form-control" name="book_describe" rows="3" maxlength="255">{{$book->book_describe}}</textarea>
                </div>
                <div class="form-group">
                    <label>Gia :</label>
                    <input type="text" class="form-control" name="book_price" value="{{$book->book_price}}"/>
                </div>
                <div class="uper">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="{{route('books.index')}}" class="btn btn-danger">Thoát</a>
                </div>

            </form>
        </div>
</div>
@endsection
