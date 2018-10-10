<?php

namespace App\Admin\Controllers;

use App\Admin\Extensions\ExcelExpoter;
use App\Item;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ItemController extends Controller
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
            ->header('投稿管理')
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
            ->header('详情')
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
            ->header('编辑')
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
            ->header('新增')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Item);

        $grid->id('编号')->sortable();
        $grid->title('作品名');
        $grid->name('姓名');
        $grid->age('年龄')->sortable();
        $grid->school('学校');
        $grid->birthday('出生年月日')->sortable()->display(function($birthday){
            return (new Carbon($birthday))->format('Y/m/d');
        });
        $grid->class('年级')->sortable();
        $grid->teacher('指导老师');
        $grid->teacher_phone('老师电话');
        $grid->teacher_email('老师邮箱');
        $grid->parents('家长姓名');
        $grid->parents_phone('家长电话');
        $grid->group('推荐服务队');
        $grid->thought('创作说明');
        $grid->note('备注');
        $grid->created_at('创建时间');
        $grid->updated_at('修改时间')->sortable();

        $grid->exporter(new ExcelExpoter());

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
        $show = new Show(Item::findOrFail($id));

        $show->id('编号');
        $show->title('作品名');
        $show->name('姓名');
        $show->age('年龄');
        $show->school('学校');
        $show->birthday('出生年月日');
        $show->class('年级');
        $show->teacher('指导老师');
        $show->teacher_phone('老师电话');
        $show->teacher_email('老师邮箱');
        $show->parents('家长姓名');
        $show->parents_phone('家长电话');
        $show->group('推荐服务队');
        $show->thought('创作说明');
        $show->note('备注');
        $show->created_at('创建时间');
        $show->updated_at('修改时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Item);

        $form->text('title', '作品名');
        $form->text('name', '姓名');
        $form->number('age', '年龄');
        $form->text('school', '学校');
        $form->datetime('birthday', '生日')->default(date('Y-m-d'));
        $form->text('class', '年级');
        $form->text('teacher', '指导老师');
        $form->text('teacher_phone', '老师电话');
        $form->text('teacher_email', '老师邮箱');
        $form->text('parents', '家长姓名');
        $form->text('parents_phone', '家长电话');
        $form->text('group', '推荐服务队');
        $form->textarea('thought', '创作说明');
        $form->text('note', '备注');

        return $form;
    }
}
