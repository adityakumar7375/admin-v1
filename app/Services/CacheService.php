<?php


namespace App\Services;

use Illuminate\Support\Facades\Cache;

class CacheService
{
    /**
     * Set a cache value.
     *
     * @param string $key
     * @param mixed $value
     * @param int|\DateTimeInterface $expiration
     * @return bool
     */
    public function set(string $key, $value, $expiration = 60)
    {
        return Cache::put($key, $value, now()->addMinutes($expiration));
    }

    /**
     * Get a cache value.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return Cache::get($key, $default);
    }

    /**
     * Delete a cache value.
     *
     * @param string $key
     * @return bool
     */
    public function delete(string $key)
    {
        return Cache::forget($key);
    }

    /**
     * Clear all cache.
     *
     * @return void
     */
    public function clear()
    {
        Cache::clear();
    }
}