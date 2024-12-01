<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{$title}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
  <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
</head>
<body>
    <!-- Grey with black text -->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" href="/">Products</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('product.create')}}">Add New Product</a>
            </li>
        </ul>
        </div>
    </nav>
    <div class="container">
        <h3 class="my-4">{{$title}}</h3>
        @if ($message = Session::get('status'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        {{$slot}}
    </div>
<!-- Import jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Import Trumbowyg -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js"></script>
<script>
    // Initialize Trumbowyg
    $(document).ready(function () {
        $('#editor').trumbowyg();
        let table = new DataTable('#myTable');
    });

    // Define the getvalue function globally
    function getvalue() {
        var inputValue = $('#editor').val();
        console.log(inputValue);
    }
</script>
</body>
</html>
