<?php

namespace Modules\Task\Commands;

use Illuminate\Console\Command;
use Task;

class Install extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'task:install';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Installs the Task module';

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
   * @return mixed
   */
  public function handle()
  {
    // if (!Task::install()) {
    //   $this->error('"Task" module is installed already.');

    //   return false;
    // }

    // $this->info('"Task" module installed.');

    return true;
  }
}