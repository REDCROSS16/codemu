<?php
/**
 * Используем псевдонимы классов в одном неймспейсе
 */

namespace Project;
use Resource\Controller\Data\Page as RPage;
use Resource\Controller\Model\Page as MPage;
class Test
{
    public function __construct()
    {
        $pageController = new RPage;
        $pageModel = new MPage;
    }
}

