<x-layout title="Edit Product '{{$product->name}}'">
    <div class="row d-flex justify-content-center">
        <div class="col-md-7 card p-4 m-3">
            <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3 mt-3">
                    <label class="form-label">Name:</label>
                    <input type="text" class="form-control" value="{{$product->name}}" id="name" placeholder="Enter product name" name="name">
                    @if ($errors->has('name'))
                        <span class="text-secondary">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="mb-3 mt-3">
                    <label class="form-label">Description:</label>
                    <textarea id="editor" name="description">{{$product->description}}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-secondary">{{$errors->first('description')}}</span>
                    @endif
                </div>
                <div class="mb-3 mt-3">
                    <label class="form-label">Product Image:</label>
                    <input type="file" class="form-control" name="image">
                    @if ($errors->has('image'))
                        <span class="text-secondary">{{$errors->first('image')}}</span>
                    @endif
                </div>
                <div class="mb-3 mt-3">
                    <button type="submit" class="btn btn-dark">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
