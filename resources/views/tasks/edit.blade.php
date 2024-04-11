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
                <li><a href="{{ URL::to('/') }}">View Tasks</a></li>
            </ul>
        </nav>

        <h1>Edit Task</h1>

        <!-- if there are creation errors, they will show here -->
        <form action="{{ url('/update') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="id" id="id" value="{{ $tasks->id }}" hidden>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-12">
                    <label for="formrow-text-input" class="form-label">{{ trans('Title') }}</label>
                    &nbsp;&nbsp;<span style="font-size: 70%; color: red; vertical-align: top;">&starf;</span>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $tasks->title }}">
                    <span class="text-danger" id="sim_imei_no_error"></span>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-12">
                    <label for="formrow-text-input" class="form-label">{{ trans('Description') }}</label>
                    &nbsp;&nbsp;<span style="font-size: 70%; color: red; vertical-align: top;">&starf;</span>
                    <input type="text" class="form-control" id="description" name="description" value="{{ $tasks->description }}">
                    <span class="text-danger" id="sim_mob_no1_error"></span>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-12">
                    <label for="formrow-text-input" class="form-label">{{ trans('Completed Status') }}</label>
                    &nbsp;&nbsp;<span style="font-size: 70%; color: red; vertical-align: top;">&starf;</span><br>
                    <select id="status" class="form-select select2" name="status">
                        <option value=""> {{ trans('select_status') }} </option>
                        <option value="1" {{ $tasks->completed == 1 ? 'selected' : '' }}> {{ trans('Completed') }} </option>
                        <option value="0" {{ $tasks->completed == 0 ? 'selected' : '' }}> {{ trans('Pending') }} </option>
                    </select>
                    <span class="text-danger" id="network_id_error"></span>
                </div>

            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-12">
                </div>
                <div class="col-xl-3 col-lg-4 col-md-12">
                </div>
                <div class="col-xl-3 col-lg-4 col-md-12">
                    <button type="submit" class="btn btn-primary w-md submit-form" id="sim_btn">{{ trans('save') }}</button>
                </div>
            </div>
    </div>
    </form>

    </div>
</body>

</html>