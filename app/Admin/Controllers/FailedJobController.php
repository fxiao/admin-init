<?php

namespace App\Admin\Controllers;

use App\Models\FailedJob;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class FailedJobController extends Controller
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
            ->header('failed_jobs')
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
            ->header('failed_jobs')
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
            ->header('failed_jobs')
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
            ->header('failed_jobs')
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
        $grid = new Grid(new FailedJob);

        $grid->id('ID');

        $grid->connection('');
        $grid->queue('');
        $grid->payload('');
        $grid->exception('');

        $grid->failed_at('');

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
        $show = new Show(FailedJob::findOrFail($id));

        $show->id('ID');

        $show->connection('');
        $show->queue('');
        $show->payload('');
        $show->exception('');

        $show->failed_at('');

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
        $form = new Form(new FailedJob);

        $form->display('id', 'ID');

        $form->text('connection', '');
        $form->text('queue', '');
        $form->text('payload', '');
        $form->text('exception', '');

        $form->datetime('failed_at', '')->default('current_timestamp()');

        $form->display('created_at', '创建时间');
        $form->display('updated_at', '更新时间');

        return $form;
    }
}
