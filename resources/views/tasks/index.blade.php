<!DOCTYPE html>
<html>

<head>
    <title>Shark App</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-inverse">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('/create') }}">Create a Task</a>
            </ul>
        </nav>

        <h1>Tasks</h1>

        <!-- will be used to show any messages -->
        @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td><b>ID</b></td>
                    <td><b>Title</b></td>
                    <td><b>Description</b></td>
                    <td><b>Complete Status</b></td>
                    <td><b>Actions</b></td>
                </tr>
            </thead>
            <tbody>
                @php $sno =1;@endphp
                @foreach($tasks as $key => $value)
                <tr>
                    <td><b>{{ $sno++ }}</b></td>
                    <td><b>{{ $value->title }}</b></td>
                    <td><b>{{ $value->description }}</b></td>
                    <td> @if($value->completed == 0)
                        <button class="btn btn-small btn-warning">Pending</button>
                        @elseif($value->completed == 1)
                        <button class="btn btn-small btn-success">Complete</button>
                        @endif
                    </td>

                    <!-- we will also add show, edit, and delete buttons -->
                    <td>

                        <!-- delete the shark (uses the destroy method DESTROY /sharks/{id} -->
                        <!-- we will add this later since its a little more complicated than the other two buttons -->
                        <!-- edit this shark (uses the edit method found at GET /sharks/{id}/edit -->
                        <a class="btn btn-small btn-info" href="{{ URL::to('/' . $value->id . '/edit') }}">Edit</a>
                        <!-- <a class="btn btn-small btn-danger" href="{{ URL::to('/delete/' . $value->id) }}">Delete</a> -->
                        <form action="{{ route('task.delete', $value->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-small btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>