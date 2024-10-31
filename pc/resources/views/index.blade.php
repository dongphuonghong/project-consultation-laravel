<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app') @section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            <h3>Pcs</h3>
            <td>
                <a href="{{ route('pc.create') }}" type="submit" class="btn btn-primary">Thêm</a>
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
                        <th scope="col">Ten pc</th>
                        <th scope="col">ten hang </th>
                        <th scope="col">Mo Ta</th>
                        <th scope="col">Gia</th>
                        <th scope="col">Ngay san xuat</th>
                        <th scope="col">Thao tac</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pcs as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->pc_name }}</td>
                            <td>{{ $item->pc_author }}</td>
                            <td>{{ Str::limit($item->pc_describe, 50) }}</td>
                            <td>{{ $item->pc_price }}</td>
                            @if ($item->publication_date)
                                <td>{{ \Carbon\Carbon::parse($item->publication_date)->format('d-m-Y') }}</td>
                            @else
                                <td>dd/mm/yyyy</td>
                            @endif
                            <td>
                                <a href="{{ route('pcs.edit', ['id' => $item->id]) }}" type="submit"
                                    class="btn btn-primary">Sua</a>
                            </td>
                            <td>
                                <form method="post" action="{{ route('pcs.destroy', ['id' => $item->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xoa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection

</body>
</html>