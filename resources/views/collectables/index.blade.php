<x-app-layout>
    <div class="text-center flex flex-col items-center"  style="background-image: url('{{ asset('images/skylandersBackground.webp') }}'); background-size: 82%;">
        <div class="px-4 md:px-10 pb-10 bg-faded-full-faded flex flex-col items-center">
            <h1 class="text-5xl md:text-7xl my-8 font-bold">Collectables</h1>
            <!-- Adventure Characters table -->
            <h2 class="text-3xl md:text-5xl mb-5 font-bold">Adventure Characters</h2>
            <table class="bg-white bg-opacity-30 text-xl md:text-3xl">
                <thead>
                <tr>
                    <th class="w-96 border border-black">Name</th>
                    <th class="w-96 border border-black">In collection</th>
                </tr>
                </thead>
                @foreach ($collectables as $collectable)
                    <tbody>
                        @if ($collectable->type == 'adventure')
                            <tr>
                                {{-- This outputs the collectable name in the table --}}
                                <td class="text-left border border-black pl-8">{{ $collectable->name }}</td>

                                {{-- This displays if the item is in the users collection --}}
                                @if (in_array($collectable->id, $userCollectables))
                                    <td class="bg-green-500 relative border border-black"><form action="{{ route('collectables.toggle', $collectable) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger text-transparent absolute inset-0 w-full h-full"></button>
                                        </form></td>
                                @else
                                    <td class="bg-red-500 relative border border-black"><form action="{{ route('collectables.toggle', $collectable) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger text-transparent absolute inset-0 w-full h-full"></button>
                                        </form></td>
                                @endif
                            </tr>
                        @endif
                    </tbody>
                @endforeach
            </table>

            <!-- Magic Items and Level Pieces table -->
            <h2 class="text-3xl md:text-5xl mb-5 mt-10 font-bold">Magic Items and Level Pieces</h2>
            <table class="bg-white bg-opacity-30 text-xl md:text-3xl">
                <thead>
                <tr>
                    <th class="w-96 border border-black">Name</th>
                    <th class="w-96 border border-black">In collection</th>
                </tr>
                </thead>
                @foreach ($collectables as $collectable)
                    <tbody>
                    @if ($collectable->type == 'magic')
                        <tr>
                            {{-- This outputs the collectable name in the table --}}
                            <td class="text-left border border-black pl-8">{{ $collectable->name }}</td>

                            {{-- This displays if the item is in the users collection --}}
                            @if (in_array($collectable->id, $userCollectables))
                                <td class="bg-green-500 relative border border-black"><form action="{{ route('collectables.toggle', $collectable) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger text-transparent absolute inset-0 w-full h-full"></button>
                                    </form></td>
                            @else
                                <td class="bg-red-500 relative border border-black"><form action="{{ route('collectables.toggle', $collectable) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger text-transparent absolute inset-0 w-full h-full"></button>
                                    </form></td>
                            @endif
                        </tr>
                    @endif
                    </tbody>
                @endforeach
            </table>

            <!-- In-Game Variants table -->
            <h2 class="mb-5 mt-10 font-bold text-3xl md:text-5xl">In-Game Variants</h2>
            <table class="bg-white bg-opacity-30 text-xl md:text-3xl">
                <thead>
                <tr>
                    <th class="w-96 border border-black">Name</th>
                    <th class="w-96 border border-black">In collection</th>
                </tr>
                </thead>
                @foreach ($collectables as $collectable)
                    <tbody>
                    @if ($collectable->type == 'variant')
                        <tr>
                            {{-- This outputs the collectable name in the table --}}
                            <td class="text-left border border-black pl-8">{{ $collectable->name }}</td>

                            {{-- This displays if the item is in the users collection --}}
                            @if (in_array($collectable->id, $userCollectables))
                                <td class="bg-green-500 relative border border-black"><form action="{{ route('collectables.toggle', $collectable) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger text-transparent absolute inset-0 w-full h-full"></button>
                                </form></td>
                            @else
                                <td class="bg-red-500 relative border border-black"><form action="{{ route('collectables.toggle', $collectable) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger text-transparent absolute inset-0 w-full h-full"></button>
                                </form></td>
                            @endif

                            {{-- This adds the option for the collectable to be in the users collection --}}

                        </tr>
                    @endif
                    </tbody>
                @endforeach
            </table>

            <!-- In-Game Variants table -->
            <h2 class="mb-5 mt-10 font-bold text-3xl md:text-5xl">Eons Elite Figures</h2>
            <table class="bg-white bg-opacity-30 text-xl md:text-3xl">
                <thead>
                <tr>
                    <th class="w-96 border border-black">Name</th>
                    <th class="w-96 border border-black">In collection</th>
                </tr>
                </thead>
                @foreach ($collectables as $collectable)
                    <tbody>
                    @if ($collectable->type == 'elite')
                        <tr>
                            {{-- This outputs the collectable name in the table --}}
                            <td class="text-left border border-black pl-8">{{ $collectable->name }}</td>

                            {{-- This displays if the item is in the users collection --}}
                            @if (in_array($collectable->id, $userCollectables))
                                <td class="bg-green-500 relative border border-black"><form action="{{ route('collectables.toggle', $collectable) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger text-transparent absolute inset-0 w-full h-full"></button>
                                    </form></td>
                            @else
                                <td class="bg-red-500 relative border border-black"><form action="{{ route('collectables.toggle', $collectable) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger text-transparent absolute inset-0 w-full h-full"></button>
                                    </form></td>
                            @endif

                            {{-- This adds the option for the collectable to be in the users collection --}}

                        </tr>
                    @endif
                    </tbody>
                @endforeach
            </table>


            <!-- Form to add a new collectable -->
            @if (auth()->user()->is_admin)
                <div class="text-center mt-28">
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
                                <option value="adventure">Adventure Character</option>
                                <option value="magic">Magic Items and Level Pieces</option>
                                <option value="variant">In-Game Variant</option>
                                <option value="elite">Eons Elites</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Collectable</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
