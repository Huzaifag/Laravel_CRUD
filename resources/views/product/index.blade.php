<x-layout title="Manage Products">
    <div class="text-end">
        <a class="btn btn-sm btn-dark mx-5" href="{{route('product.create')}}">Add new product</a>
    </div>
    <div>
        <table class="table" id="myTable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product )
              <tr>
                <th scope="row">{{@$loop->index+1}}</th>
                <td><a href="{{route('product.show', $product->id)}}">{{$product->name}}</a></td>
                <td>{!! $product->description !!}</td>
                <td><img src="products/{{$product->image}}" class="rounded-circle" height="50" width="50" alt=""></td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                          Action
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="{{route('product.delete', $product->id)}}">Delete</a></li>
                          <li><a class="dropdown-item" href="{{route('product.edit', $product->id)}}">Edit</a></li>
                        </ul>
                      </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
</x-layout>
