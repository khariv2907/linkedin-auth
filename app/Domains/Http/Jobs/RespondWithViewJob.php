<?php

namespace App\Domains\Http\Jobs;

use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;
use Lucid\Units\Job;

class RespondWithViewJob extends Job
{
    /**
     * RespondWithViewJob constructor.
     * @param string $template
     * @param array $data
     * @param int $status
     * @param array $headers
     */
    public function __construct(
        protected string $template,
        protected array $data = [],
        protected int $status = 200,
        protected array $headers = []
    ) {}

    /**
     * @param ResponseFactory $factory
     * @return Response
     */
    public function handle(ResponseFactory $factory): Response
    {
        return $factory->view(
            $this->template,
            $this->data,
            $this->status,
            $this->headers
        );
    }

}
