@extends('layouts.app') @section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            <h3>Books</h3>
            <td>
                <a href="{{ route('books.create') }}" type="submit" class="btn btn-primary">Thêm</a>
            </td>
            @if (session('success'))
                <div class="alert alert-success" time>
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Ten sach</th>
                        <th scope="col">Ten Tac Gia</th>
                        <th scope="col">Mo Ta</th>
                        <th scope="col">Gia</th>
                        <th scope="col">Ngay Xuat Ban</th>
                        <th scope="col">Thao tac</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->book_name }}</td>
                            <td>{{ $item->book_author }}</td>
                            <td>{{ Str::limit($item->book_describe, 50) }}</td>
                            <td>{{ $item->book_price }}</td>
                            @if ($item->publication_date)
                                <td>{{ \Carbon\Carbon::parse($item->publication_date)->format('d-m-Y') }}</td>
                            @else
                                <td>dd/mm/yyyy</td>
                            @endif
                            <td>
                                <a href="{{ route('books.edit', ['id' => $item->id]) }}" type="submit"
                                    class="btn btn-primary">Sua</a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('books.destroy', ['id' => $item->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xoa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="py-5 rounded mb-5">
                {{ $books->links('pagination::bootstrap-5') }}
                {{-- <a href="{{ $books->previousPageUrl() }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                        <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                    </svg>
                </a>
                @for ($i = 1; $i <= $books->lastPage(); $i++)
                    <a href="{{ $books->url($i) }}">{{ $i }}</a>
                @endfor
                <a href="{{ $books->nextPageUrl() }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708"/>
                        <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708"/>
                    </svg>
                </a> --}}

                {{-- <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="{{ $books->previousPageUrl() }}">Previous</a></li>
                        @for ($i = 1; $i <= $books->lastPage(); $i++)
                            <li class="page-item"><a class="page-link" href="{{ $books->url($i) }}">{{ $i }}</a></li>
                        @endfor

                      <li class="page-item"><a class="page-link" href="{{ $books->nextPageUrl() }}">Next</a></li>
                    </ul>
                  </nav> --}}

            </div>
        </div>
    </div>
@endsection
