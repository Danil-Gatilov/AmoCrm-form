<?php

namespace App\Handler\TestForm;

use App\Service\AmoCrmService;

interface TestFormHandlerInterface
{
    public function __construct(AmoCrmService $service);

    public function handle(array $data): void;
}
