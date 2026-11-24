@extends('layouts.app')

@section('title','My Tasks')
@section('content')
     <nav class="mb-4">
        <a href="{{ route('tasks.create') }}"
        class="links">Add Task</a>
     </nav>
         @forelse ($tasks as $task )
            <div>
               <a href="{{ route('tasks.show',['task'=>$task->id]) }}" 
                @class(['line-through' => $task->complete])>{{ $task->title }}</a>
            </div>             
       @empty
             <div>There is no Task</div>
        @endforelse
       
        @if($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links()  }}
        </nav>
        @endif
@endsection
       
   