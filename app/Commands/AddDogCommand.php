<?php namespace Bubbles\Commands;

use Bubbles\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class AddDogCommand extends Command implements SelfHandling {

    public $name;
    public $breed;
    public $size;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($name, $size, $breed)
	{
        $this->name = $name;
        $this->size = $size;
        $this->breed = $breed;
    }

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		event(new DogWasAdded);
	}

}
