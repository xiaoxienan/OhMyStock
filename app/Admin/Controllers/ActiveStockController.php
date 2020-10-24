<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ActiveStock;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class ActiveStockController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ActiveStock(['company']), function (Grid $grid) {
            $grid->column('company.name');
            $grid->column('company.symbol');
            $grid->column('last_price')->sortable();
            $grid->column('one_day_change')->sortable();
            $grid->column('vti_one_day_rel')->sortable();
            $grid->column('vti_five_day_rel')->sortable();
            $grid->column('vti_one_month_rel')->sortable();
            $grid->column('price_divergence_cs')->sortable();
            $grid->column('price_divergence_sm')->sortable();
            $grid->column('price_divergence_ml')->sortable();
            $grid->column('last_tradvol')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new ActiveStock(), function (Show $show) {
            $show->field('id');
            $show->field('company_id');
            $show->field('calculated_at');
            $show->field('last_price');
            $show->field('before_last_price');
            $show->field('one_day_change');
            $show->field('vti_one_day_rel');
            $show->field('vti_five_day_rel');
            $show->field('vti_one_month_rel');
            $show->field('price_divergence_cs');
            $show->field('price_divergence_sm');
            $show->field('price_divergence_ml');
            $show->field('last_tradvol');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new ActiveStock(), function (Form $form) {
            $form->display('id');
            $form->text('company_id');
            $form->text('calculated_at');
            $form->text('last_price');
            $form->text('before_last_price');
            $form->text('one_day_change');
            $form->text('vti_one_day_rel');
            $form->text('vti_five_day_rel');
            $form->text('vti_one_month_rel');
            $form->text('price_divergence_cs');
            $form->text('price_divergence_sm');
            $form->text('price_divergence_ml');
            $form->text('last_tradvol');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
