<?php
namespace app\admin\controller;
use app\admin\controller\base\Base;
use app\admin\model\Role;
use app\admin\model\Rule;
class Power extends Base
{
	// 角色列表
	public function index()
	{
		$list = (new Role)->select();
		$this->assign('list',$list);
		return $this->fetch();
	}

	//添加权限分配
  public function tree(){
      if (request()->isPost()){
          $rules = (new Rule)->RuleTree(input('post.id'));
          return $rules;
      }else{
          $rules = (new Rule)->RuleTree();
          return $rules;
      }
  }
	// 添加角色
	public function add(){
		if(request()->isPost()){
			$roles = json_decode(input('post.data'),true);
      $rules = implode(',',array_unique(json_decode(input('post.rules'),true)));
      if (!isset($roles['status'])){
          $roles['status'] = 0;
      }
      $roles['rules'] = $rules;
			if ((new Role)->save($roles)) {
				$data = [
					'msg'   => '添加成功',
					'icon'  => 6
				];
			}else{
				$data = [
					'msg'   => '添加失败',
					'icon'  => 5
				];
			}
			return json_encode($data);
		}else{
			return $this->fetch();
		}
	}
	//编辑角色
	public function edit(){
		if(request()->isPost()){
			$roles = json_decode(input('post.data'),true);
      $rules = implode(',',array_unique(json_decode(input('post.rules'),true)));
      if (!isset($roles['status'])){
          $roles['status'] = 0;
      }
      $roles['rules'] = $rules;
			if ((new Role)->update($roles)) {
				$data = [
					'msg'   => '编辑成功',
					'icon'  => 6
				];
			}else{
				$data = [
					'msg'   => '编辑失败',
					'icon'  => 5
				];
			}
			return json_encode($data);
		}else{
			$Field = Role::find(input('id'));
      $this->assign('field',$Field);
			return $this->fetch();
		}
	}

	public function del(){
		$id = input('id');
		if (Role::destroy($id)) {
			$data = [
					'msg'  => '删除成功',
					'icon' => 6
			];
		}else{
			$data = [
					'msg'  => '删除失败',
					'icon' => 5
			];
		}
		return json_encode($data);
	}

	/*权限规则*/
	public function powerlist(){
		$rules = (new Rule)->GetRulesAll();
		$this->assign('rules',$rules);
		return $this->fetch();
	}

	public function poweradd(){
		if (request()->isPost()) {
			$post = json_decode(input('post.data'),true);
			$plevel = (new Rule)->where('id',$post['pid'])->field('id,level_id,parent_id')->find();
      if ($plevel){
					$post['parent_id'] = $plevel['parent_id'];
					if ($plevel['level_id'] == 1) {
						$post['parent_id'] = $plevel['id'];
					}
          $post['level_id'] = $plevel['level_id']+1;
      }else{
          $post['level_id'] = 1;
					$post['parent_id'] = 1;
      }
      if((new Rule)->save($post)){
          $data = [
              'msg'  => '添加成功',
              'icon' => 6
          ];
      }else{
          $data = [
              'msg'  => '添加失败',
              'icon' => 5
          ];
      }
      return json_encode($data);
		}else{
			$rules = (new Rule)->GetRulesAll();
			$this->assign('rules',$rules);
			return $this->fetch();
		}
	}

	public function poweredit(){
		if (request()->isPost()) {
			$post = json_decode(input('post.data'),true);
			$plevel = (new Rule)->where('id',$post['pid'])->field('id,level_id,parent_id')->find();
      if ($plevel){
					$post['parent_id'] = $plevel['parent_id'];
					if ($plevel['level_id'] == 1) {
						$post['parent_id'] = $plevel['id'];
					}
          $post['level_id'] = $plevel['level_id']+1;
      }else{
          $post['level_id'] = 1;
      }
      if((new Rule)->update($post)){
          $data = [
              'msg'  => '编辑成功',
              'icon' => 6
          ];
      }else{
          $data = [
              'msg'  => '编辑失败',
              'icon' => 5
          ];
      }
      return json_encode($data);
		}else{
			$rules = (new Rule)->GetRulesAll();

			$id = input('id');
			$field = (new Rule)->where('id',$id)->find()->toArray();
			$this->assign(['rules'=>$rules,'field'=>$field]);
			return $this->fetch();
		}
	}

	public function powerdel(){
		$id = input('id');
		if (Rule::destroy($id)) {
			$data = [
					'msg'  => '删除成功',
					'icon' => 6
			];
		}else{
			$data = [
					'msg'  => '删除失败',
					'icon' => 5
			];
		}
		return json_encode($data);
	}
}
