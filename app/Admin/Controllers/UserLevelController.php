<?php

namespace App\Admin\Controllers;

use App\Models\UserLevel;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UserLevelController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('user_level')
            ->description('列表')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('user_level')
            ->description('查看')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('user_level')
            ->description('编辑')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('user_level')
            ->description('创建')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UserLevel);

        $grid->id('ID');

        $grid->name('名称');
        $grid->mark('唯一标识');
        $grid->order('排序');
        $grid->remark('备注');

        $grid->created_at('创建时间');
        $grid->updated_at('更新时间');

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
        $show = new Show(UserLevel::findOrFail($id));

        $show->id('ID');

        $show->name('名称');
        $show->mark('唯一标识');
        $show->order('排序');
        $show->remark('备注');

        $show->created_at('创建时间');
        $show->updated_at('更新时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new UserLevel);

        $form->display('id', 'ID');

        $form->text('name', '名称');
        $form->text('mark', '唯一标识');
        $form->number('order', '排序');
        $form->text('remark', '备注');

        $form->display('created_at', '创建时间');
        $form->display('updated_at', '更新时间');

        return $form;
    }
}
