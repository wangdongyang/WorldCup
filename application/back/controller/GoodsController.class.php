<?php
/**
 * Created by PhpStorm.
 * User: wdy
 * Date: 2018/8/5
 * Time: 下午4:30
 */
class GoodsController extends PlatformController {


    /**
     * 商品添加表单
     */
    public function addAction(){

        require CURRENT_VIEW_PATH.'goods_add.html';
    }

    /**
     * 商品插入
     */
    public function insertAction(){

        // 第一步：收集表单数据
        $data['goods_name'] = $_POST['goods_name'];
        $data['shop_price'] = $_POST['shop_price'];
        $data['goods_desc'] = $_POST['goods_desc'];
        $data['goods_number'] = $_POST['goods_number'];
        // 上架
        $data['is_on_sale'] = isset($_POST['is_on_sale']) ? '1' : '0';
        // 推荐属性
        $data['goods_promote'] = isset($_POST['goods_promote']) ? implode(',', $_POST['goods_promote']) : '';


        // 第二步：通过模型插入数据表
        $m_goods = Factory::M('GoodsModel');
        if ($m_goods->inserGoods($data)){
            $this->_jump('index.php?p=back&c=Goods&a=list');
        }else{
            $this->_jump('index.php?p=back&c=Goods&a=add', '添加失败');
        }
    }

    public function listAction(){
        echo 'goods list';
    }
}