<?php

namespace App\Handler\TestForm;

use App\Handler\TestForm\TestFormHandlerInterface;
use App\Service\AmoCrmService;

class TestFormHandler implements TestFormHandlerInterface
{
    private AmoCrmService $service;
    public function __construct(AmoCrmService $service)
    {
        $this->service = $service;
    }

    public function handle(array $data): void
    {
        $this->service->addLeadComplex($data);
    }
}
