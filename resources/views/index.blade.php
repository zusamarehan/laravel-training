<html>
<head>
    <title>Todo Application</title>
</head>
<body>
    <div>Start Adding Items</div>

    @if(\Illuminate\Support\Facades\Session::has('store'))
        <p class="alert alert-info">{{ \Illuminate\Support\Facades\Session::get('store') }}</p>
    @endif

    <form action="{{ route('todo.store') }}" METHOD="POST">
        @csrf
        <div>
            <label for="task">Please Enter your Todo</label>
            <input id="task" type="text" name="task" value="{{ old('task') }}">
            @error('task') <span class="error">{{ $message }}</span> @enderror

        </div>

        <div>
            <label for="date">Due Date</label>
            <input id="date" type="date" name="date" value="{{ old('date') }}">
            @error('date') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
