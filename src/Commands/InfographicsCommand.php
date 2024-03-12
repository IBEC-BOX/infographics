<?php

namespace AdminKit\Infographics\Commands;

use Illuminate\Console\Command;

class InfographicsCommand extends Command
{
    public $signature = 'admin-kit-infographics';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
