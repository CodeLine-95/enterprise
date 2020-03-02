<?php
namespace app\api\controller;

use think\Controller;
use app\api\model\Expert;
use think\Log;

class Common extends Controller
{
    /**
     * 导游信息含分页 [get]
     * @return \think\response\Json
     */
    public function expertList(){
        try {
            if (request()->isGet()) {
                $params = request()->get();
                if (!isset($params['page'])) {
                    $params['page'] = 1;
                }
                if (!isset($params['pageSize'])) {
                    $params['pageSize'] = 10;
                }
                $expertCount = (new Expert())->count();
                $lastPage = ceil($expertCount / $params['pageSize']);
                if ($params['page'] > $lastPage) {
                    $params['page'] = $lastPage;
                }
                $pageOffset = ($params['page'] - 1) * $params['pageSize'];
                $expert = (new Expert())->limit($pageOffset, $params['pageSize'])->select()->toArray();
                $json = [
                    'codeMsg' => 'SUCCESS',
                    'code' => 200,
                    'totalCount' => $expertCount,
                    'page' => $params['page'],
                    'totalPage' => $lastPage,
                    'pageSize' => $params['pageSize'],
                    'data' => $expert
                ];
                return json($json);
            } else {
                return json(['codeMsg' => '请求错误', 'code' => 400]);
            }
        }catch (\Exception $e){
            Log::error($e);
            return json(['codeMsg'=>$e->getMessage(),'code'=>$e->getCode()]);
        }
    }

    /**
     * 导游信息详情  [get]
     * @return \think\response\Json
     */
    public function expertDetail(){
        try {
            if (request()->isGet()){
                $id = input('id');
                $expertDetail = (new Expert())->where(['id'=>$id])->find()->toArray();
                $json = [
                    'codeMsg' => 'SUCCESS',
                    'code' => 200,
                    'data' => $expertDetail
                ];
                return json($json);
            } else {
                return json(['codeMsg' => '请求错误', 'code' => 400]);
            }
        }catch (\Exception $e){
            Log::error($e);
            return json(['codeMsg'=>$e->getMessage(),'code'=>$e->getCode()]);
        }
    }
}