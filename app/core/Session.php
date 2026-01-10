<?php



namespace Main\core;

class Session
{
    private static bool $started = false;

    // 🔹 تشغيل السيشن
    public static function start(): void
    {
        if (!self::$started) {
            session_start();
            self::$started = true;
        }
    }

    // 🔹 Session عادية
    public static function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        return $_SESSION[$key] ?? $default;
    }

    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public static function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    // 🔥 Flash messages
    public static function flash(string $key, mixed $value = null): mixed
    {
        // SET
        if ($value !== null) {
            $_SESSION['_flash'][$key] = $value;
            return null;
        }

        // GET (مرة واحدة)
        if (isset($_SESSION['_flash'][$key])) {
            $data = $_SESSION['_flash'][$key];
            unset($_SESSION['_flash'][$key]);
            return $data;
        }

        return null;
    }

    // 🔹 مسح كل الفلاش (اختياري)
    public static function clearFlash(): void
    {
        unset($_SESSION['_flash']);
    }

    // 🔹 تدمير السيشن
    public static function destroy(): void
    {
        session_destroy();
        $_SESSION = [];
        self::$started = false;
    }
}
