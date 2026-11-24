@extends('layouts.app')

@section('title','My Tasks')

@section('content')
@if (session()->has('success'))
    <div>{{ session('success') }}</div>
@endif
 <nav class="mb-4">
        <a href="{{ route('tasks.index') }}"
        class="links">← Go back to the task lists</a>
     </nav>
    <h1 class="mb-4 text-slate-700">{{ $task->title }}</h1>
        <h1 class="mb-4 text-slate-700">{{ $task->description }}</h1>
        @if ($task->long_description)
            <h1 class="mb-4 text-slate-700">{{ $task->long_description }}</h1>
        @endif
    <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForhumans()}} ◦ 
        Updated {{ $task->updated_at -> diffForhumans() }}</p>
    <p class="mb-4">
        @if ($task->complete)
            <span class="font-medium text-green-500">Completed</span> 
            @else
            <span class="font-medium text-red-500">Not Completed</span> 
        @endif
    </p>
       <div class="flex gap-2">
            <a href="{{ route('tasks.edit',['task'=>$task]) }}"
                class="btn">Edit</a>
       
            <form action="{{ route('toggle-complete',['task'=>$task->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn">
                    Mark As {{ $task->complete ? 'not completed': 'completed' }}
                </button>
            </form>
   
  
        <form action="{{ route('tasks.destroy',['task'=>$task]) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn">DELETE</button>
        </form>
     </div>
 
@endsection