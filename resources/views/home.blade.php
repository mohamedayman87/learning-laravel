<x-layout title="Home">
   <form action="/home" method="post">

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
      <a href="/clear"
         class="rounded-full bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-600/30 transition duration-200 hover:not-focus:bg-indigo-700 hover:shadow-indigo-600/40 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 active:scale-95 disabled:cursor-not-allowed disabled:opacity-50">
         clear
      </a>
   </form>

   <div class="mt-8">
      <div class="flex items-center justify-between">
         <h2 class="text-base/7 font-semibold text-white">Your ideas</h2>
         <span
            class="rounded-full bg-indigo-500/10 px-2.5 py-0.5 text-xs font-medium text-indigo-400 ring-1 ring-inset ring-indigo-500/20">
            {{ count($ideas) }}
         </span>
      </div>

      <ul role="list" class="mt-4 space-y-3">
         @forelse($ideas as $idea)
         @if ($idea == '')
            @continue
         @endif
            <li
               class="flex items-start gap-x-3 rounded-lg bg-white/5 px-4 py-3 text-sm/6 text-gray-200 ring-1 ring-inset ring-white/10 transition hover:bg-white/10">
               <span class="mt-2 size-1.5 shrink-0 rounded-full bg-indigo-400"></span>
               <span class="min-w-0 break-words">{{ $idea }}</span>
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