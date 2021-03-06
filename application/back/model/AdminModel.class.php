<?php
/**
 * Created by PhpStorm.
 * User: wdy
 * Date: 2018/7/8
 * Time: 上午11:22
 */


class AdminModel extends BaseModel{

    protected $_logic_table = 'admin';

    /**
     * 验证管理员是否合法
     * @param $admin_name
     * @param $admin_pwd
     *
     * @return mixed 合法：管理员信息数组，非法：false
     */
    public function check($admin_name, $admin_pwd){

        //echo '<br/>name='.$admin_name;
        // 加入转义，防止sql注入
//        $admin_name = addslashes($admin_name);
//        $admin_pwd = addslashes($admin_pwd);

        // 也可以使用MySQLDB提供的函数
        $admin_name_escape = $this->_dao->escapeString($admin_name);
        $admin_pwd_escape = $this->_dao->escapeString($admin_pwd);

        $sql = "SELECT * FROM $this->_table WHERE admin_name=$admin_name_escape and admin_pwd=md5($admin_pwd_escape)";
        $row = $this->_dao->getRow($sql);

        //echo 'row'.$row;

        return $row;
    }

}