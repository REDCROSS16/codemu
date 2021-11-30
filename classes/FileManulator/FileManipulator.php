<?php

/**
 * Class FileManipulator
 * Класс управляет файлами
 */
class FileManipulator
{
    /**
     * Создает пустой файл
     * @param $filepath
     * @return $this
     */
    public function create($filepath) : FileManipulator
    {
        if (file_put_contents($filepath, ''))
        {
            echo 'Файл' . $filepath . ' создан!';
        }

        return $this;
    }

    /**
     * Удаляет файл
     * @param $filepath
     */
    public function delete($filepath) : bool
    {
        if (unlink($filepath)) {
            echo "Файл $filepath успешно удален!" . PHP_EOL;
            return true;
        }
        echo 'Удаление файла ' . $filepath . ' не удалось!' . PHP_EOL;
        return false;
    }

    /** Копирует файл
     * @param $filepath
     * @param $copyPath
     */
    public function copy($filepath, $copyPath) : bool
    {
        $cp = pathinfo($copyPath);
        if (!is_dir($cp['dirname'])) {
            mkdir($cp['dirname']);
        }
        if (copy($filepath, $copyPath)) {
            echo "Файл {$cp['basename']} cкопирован в папку $copyPath" . PHP_EOL;
            return true;
        }
        return false;
    }


    public function rename($filepath, $newName) : bool
    {
        if (is_file($filepath)) {
            rename($filepath, $newName);
            echo basename($filepath) . " переименован в $newName" . PHP_EOL;
            return true;
        }
        return false;
    }


    public function replace($filepath, $newPath)
    {
        if ($this->copy($filepath, $newPath)) {
            if ($this->delete($filepath)){
                echo "Файл успешно перемещен!" . PHP_EOL;
                return true;
            }
        }
        return false;
    }

    public function weigh(string $filePath, $SI = 'B'): string
    {
        $siArray = [
            'B'  => 1,
            'KB' => 1024,
            'MB' => pow(1024, 2),
            'GB' => pow(1024, 3),
            'TB' => pow(1024, 4)
        ];
        return filesize($filePath) / $siArray[$SI] . " $SI";
    }
}