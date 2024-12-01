<x-layout title="Products details">
    <div class="d-flex justify-content-center">
        <div class="card mb-3" style="max-width: 740px;">
            <div class="row g-0 d-flex justify-content-center">
              <div class="col-md-4">
                <img src="/products/{{$product->image}}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">{{$product->name}}</h5>
                  <p class="card-text">{!! $product->description !!}</p>
                  <p class="card-text"><small class="text-muted">Last updated at {!! $product->updated_at !!}</small></p>
                </div>
              </div>
            </div>
        </div>
    </div>
</x-layout>
