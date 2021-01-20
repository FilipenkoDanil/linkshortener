<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class clearLinks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:links';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all unused links';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('short_links')->where('created_at', '<=', Carbon::now()->subDays(7))->delete();
        echo 'Links deleted';
    }
}
