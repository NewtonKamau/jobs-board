<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>
    <ul>

        @foreach($jobs as $job)
        <li><strong>
                <a href="/jobs/{{$job['id']}}" class="text-blue-500 hover:underline">
                    {{$job['title'] }}</strong>:
            pays{{ $job['salary']}} per year.
            </a>
        </li>
        @endforeach
    </ul>
</x-layout>
