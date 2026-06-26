<?php

namespace App\Jobs\Certificate;

use App\Models\Certificate;
use App\Services\Certificate\CertificateService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class GenerateCertificateJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Certificate $certificate,
    ) {}

    public function handle(CertificateService $service): void
    {
        $service->generate($this->certificate);
    }
}
