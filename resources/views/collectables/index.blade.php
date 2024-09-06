<x-app-layout>
    <div class="text-center">
        <h1>Collectables</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>In collection</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($collectables as $collectable)
                    <tr>
                        {{-- This outputs the collectable name in the table --}}
                        <td>{{ $collectable->name }}</td>

                        {{-- This displays if the item is in the users collection --}}
                        @if (in_array($collectable->id, $userCollectables))
                            <td class="bg-green-500"></td>
                        @else
                            <td class="bg-red-500"></td>
                        @endif

                        {{-- This adds the option for the collectable to be in the users collection --}}
                        @if (in_array($collectable->id, $userCollectables))
                            <td><form action="{{ route('collectables.toggle', $collectable) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Remove from Collection</button>
                            </form></td>
                        @else
                            <td><form action="{{ route('collectables.toggle', $collectable) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary">Add to Collection</button>
                            </form></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
