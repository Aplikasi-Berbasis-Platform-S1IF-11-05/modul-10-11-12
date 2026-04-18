<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class DemoCatalogSeeder extends Seeder
{
    /**
     * Seed demo categories and products so catalog pages are ready for presentations.
     */
    public function run(): void
    {
        $categoryMap = $this->seedCategories();

        $products = [
            [
                'category_slug' => 'makanan-berat',
                'name' => 'Nasi Pecel Madiun Spesial',
                'slug' => 'nasi-pecel-madiun-spesial',
                'description' => 'Nasi pecel dengan siraman sambal kacang gurih, dilengkapi rempeyek dan lauk ayam suwir khas Ngawi Timur.',
                'price' => 22000,
                'accent' => '#e11d48',
            ],
            [
                'category_slug' => 'makanan-berat',
                'name' => 'Rawon Daging Hitam',
                'slug' => 'rawon-daging-hitam',
                'description' => 'Rawon berempah dengan daging sapi empuk dan kuah kluwek pekat, disajikan hangat untuk jam makan siang.',
                'price' => 32000,
                'accent' => '#b91c1c',
            ],
            [
                'category_slug' => 'snack-tradisional',
                'name' => 'Lumpia Rebung Crispy',
                'slug' => 'lumpia-rebung-crispy',
                'description' => 'Lumpia isi rebung dan ayam cincang dengan kulit renyah, cocok untuk camilan sore saat festival.',
                'price' => 18000,
                'accent' => '#f97316',
            ],
            [
                'category_slug' => 'snack-tradisional',
                'name' => 'Tahu Petis Panggung',
                'slug' => 'tahu-petis-panggung',
                'description' => 'Tahu goreng isi petis udang dengan sentuhan cabai rawit, menu favorit pengunjung area panggung utama.',
                'price' => 16000,
                'accent' => '#ea580c',
            ],
            [
                'category_slug' => 'minuman-segar',
                'name' => 'Es Teh Bunga Rosela',
                'slug' => 'es-teh-bunga-rosela',
                'description' => 'Minuman teh rosela dingin dengan rasa manis asam yang ringan untuk menyegarkan setelah berkeliling booth.',
                'price' => 12000,
                'accent' => '#db2777',
            ],
            [
                'category_slug' => 'minuman-segar',
                'name' => 'Lemon Mint Soda',
                'slug' => 'lemon-mint-soda',
                'description' => 'Perpaduan lemon segar, daun mint, dan soda dingin yang cocok untuk cuaca panas saat festival berlangsung.',
                'price' => 15000,
                'accent' => '#0284c7',
            ],
            [
                'category_slug' => 'dessert-manis',
                'name' => 'Puding Cokelat Lava',
                'slug' => 'puding-cokelat-lava',
                'description' => 'Puding cokelat lembut dengan saus lava cokelat pekat dan topping almond panggang.',
                'price' => 14000,
                'accent' => '#7c3aed',
            ],
            [
                'category_slug' => 'dessert-manis',
                'name' => 'Es Krim Kelapa Gula Aren',
                'slug' => 'es-krim-kelapa-gula-aren',
                'description' => 'Es krim kelapa dengan sirup gula aren asli, menghadirkan rasa tradisional yang modern.',
                'price' => 17000,
                'accent' => '#0ea5e9',
            ],
        ];

        foreach ($products as $product) {
            $category = $categoryMap->get($product['category_slug']);

            if (! $category) {
                continue;
            }

            $imagePath = $this->storeDemoImage($product['slug'], $product['name'], $product['accent']);

            Product::updateOrCreate(
                ['slug' => $product['slug']],
                [
                    'category_id' => $category->id,
                    'name' => $product['name'],
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'image_path' => $imagePath,
                    'is_active' => true,
                ]
            );
        }
    }

    private function seedCategories(): Collection
    {
        $categories = [
            ['name' => 'Makanan Berat', 'slug' => 'makanan-berat'],
            ['name' => 'Snack Tradisional', 'slug' => 'snack-tradisional'],
            ['name' => 'Minuman Segar', 'slug' => 'minuman-segar'],
            ['name' => 'Dessert Manis', 'slug' => 'dessert-manis'],
        ];

        $map = collect();

        foreach ($categories as $category) {
            $model = Category::updateOrCreate(
                ['slug' => $category['slug']],
                ['name' => $category['name']]
            );

            $map->put($category['slug'], $model);
        }

        return $map;
    }

    private function storeDemoImage(string $slug, string $title, string $accent): string
    {
        $path = "products/demo-{$slug}.svg";
        $safeTitle = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');

        $svg = <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="800" viewBox="0 0 1200 800">
  <defs>
    <linearGradient id="bg" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#0b1830" />
      <stop offset="100%" stop-color="#10284a" />
    </linearGradient>
  </defs>
  <rect width="1200" height="800" fill="url(#bg)" />
  <rect x="70" y="70" width="1060" height="660" rx="26" fill="none" stroke="{$accent}" stroke-width="8" opacity="0.9" />
  <circle cx="1080" cy="120" r="58" fill="{$accent}" opacity="0.2" />
  <circle cx="150" cy="680" r="74" fill="{$accent}" opacity="0.2" />
  <text x="100" y="360" fill="#f8fafc" font-size="64" font-family="Sora, Segoe UI, sans-serif" font-weight="700">
    {$safeTitle}
  </text>
  <text x="100" y="430" fill="#93c5fd" font-size="30" font-family="Manrope, Segoe UI, sans-serif">
    Demo katalog Festival Kuliner Ngawi Timur
  </text>
</svg>
SVG;

        Storage::disk('public')->put($path, $svg);

        return $path;
    }
}
