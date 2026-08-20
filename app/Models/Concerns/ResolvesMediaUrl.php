<?php

namespace App\Models\Concerns;

trait ResolvesMediaUrl
{
    /**
     * Resolve a stored media path to a public URL.
     *
     * Legacy values point at real files under public/ (e.g. assets/...),
     * while files uploaded via the admin live on the 'public' disk and
     * must be served under storage/.
     */
    protected function resolveMediaUrl(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        if (str_starts_with($path, 'storage/')) {
            return asset($path);
        }

        if (file_exists(public_path($path))) {
            return asset($path);
        }

        return asset('storage/'.$path);
    }
}
