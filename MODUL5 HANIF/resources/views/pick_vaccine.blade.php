@extends("nav")
@section("target")

@if($vaksin->isEmpty())
            <div class="text-center">
            <div class="text-muted mb-2">There is no data</div>
            </div>
@else
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
            @foreach($vaksin as $vak)
                <div class="col">
                    <div class="card">
                    <img src="/images/upload/{{ $vak->image }}" class="card-img-top" alt="vaccine-img">
                    <div class="card-body">
                        <h5 class="card-title">{{ $vak->name }}</h5>
                        <p class="card-text text-secondary">{{ $vak->price }}</p>
                        <p class="card-text">{{ $vak->description }}</p>
                        <a href="/pasien/{{ $vak->id }}" class="btn btn-primary">Vaccine Now</a>
                    </div>
                    </div>
                </div>
            @endforeach
            </div>
@endif
@endsection