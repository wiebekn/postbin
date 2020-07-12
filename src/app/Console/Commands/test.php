<?php

namespace App\Console\Commands;

use App\Events\BinAdd;
use App\Events\BinItemAdd;
use App\User;
use Illuminate\Console\Command;
use Ramsey\Uuid\Uuid;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'postbin:event-test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $objUser = User::find(2);
        $input['uuid'] = Uuid::uuid4()->toString();
        $objBin = $objUser->bins()->create($input);

        event(new BinAdd($objBin));
    }
}
