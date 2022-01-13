@extends("nav")
@section("target")

@if($pasien->isEmpty())
                <div class="text-center">
                <div class="text-muted mb-2">There is no data</div>
                <a href="/pasien/create" class="btn btn-primary">Add Vaccine/Patient</a>
                </div>
@else
                <a href="/pasien/create" class="btn btn-primary">Add Patient</a>
                <table class="table mt-4">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Vaccine</th>
                    <th scope="col">Name</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($pasien as $pas)
                    <tr>
                    <th scope="row">{{ $pas->id }}</th>
                    <td>{{ $pas->vaccine_id }}</td>
                    <td>{{ $pas->name }}</td>
                    <td>{{ $pas->nik }}</td>
                    <td>{{ $pas->alamat }}</td>
                    <td>{{ $pas->no_hp }}</td>
                    <td>
                        <a href="/pasien/{{ $pas->id }}/edit" class="btn btn-warning">Edit</a>
                        <form action="/pasien/{{ $pas->id}}" method="POST">
                        @method('delete')    
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                @endforeach
                </tbody>
                </table>
@endif
@endsection
