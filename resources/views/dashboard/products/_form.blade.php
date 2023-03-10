@csrf
<div class="row p-3">
    <div class="col-md-8">
        <div class="form-group mb-3">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        {{-- <div class="form-group mb-3">
            <label for="category_id">{{ __('Parent') }}</label>
            <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                @foreach(App\Models\Category::all() as $category)
                <option value="{{ $category->id }}" @if ($category->id == old('category_id', $product->category_id)) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('parent_id')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div> --}}
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="sku">SKU</label>
                    <input type="text" id="sku" name="sku" value="{{ old('sku', $product->sku) }}" class="form-control @error('sku') is-invalid @enderror">
                    @error('sku')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="barcode">Barcode</label>
                    <input type="text" id="barcode" name="barcode" value="{{ old('barcode', $product->barcode) }}" class="form-control @error('barcode') is-invalid @enderror">
                    @error('barcode')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="barcode">Price</label>
                    <input type="number" step="0.1" id="barcode" name="price" value="{{ old('price', $product->price) }}" class="form-control @error('price') is-invalid @enderror">
                    @error('price')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="barcode">Compare Price</label>
                    <input type="number" step="0.1" id="compare_price" name="compare_price" value="{{ old('compare_price', $product->compare_price) }}" class="form-control @error('compare_price') is-invalid @enderror">
                    @error('compare_price')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="barcode">Cost</label>
                    <input type="number" step="0.1" id="cost" name="cost" value="{{ old('cost', $product->cost) }}" class="form-control @error('cost') is-invalid @enderror">
                    @error('cost')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <label for="category_id">{{ __('Parent') }}</label>
            <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                @foreach(App\Models\Category::all() as $category)
                <option value="{{ $category->id }}" @if ($category->id == old('category_id', $product->category_id)) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('parent_id')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="quantity">Qauntity</label>
                    <input type="number" id="quantity" min="0" name="quantity" value="{{ old('quantity', $product->quantity) }}" class="form-control @error('quantity') is-invalid @enderror">
                    @error('quantity')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="availability">Availability</label>
                    <select id="availability" name="availability" class="form-control @error('availability') is-invalid @enderror">
                        <option value="">Select One</option>
                        @foreach($availabilities as $key => $availability)
                        <option value="{{ $key }}" @if ($key == old('availability', $product->availability)) selected @endif>{{ $availability }}</option>
                        @endforeach
                    </select>
                    @error('availability')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="">Select One</option>
                        @foreach($status_options as $key => $status)
                        <option value="{{ $key }}" @if ($key == old('status', $product->status)) selected @endif>{{ $status }}</option>
                        @endforeach
                    </select>
                    @error('status')
                    <p class="invalid-feedback">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>
            @error('description')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

    </div>
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="image">Thumbnail</label>
            <div class="mb-2">
                {{-- <img id="thumbnail" src="/storage/{{ $product->image }}" height="188" > --}}
                <img id="thumbnail" src="{{ $category->image_url }}" height="150">
            </div>
            <input type="file"  id="image" name="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="gallery">Gallery</label>
            <div class="row">
                @foreach($product->getMedia('gallery') as $media)
                <div class="col-md-4 mb-2">
                    <img src="{{ $media->getUrl() }}" class="img-fluid" alt="">
                    <label class="text-danger"><input type="checkbox" name="delete_media[]" value="{{ $media->id }}"> Delete</label>
                </div>
                @endforeach
            </div>
            <input type="file" id="gallery" name="gallery[]" multiple class="form-control @error('gallery') is-invalid @enderror">
            @error('gallery')
            <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="tags">Tags</label>
            <x-form.textarea name="tags" />
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">{{ $button }}</button>
            <a href="{{ route('dashboard.categories.index') }}" class="btn btn-light">Cancel</a>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('image').addEventListener('change', function(e) {
    if (this.files && this.files[0]) {
        document.getElementById('thumbnail').src = URL.createObjectURL(this.files[0]);
    }
});
</script>
@endpush
