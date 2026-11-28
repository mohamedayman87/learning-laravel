<x-layout title="Home">
   <form action="/Ideas" method="post">

      @csrf
      <div class="col-span-full">
         <label for="idea" class="block text-sm/6 font-medium text-white">Write about yourself</label>

         <div class="mt-2">
            <textarea id="idea" name="idea" rows="3"
               class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"></textarea>
         </div>

         <p class="mt-3 text-sm/6 text-gray-400">Write a few sentences about yourself.</p>

      </div>
      <button type="submit"
         class="rounded-full bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/30 transition duration-200 hover:not-focus:bg-indigo-700 hover:shadow-indigo-600/40 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 active:scale-95 disabled:cursor-not-allowed disabled:opacity-50">
         Save
      </button>
      <a href="/Ideas/clear"
         class="rounded-full bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/30 transition duration-200 hover:not-focus:bg-indigo-700 hover:shadow-indigo-600/40 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 active:scale-95 disabled:cursor-not-allowed disabled:opacity-50">
         clear
      </a>
   </form>

   <div class="mt-8">
      <div class="flex items-center justify-between">
         <h2 class="text-base/7 font-semibold text-white">Your ideas</h2>
         <span
            class="rounded-full bg-indigo-500/10 px-2.5 py-0.5 text-xs font-medium text-indigo-400 ring-1 ring-inset ring-indigo-500/20">
            {{ $ideas->count() }}
         </span>
      </div>

      <ul role="list" class="mt-4 space-y-3">
         @forelse($ideas as $idea)
            @if ($idea->description == '')
               @continue
            @endif

            <li
               class="group flex items-center gap-x-3 rounded-lg bg-white/5 px-4 py-3 text-sm/6 text-gray-200 ring-1 ring-inset ring-white/10 transition hover:bg-white/10">

               <span class="size-1.5 shrink-0 rounded-full bg-indigo-400"></span>

               <a href="/Ideas/{{ $idea->id }}"
                  class="min-w-0 flex-1 break-words transition group-hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                  {{ $idea->description }}
               </a>

               <span
                  class="hidden shrink-0 rounded-full bg-yellow-500/10 px-2 py-0.5 text-xs font-medium capitalize text-yellow-400 ring-1 ring-inset ring-yellow-500/20 sm:inline-flex">
                  {{ $idea->state }}
               </span>

               <a href="/Ideas/{{ $idea->id }}/edit"
                  class="inline-flex shrink-0 items-center gap-x-1 rounded-full bg-indigo-500/10 px-3 py-1 text-xs font-semibold text-indigo-300 ring-1 ring-inset ring-indigo-500/20 transition duration-200 hover:bg-indigo-500/20 hover:text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 active:scale-95">
                  <svg class="size-3.5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                     <path
                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                  </svg>
                  Edit
               </a>

               <form action="/Ideas/{{ $idea->id }}" method="post"
                  onsubmit="return confirm('Delete this idea? This can\'t be undone.')">
                  @csrf
                  @method('delete')
                  <button type="submit"
                     class="inline-flex items-center gap-x-1 rounded-full bg-red-500/10 px-3 py-1 text-xs font-semibold text-red-400 ring-1 ring-inset ring-red-500/20 transition duration-200 hover:bg-red-500/20 hover:text-red-300 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500 active:scale-95">
                     <svg class="size-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                           d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                           clip-rule="evenodd" />
                     </svg>
                     Delete
                  </button>
               </form>
            </li>



         @empty
            <li class="rounded-lg border border-dashed border-white/15 px-4 py-10 text-center">
               <p class="text-sm/6 font-semibold text-white">No ideas yet</p>
               <p class="mt-1 text-sm/6 text-gray-400">Add your first idea and it will show up here.</p>
            </li>
         @endforelse
      </ul>
   </div>
</x-layout>