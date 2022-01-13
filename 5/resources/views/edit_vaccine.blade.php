@extends("nav")
@section("target")

            <h3 class="mt-5 mb-5 text-center">
                Edit Vaccine
            </h3>
            
            <div class="row">
              <div class="col-10 mx-auto">
                <form action="/vaksin/{{ $vaksin->id}}" method="POST" enctype="multipart/form-data">
                @method('PUT')  
                @csrf
                  <label for="vaccine-name" class="form-label">Vaccine Name</label>
                  <div class="input-group mb-3">
                    <input name="name" value="{{ $vaksin->name }}" type="text" class="form-control" id="vaccine-name">
                  </div>

                  <label for="price" class="form-label">Price</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text">Rp</span>
                    <input name="price" value="{{ $vaksin->price }}" type="number" class="form-control" id="price" aria-label="Amount">
                  </div>

                  <label for="description" class="form-label">Description</label>
                  <div class="input-group mb-3">
                    <textarea name="description" class="form-control" id="description" aria-label="With textarea">{{ $vaksin->description }}</textarea>
                  </div>

                  <label for="upload-file" class="form-label">Upload File</label>
                  <div class="input-group mb-3">
                    <input name="image" type="file" id="upload-file">
                  </div>

                  <div class="input-group mb-3">
                    <button class="btn btn-primary">UPDATE</button>
                  </div>
                </form>
              </div>
            </div>

@endsection