<x-layout title="Idea #{{ $idea->id }}">

   @php
      $stateClasses = match ($idea->state) {
         'pending'   => 'bg-yellow-500/10 text-yellow-400 ring-yellow-500/20',
         'completed' => 'bg-green-500/10 text-green-400 ring-green-500/20',
         'rejected'  => 'bg-red-500/10 text-red-400 ring-red-500/20',
         default     => 'bg-gray-500/10 text-gray-400 ring-gray-500/20',
      };
   @endphp

   <a href="/Ideas"
      class="inline-flex items-center gap-x-1 text-sm/6 font-medium text-gray-400 transition hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
      <span aria-hidden="true">&larr;</span> Back to ideas
   </a>

   <article class="mt-6 overflow-hidden rounded-xl bg-white/5 ring-1 ring-inset ring-white/10">

      {{-- Header --}}
      <header class="flex items-center justify-between gap-x-4 border-b border-white/10 px-6 py-4">
         <div class="flex items-center gap-x-3">
            <span class="size-1.5 rounded-full bg-indigo-400"></span>
            <h1 class="text-sm/6 font-semibold text-white">Idea #{{ $idea->id }}</h1>
         </div>
         <span class="rounded-full px-2.5 py-0.5 text-xs font-medium capitalize ring-1 ring-inset {{ $stateClasses }}">
            {{ $idea->state }}
         </span>
      </header>

      {{-- Description --}}
      <div class="px-6 py-8">
         <p class="whitespace-pre-line break-words text-lg/8 text-gray-100">
            {{ $idea->description }}
         </p>
      </div>

      {{-- Metadata --}}
      <dl class="grid grid-cols-1 gap-4 border-t border-white/10 bg-black/10 px-6 py-5 sm:grid-cols-2">
         <div>
            <dt class="text-xs font-medium uppercase tracking-wide text-gray-500">Created</dt>
            <dd class="mt-1 text-sm/6 text-gray-200">
               {{ $idea->created_at->format('M d, Y · H:i') }}
               <span class="text-gray-500">({{ $idea->created_at->diffForHumans() }})</span>
            </dd>
         </div>
         <div>
            <dt class="text-xs font-medium uppercase tracking-wide text-gray-500">Last updated</dt>
            <dd class="mt-1 text-sm/6 text-gray-200">
               {{ $idea->updated_at->format('M d, Y · H:i') }}
               <span class="text-gray-500">({{ $idea->updated_at->diffForHumans() }})</span>
            </dd>
         </div>
      </dl>

      {{-- Actions --}}
      <footer class="flex items-center justify-between gap-x-3 border-t border-white/10 px-6 py-4">

         <a href="/Ideas/{{ $idea->id }}/edit"
            class="inline-flex items-center gap-x-1.5 rounded-full bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-indigo-600/30 transition duration-200 hover:bg-indigo-700 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 active:scale-95">
            <svg class="size-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
               <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
            </svg>
            Edit
         </a>

         <form action="/Ideas/{{ $idea->id }}" method="post"
            onsubmit="return confirm('Delete this idea? This can\'t be undone.')">
            @csrf
            @method('delete')
            <button type="submit"
               class="inline-flex items-center gap-x-1.5 rounded-full bg-red-500/10 px-4 py-2 text-sm font-semibold text-red-400 ring-1 ring-inset ring-red-500/20 transition duration-200 hover:bg-red-500/20 hover:text-red-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500 active:scale-95">
               <svg class="size-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
               </svg>
               Delete
            </button>
         </form>
      </footer>
   </article>
</x-layout>