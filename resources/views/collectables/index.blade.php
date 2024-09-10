<x-app-layout>
    <div>
        <div class="text-center">
            <h1>Collectables</h1>
            <h2>Adventure Characters</h2>
            <table>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>In collection</th>
                    <th></th>
                </tr>
                </thead>
                @foreach ($collectables as $collectable)
                    <tbody>
                        @if ($collectable->type == 'Rare')
                            <tr>
                                {{-- This outputs the collectable name in the table --}}
                                <td>{{ $collectable->name }}</td>
                                <td>{{ $collectable->type}}</td>

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
                        @endif
                    </tbody>
                @endforeach
            </table>
        </div>

        <!-- Form to add a new collectable -->
        <div class="text-center">
            <h3>Add New Collectable</h3>

            <!-- Display validation errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Success message -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form for adding a collectable -->
            <form action="{{ route('collectables.index') }}" method="POST">
                @csrf  <!-- CSRF token for security -->

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="Common">Common</option>
                        <option value="Rare">Rare</option>
                        <option value="Legendary">Legendary</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Add Collectable</button>
            </form>
        </div>
    </div>
</x-app-layout>
