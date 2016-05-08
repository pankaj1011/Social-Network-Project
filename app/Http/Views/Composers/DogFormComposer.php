<?php 

namespace Dog\Http\Views\Composers;
use Dog\Breed;
use Illuminate\Contracts\View\View as View;
use Illuminate\Contracts\View\Factory as ViewFactory;

class DogFormComposer 
{
	protected $breeds;
	public function __construct(Breed $breeds) 
	{
		$this->breeds = $breeds;
	}
	public function compose(View $view) 
	{
		$view->with('breeds', $this->breeds->lists('name', 'id'));
	}
}
