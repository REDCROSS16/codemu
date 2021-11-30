<?php

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

    public function weigh(string $filePath, $SI): string
    {
        $SI = ['kb' => '']
        return filesize($filePath);
    }
}

$FM = new FileManipulator();
//$FM->create('1.txt');
//$FM->create('2.txt');

//$FM->copy('2.txt', 'file1/2.txt');
//$FM->rename('1.txt', 'randomtext1.txt');

//$FM->replace('file2/2.txt', 'file3/2.txt');

//$FM->create('r.txt');
//$FM->replace('r.txt', 'logs/r.txt');

$a = range(1, 1000);
$FM->create('3.txt');
//file_put_contents('3.txt', $a);
echo $FM->weigh('3.txt');