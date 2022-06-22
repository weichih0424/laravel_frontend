<?php

namespace App\Services;

use App\Repositories\FooterRepository;

class FooterService
{
    private $FooterRepo;

    public function __construct(FooterRepository $FooterRepo)
    {
        $this->FooterRepo = $FooterRepo;
    }
    //  處理邏輯
    public function get_footer()
    
    {
        $footers = $this->FooterRepo->get();

        return $footers;
    }
}
