<?php
namespace App\Core;

class Paths
{
    private static ?string $basePath = null;
    
    private static function getBasePath(): string
    {
        if (self::$basePath === null) {
            // Определяем базовый путь динамически
            self::$basePath = realpath(__DIR__ . '/../../');
        }
        return self::$basePath;
    }
    
    public static function get(string $type, string $path = ''): string
    {
        $basePath = match($type) {
            'base' => self::getBasePath(),
            'public' => self::getBasePath() . '/public',
            'src' => self::getBasePath() . '/src',
            'config' => $_ENV['CONFIG_PATH'] ?? '/etc/vdestor/config',
            'log' => $_ENV['LOG_PATH'] ?? '/var/log/vdestor',
            'views' => self::getBasePath() . '/src/views',
            'controllers' => self::getBasePath() . '/src/Controllers',
            'services' => self::getBasePath() . '/src/Services',
            default => self::getBasePath()
        };
        
        return $basePath . ($path ? '/' . ltrim($path, '/') : '');
    }
    
    // Остальные методы без изменений
}
