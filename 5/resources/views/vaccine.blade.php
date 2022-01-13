@extends("nav")
@section("target")

@if($vaksin->isEmpty())
            <div class="text-center">
            <div class="text-muted mb-2">There is no data</div>
                <a href="/vaksin/create" class="btn btn-primary">Add Vaccine</a>
            </div>

@else
            <a href="/vaksin/create" class="btn btn-primary mt-2 mb-2">Add Vaccine</a>
            <table class="table mt-4">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                @foreach($vaksin as $vak)

                    <tr>
                    <th scope="row">{{ $vak->id }}</th>
                    <td>{{ $vak->name }}</td>
                    <td>{{ $vak->price }}</td>
                    <td>
                        <a href="/vaksin/{{ $vak->id }}/edit" class="btn btn-warning">Edit</a>
                        <form action="/vaksin/{{ $vak->id}}" method="POST">
                        @method('delete')    
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
                </tbody>
                </table>

@endif
@endsection