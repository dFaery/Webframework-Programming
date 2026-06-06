<form method="POST" action="{{ route('services.update', $service->id) }}">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label for="name">Service Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $service->name }}">
    </div>

    <div class="form-group mb-3">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="4">{{ $service->description }}</textarea>
    </div>

    <div class="form-group mb-3">
        <label for="availability">Availability</label>
        <input type="date" class="form-control" id="availability" name="availability"
            value="{{ $service->availability }}">
    </div>

    <div class="form-group mb-3">
        <label for="category_id">Category</label>
        <select class="form-control" id="category_id" name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected($service->category_id == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="price">Price</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price"
            value="{{ $service->price }}">
    </div>

    <button type="submit" class="btn btn-primary">
        Update Service
    </button>
</form>
