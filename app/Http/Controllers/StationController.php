<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Station;
use \Serverfireteam\Panel\CrudController;

class StationController extends CrudController{

    public function all($entity){
        parent::all($entity); 

		$this->filter = \DataFilter::source(new \App\Station);
		$this->filter->add('name', 'Name', 'text');
		$this->filter->submit('search');
		$this->filter->reset('reset');
		$this->filter->build();

		$this->grid = \DataGrid::source($this->filter);
		$this->grid->add('id', 'Id');
		$this->grid->add('name', 'Name');
		$this->grid->add('source', 'Source');
		$this->grid->add('rating', 'Rating');
		$this->grid->add('available', 'Available');
		$this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

		$this->edit = \DataEdit::source(new \App\Station());
		$this->edit->label('Add /Edit station');
		$this->edit->add('id', 'Id', 'text');
		$this->edit->add('name', 'Name', 'text')->rule('required');
		$this->edit->add('source', 'Source', 'text')->rule('required');
		$this->edit->add('frequency', 'Frequency', 'text');
		$this->edit->add('city', 'City', 'text');
		$this->edit->add('rating', 'Rating', 'text');
		$this->edit->add('logo', 'Logo', 'image')->move('assets/images/logos')->preview(100,80);
		$this->edit->add('available', 'Available', 'checkbox');
       
        return $this->returnEditView();
    }    
}
