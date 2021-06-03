<?php

namespace App\Domains\Seo\Jobs;

use Lucid\Units\Job;

class GetDefaultTitleJob extends Job
{
    /**
     * GetDefaultTitleJob constructor.
     * @param string $title
     */
    public function __construct(
        private string $title
    ) {}

    /**
     * Execute the job.
     *
     * @return string
     */
    public function handle(): string
    {
        return $this->title . ' - ' . config('app.name');
    }
}
