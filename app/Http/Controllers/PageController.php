<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use \Serverfireteam\Panel\CrudController;
use \App\Page as Page;
use \App\Station as Station;

class PageController extends CrudController{

    public function all($entity){
        parent::all($entity); 

		$this->filter = \DataFilter::source(new Page);
		$this->filter->add('title', 'Title', 'text');
		$this->filter->add('alias', 'Alias', 'text');
		$this->filter->submit('search');
		$this->filter->reset('reset');
		$this->filter->build();

		$this->grid = \DataGrid::source($this->filter);
		$this->grid->add('alias', 'Alias');
		$this->grid->add('title', 'Title');
		$this->grid->add('publish', 'Published');
		$this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);
		$this->edit = \DataEdit::source(new Page());

		$this->edit->label('Add/Edit page');
		$this->edit->add('alias', 'Alias', 'text')->rule('required');
		$this->edit->add('title', 'Title', 'text')->rule('required');
		$this->edit->add('keywords', 'Keywords', 'text')->rule('required');
		$this->edit->add('description', 'Description', 'text')->rule('required');
		$this->edit->add('text', 'Text', 'redactor');
		$this->edit->add('publish', 'Publish', 'checkbox');
       
        return $this->returnEditView();
    }

	public function index() {
		$page = Page::where('alias', '/')->first()->toArray();
		$stationObj = new Station();
		$stations = $stationObj->getStations();

		return view('pages.index', [
				'page' => $page,
				'stations' => $stations,
		]);
	}

	public function page($alias) {
		$page = Page::where(['alias' => $alias, 'publish'=> 1])->first()
				->toArray();

		return view('pages.page', [
				'page' => $page,
		]);
	}
}
