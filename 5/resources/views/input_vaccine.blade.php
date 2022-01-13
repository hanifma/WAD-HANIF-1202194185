@extends("nav")
@section("target")

            <h3 class="mt-5 mb-5 text-center">
                Input Vaccine
            </h3>

            <div class="row">
              <div class="col-10 mx-auto">
                <form action="/vaksin" method="POST" enctype="multipart/form-data">
                  @csrf
                  <label for="name" class="form-label">Vaccine Name</label>
                  <div class="input-group mb-3">
                    <input name="name" type="text" class="form-control" id="name">
                  </div>

                  <label for="price" class="form-label">Price</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text">Rp</span>
                    <input name="price" type="number" class="form-control" id="price" aria-label="Amount">
                  </div>

                  <label for="description" class="form-label">Description</label>
                  <div class="input-group mb-3">
                    <textarea name="description" class="form-control" id="description" aria-label="With textarea"></textarea>
                  </div>

                  <label for="upload-file" class="form-label">Upload File</label>
                  <div class="input-group mb-3">
                    <input name="image" type="file" id="upload-file">
                  </div>

                  <div class="input-group mb-3 mt-3">
                    <button class="btn btn-primary mt-3">SUBMIT</button>
                  </div>
                </form>
              </div>
            </div>

@endsection