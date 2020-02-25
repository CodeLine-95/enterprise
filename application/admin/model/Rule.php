<?php
namespace app\admin\model;
use think\Db;
use think\Model;

class Rule extends Model
{
    /**
    * [getParentMenu 用户权限顶级菜单]
    */
    public function getParentMenu($nodeStr = ''){
        //超级管理员没有节点数组
        $where = empty($nodeStr) ? 'status = 1 and pid = 0' : 'status = 1 and pid = 0 and id in('.$nodeStr.')';
        $result = $this->where($where)->order('sort asc')->select();
        return $result;
    }
    /**
    * [getChildMenu 获取顶级节点下的所有子菜单]
    */
    public function getChildMenu($id,$nodeStr = ''){
      // var_dump($id);

      //超级管理员没有节点数组
      // $where = empty($nodeStr) ? 'status = 1  and parent_id = '.$id : 'status = 1  and id in('.$nodeStr.')';
      $where = empty($nodeStr) ? 'status = 1 and pid >= '.$id.' and parent_id = '.$id : 'status = 1 and pid >= '.$id.' and parent_id = '.$id.' and id in('.$nodeStr.')';
      // var_dump($where);exit();
      $result = $this->where($where)->order('sort asc')->select();
      // var_dump($result);exit();
      $menu = $this->prepareMenu($result,$id);
      // var_dump($menu);exit();

      return $menu;
    }
    /**
     * [getMenu 根据节点数据获取对应的菜单]
     */
    public function getMenu($nodeStr = '')
    {
        //超级管理员没有节点数组
        $where = empty($nodeStr) ? 'status = 1' : 'status = 1 and id in('.$nodeStr.')';
        $result = $this->field(true)->where($where)->order('sort asc')->select();
        $menu = $this->prepareMenu($result);
        return $menu;
    }

    /**
     * 整理菜单树方法
     * @param $param
     * @return array
     */
    public function prepareMenu($param,$pid=0){
        $menus = $one =  array();
        foreach ($param as $k => $v) {
            $one['id'] = $v['id'];
            $one['name'] = $v['name'];
            if ($v['url'] !== '#'){
              $one['url'] = url($v['url']);
            }else{
              unset($one['url']);
            }
            $one['icon'] = $v['icon'];
            if($v['pid']==$pid){
                $one['child'] = $this->prepareMenu($param,$v['id']);
                $menus[]=$one;
            }
        }
        return $menus;
    }

    /**
     * [getRoleInfo 获取角色信息]
     */
    public function getRoleInfo($id){

        $result = Db::name('role')->where('id', $id)->find();
        if(empty($result['rules'])){
            $where = '';
        }else{
            $where = 'id in('.$result['rules'].')';
        }
        $res = $this->field('url')->where($where)->select();

        foreach($res as $key=>$vo){
            if('#' != $vo['url']){
                $result['url'][] = $vo['url'];
            }
        }

        return $result;
    }

    public function GetRulesAll(){
        $RulesRes = $this->field('id,url,name,status,pid,level_id')->order('id','desc')->select();
        return $this->GetRules($RulesRes);
    }

    public function GetRules($RulesRes,$pid=0){
        static $RulesAll = array();
        foreach ($RulesRes as $Rules){
            if ($Rules['pid'] == $pid){
                $str = ($Rules['level_id'] != 0)?'<i class="layui-icon layui-icon-triangle-r"></i>':'';
                if ($Rules['url'] == '#') {
                  $Rules['url'] = '';
                }
                $Rules['_name'] =str_repeat("&nbsp;&nbsp;",$Rules['level_id']*1).$str.$Rules['name'];
                $RulesAll[] = $Rules;
                $this->GetRules($RulesRes,$Rules['id']);
            }
        }
        return $RulesAll;
    }

    /**
     * 所有的权限树 --- xtree数据格式
     */
    public function RuleTree($id=0){
        $Rules = $this->select();
        $rules = (new Role)->field('rules')->where('id',$id)->find();
        if(!empty($rules)){
            $rule = explode(',', $rules['rules']);
            $arr = $this->sort($Rules,$rule);
        }else{
            $arr = $this->sort($Rules,$rules);
        }
        return $arr;
    }

    // xtree数据格式递归
    public function sort($data,$rules,$pid=0){
        $arr = $one =  array();
        foreach ($data as $k => $v) {
            $one['title'] = $v['name'];
            if($v['pid']==$pid){
                $one['value']=$this->getparentid($v['id']);
                if (!empty($rules) && in_array($v['id'], $rules)){
                    $one['checked'] = true;
                }else{
                  $one['checked'] = false;
                }
                $one['data'] = $this->sort($data,$rules,$v['id']);
                $arr[]=$one;
            }
        }
        return $arr;
    }

    /**
     * 所有的权限树 --- authtree数据格式
     */
    public function RulesTree($id=0){
        $Rules = $this->select();
        $rules = (new Role)->field('rules')->where('id',$id)->find();
        if(!empty($rules)){
            $rule = explode(',', $rules['rules']);
            $arr = $this->authtreesort($Rules,$rule);
        }else{
            $arr = $this->authtreesort($Rules,$rules);
        }
        return $arr;
    }
    // authtree数据格式递归
    public function authtreesort($data,$rules,$pid=0){
        $arr = $one =  array();
        foreach ($data as $k => $v) {
            $one['title'] = $v['name'];
            if($v['pid']==$pid){
                $one['value'] = $v['id'];
                if (!empty($rules) && in_array($v['id'], $rules)){
                    $one['checked'] = true;
                }else{
                  $one['checked'] = false;
                }
                $one['disable'] = false;
                if (!empty($this->authtreesort($data,$rules,$v['id']))) {
                  $one['list'] = $this->authtreesort($data,$rules,$v['id']);
                }
                $arr[]=$one;
            }
        }
        return $arr;
    }

    /**
     * 获取所有的父节点 - xtree
     */
    public function getparentid($authRuleId){
        $AuthRuleRes=$this->select();
        return $this->_getparentid($AuthRuleRes,$authRuleId,True);
    }

    public function _getparentid($AuthRuleRes,$authRuleId,$clear=False){
        static $arr=array();
        if($clear){
            $arr=array();
        }
        foreach ($AuthRuleRes as $k => $v) {
            if($v['id'] == $authRuleId){
                $arr[]=$v['id'];
                $this->_getparentid($AuthRuleRes,$v['pid'],False);
            }
        }
        asort($arr);
        $arrStr=implode('-', $arr);
        return $arrStr;
    }
}
