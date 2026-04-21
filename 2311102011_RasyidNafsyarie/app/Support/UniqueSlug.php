<?php

namespace App\Support;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

final class UniqueSlug
{
    public static function forTable(string $table, string $from, ?int $exceptId = null): string
    {
        $slug = Str::slug($from);
        $base = $slug;
        $n = 2;
        while (
            DB::table($table)
                ->where('slug', $slug)
                ->when($exceptId !== null, fn ($q) => $q->where('id', '!=', $exceptId))
                ->exists()
        ) {
            $slug = $base.'-'.$n++;
        }

        return $slug;
    }
}
