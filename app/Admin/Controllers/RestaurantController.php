<?php

namespace App\Admin\Controllers;

use App\Restaurant;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class RestaurantController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Restaurant';


    public function index(Content $content)
    {
        return $content
            ->header('餐聽管理')
            ->description('管理所有餐廳資訊')
            ->body($this->grid());
    }

    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->header('新增餐廳')
            ->description('請於此頁面建立新餐廳')
            ->body($this->form());
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Restaurant());

        $grid->column('id', __('Id'));
        $grid->column('res_name', __('Res name'));
        $grid->column('res_tel', __('Res tel'));
        $grid->column('res_address', __('Res address'));
        $grid->column('res_cover', __('Res cover'));
        $grid->column('res_menu', __('Res menu'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Restaurant::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('res_name', __('Res name'));
        $show->field('res_tel', __('Res tel'));
        $show->field('res_address', __('Res address'));
        $show->field('res_cover', __('Res cover'));
        $show->field('res_menu', __('Res menu'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Restaurant());

        $form->text('res_name', __('Res name'));
        $form->number('res_tel', __('Res tel'));
        $form->text('res_address', __('Res address'));
        $form->image('res_cover', __('Res cover'));
        $form->image('res_menu', __('Res menu'));

        return $form;
    }
    
}
