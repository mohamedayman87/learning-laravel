<x-layout title="Home">
   <!-- @foreach ($tasks as $task )
      <li>{{ $task }}</li>
   @endforeach

   @unless(count($tasks))
      <h1>there is no tasks now</h1>
   @endunless -->


   @forelse($tasks as $task)
      <li>{{ $task }}</li>
   @empty
      <h1>there are no tasks now</h1>
   @endforelse
</x-layout>