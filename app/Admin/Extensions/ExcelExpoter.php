<?php

namespace App\Admin\Extensions;

use Encore\Admin\Grid\Exporters\AbstractExporter;
use Illuminate\Support\Collection;

//use Maatwebsite\Excel\Facades\Excel;

class ExcelExpoter extends AbstractExporter
{
    public function export()
    {
        \Excel::create('和平海报', function ($excel) {

            $excel->sheet('和平海报', function ($sheet) {
                $rows = $this->getData();
//                 这段逻辑是从表格数据中取出需要导出的字段
//
                $sheet->prependRow(1, ['编号', '作品名', '姓名', '年龄', '学校', '出生年月日', '年级', '指导老师', '老师电话', '老师邮箱', '家长姓名', '家长电话', '推荐服务队', '创作说明', '备注', '创建时间', '修改时间']);
                $sheet->rows($rows);

            });

        })->export('xls');


    }
}