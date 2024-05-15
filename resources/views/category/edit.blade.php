<div class="row mt-sm-4">
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="form-group col-12">
                <label>Name</label>
                <input type="text"
                    class="form-control @error('name')
                      is-invalid
                  @enderror"
                    id="name" name="name" value="{{ $category->name }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group text-right">
            <input type="hidden" id="id" name="id" value="{{ $category->id }}">
            <button class="btn btn-warning" onclick="update({{$category->id}});">Update Data</button>
        </div>
    </div>
</div>
