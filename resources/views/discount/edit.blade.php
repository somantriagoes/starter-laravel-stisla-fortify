<div class="row mt-sm-4">
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="form-group col-md-6 col-12">
                <label>Name</label>
                <input type="text"
                    class="form-control @error('name')
                      is-invalid
                  @enderror"
                    id="name" name="name" value="{{ $discount->name }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-3 col-12">
                <label>Type</label>
                <select class="form-control @error('type')
                is-invalid @enderror select2" name="type" id="type">
                    <option value="rupiah" {{ $discount->type== 'rupiah' ? "selected" : "" }}>Rupiah</option>
                    <option value="percent" {{ $discount->type== 'percent' ? "selected" : "" }}>Percent (%)</option>
                </select>
                @error('type')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-3 col-12">
                <label>Discount</label>
                <input type="text"
                    class="form-control @error('discount')
                      is-invalid
                  @enderror"
                    id="discount" name="discount" value="{{ $discount->discount }}">
                @error('discount')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group text-right">
            <input type="hidden" id="id" name="id" value="{{ $discount->id }}">
            <button class="btn btn-warning" onclick="update({{$discount->id}});">Update Data</button>
        </div>
    </div>
</div>
