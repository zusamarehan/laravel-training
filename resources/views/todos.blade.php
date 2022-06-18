<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    table, th, td {
        border:1px solid black;
    }
</style>
<body class="">

@if(\Illuminate\Support\Facades\Session::has('updateCompleteStatus'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">Updated the Completed Status</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
    </div>
@endif

@if(\Illuminate\Support\Facades\Session::has('destroy'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">Delete Todo Successfully</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
    </div>
@endif

<h2 class="text-xl mb-10 flex items-center justify-center">All Todos</h2>

<div class="flex items-center justify-center">
    <table style="width: 50%">
        <tr>
            <th>No.</th>
            <th>Task</th>
            <th>Date</th>
            <th>Completed</th>
            <th>Action</th>
        </tr>
        @foreach($todos as $todo)
            <tr style="text-align: center">
                <td>{{ $todo->id }}</td>
                <td>{{ $todo->task }}</td>
                <td>{{ $todo->date }}</td>
                <td>{{ $todo->is_completed }}</td>
                <td>
                    <form action="{{ route('todos.update.is.complete', ['id' => $todo->id ]) }}" METHOD="POST">
                        @csrf
                        <button type="submit" class="underline text-green-500 cursor-pointer">Update Completed Status</button>
                    </form>
                    <form action="{{ route('todos.delete', ['id' => $todo->id ]) }}" METHOD="POST">
                        @csrf
                        <button type="submit" class="underline text-red-500 cursor-pointer">Delete Task</button>
                    </form>
                    <span class="underline text-gray-500 cursor-pointer">Update Task</span>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>
