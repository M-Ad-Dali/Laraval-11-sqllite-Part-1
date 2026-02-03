<x-layout>
  <x-slot:heading>
    Jobs Pag
  </x-slot:heading>
  {{-- <ul>
      @foreach ($jobs as $job)
        <li>
          <a href="/jobs/3">
          <strong>{{ $job['title'] }}</strong>: Pays {{ $job['salary'] }}
          </a>
        </li>
        @endforeach
      </ul> --}}
      
  <ul>
    @foreach ($jobs as $job)
      <li>
          <a href="/jobs/{{ $job['id'] }}" class=" hover:text-blue-500 hover:underline">
          <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year.
          </a>
      </li>
    @endforeach
  </ul>

</x-layout>