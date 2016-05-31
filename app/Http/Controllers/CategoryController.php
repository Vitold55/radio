<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class CategoryController extends CrudController{

    public function all($entity){
        parent::all($entity); 

		$this->filter = \DataFilter::source(new \App\Category);
		$this->filter->add('name', 'Name', 'text');
		$this->filter->submit('search');
		$this->filter->reset('reset');
		$this->filter->build();

		$this->grid = \DataGrid::source($this->filter);
		$this->grid->add('id', 'Id');
		$this->grid->add('name', 'Name');
		$this->grid->add('available', 'Available');
		$this->addStylesToGrid();
                 
        return $this->returnView();
    }
    
    public function  edit($entity){
        
        parent::edit($entity);

		$this->edit = \DataEdit::source(new \App\Category());
		$this->edit->label('Add / Edit Category');
		$this->edit->add('name', 'Name', 'text')->rule('required');
		$this->edit->add('available', 'Available', 'checkbox');

        return $this->returnEditView();
    }    
}
