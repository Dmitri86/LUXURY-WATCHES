<?php


namespace app\controllers;


use app\models\Breadcrumbs;
use app\models\Category;
use app\widgets\filter\Filter;
use ishop\App;
use ishop\libs\Pagination;
use RedBeanPHP\R;

class CategoryController extends AppController {

    public function viewAction(){
        $alias = $this->route['alias'];
        $category = R::findOne('category', 'alias = ?', [$alias]);
        if(!$category){
            throw new \Exception('Page not found', 404);
        }




        // breadcrumbs
        $breadcrumbs = Breadcrumbs::getBreadcrumbs($category->id);

        $cat_model = new Category();
        $ids = $cat_model->getIds($category->id);
        $ids = !$ids? $category->id : $ids . $category->id;

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = App::$app->getProperty('pagination');

        $sql_part = '';
        if(!empty($_GET['filter'])){
            $filter = Filter::getFilter();
            $sql_part = "AND id IN (SELECT product_id FROM attribute_product WHERE attr_id 
            IN ($filter))";
        }




        $total = R::count('product', "category_id IN ($ids) $sql_part");
        $pagination = new Pagination($page, $perpage,$total);
        $start = $pagination->getStart();

        $products = R::find('product', "category_id IN ($ids) $sql_part LIMIT $start, $perpage");

        if($this->isAjax()){
            $this->loadView('filter', compact('products', 'total',
            'pagination'));
        }

        $this->setMeta($category->title, $category->description, $category->keywords);
        $this->set(compact('products', 'breadcrumbs', 'pagination', 'total'));


    }

}