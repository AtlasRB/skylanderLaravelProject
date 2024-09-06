<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Collectable;

class CollectableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $collectables = [
            'Rare Stamp',
            'Ancient Coin',
            'Vintage Comic Book',
            'Limited Edition Action Figure',
            'Antique Vase',
            'Historic Manuscript',
            'Collector\'s Card',
            'Rare Painting',
            'Exotic Gemstone',
            'Limited Edition Vinyl Record'
        ];

        // Create each collectable in the database
        foreach ($collectables as $item) {
            Collectable::create(['name' => $item]);
        }
    }
}
