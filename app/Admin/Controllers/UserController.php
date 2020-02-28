<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UserController extends Controller
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
            ->header('users')
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
            ->header('users')
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
            ->header('users')
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
            ->header('users')
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
        $grid = new Grid(new User);

        $grid->id('ID');

        $grid->username('用户名');
        $grid->name('姓名');
        $grid->phone('手机号');
        $grid->password('密码');

        $grid->status('状态');
        $grid->avatar('头像');
        $grid->parent_id('推荐人');
        $grid->user_level_id('等级');

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
        $show = new Show(User::findOrFail($id));

        $show->id('ID');

        $show->username('用户名');
        $show->name('姓名');
        $show->phone('手机号');
        $show->password('密码');

        $show->status('状态');
        $show->avatar('头像');
        $show->parent_id('推荐人');
        $show->user_level_id('等级');

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
        $form = new Form(new User);

        $form->display('id', 'ID');

        $form->text('username', '用户名');
        $form->text('name', '姓名');
        $form->text('phone', '手机号');
        $form->text('password', '密码');

        $form->number('status', '状态');
        $form->text('avatar', '头像');
        $form->number('parent_id', '推荐人');
        $form->number('user_level_id', '等级');

        $form->display('created_at', '创建时间');
        $form->display('updated_at', '更新时间');

        return $form;
    }
}
