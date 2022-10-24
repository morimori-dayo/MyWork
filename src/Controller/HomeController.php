<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\ORM\Table;
use Punches;
use Migrations\Command\Phinx\Dump;
use App\Utils\AppUtility;

/**
 * Home Controller
 *
 * @method \App\Model\Entity\Home[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HomeController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        // コンポーネントの読み込み
        $this->loadComponent("PuncheData");
        $this->loadComponent("SerchUser");
        // テーブル取得
        $this->users = TableRegistry::getTableLocator()->get('users');
        $this->punch = TableRegistry::getTableLocator()->get('punches');
        // 自分の情報をViewに送信
        $me = $this->Authentication->getIdentity();
        $this->loadModel('Enterprises');
        $enterprise = $this->Enterprises->find('all')->where(['id'=>$me->enterprise_id])->first()->get('name');
        $this->set(compact('me', 'enterprise'));
        // アクセス制限にかからないよう
        $this->Authorization->skipAuthorization();
    }

    public function home()
    {   
        // ログイン中のユーザー情報取得
        $me = $this->Authentication->getIdentity();

        // 社員情報を取得
        $users = $this->SerchUser->getEmployee($me->enterprise_id, $me->id);
        //debug($users);
        //$users = $users->where(['not' => ['id' => $me->id]]);


        if ($this->request->is('post')) {
            // 社員検索処理
            if(isset($_POST['searchButton'])) {
                // 入力値受け取り
                $find = $this->request->getData('find');
                // 条件に一致する社員の情報を取り出す
                $users = $this->SerchUser->getEmployee($me->enterprise_id, $me->id, $find);
                //ユーザーの人数を取得
                $count = $users->count();
                $this->set('count', $count);
            }
        }
        
        // 出勤状況表示部分
        $status = $this->solve($users);
        // ログイン中ユーザーの勤怠情報を送信
        $flag = $this->PuncheData->getPunchStatement($me->id);
        
        // Viewへの受け渡し
        $this->set(compact('users', 'flag', 'status'));
    }

    public function works($month = null, $year = null)
    {
        $me = $this->Authentication->getIdentity()->get('id');
        $data = $this->PuncheData->getMonthlyData($me, $month, $year);
        $this->set(compact('data'));

    }

    /* 打時刻処理 */
    public function punch(){
        $me = $this->Authentication->getIdentity();
        if ($this->request->is('post')) {
            // エンティティーの生成
            $punches = $this->punch->newEmptyEntity();
            // データの登録
            $punches->user_id = $me->id;
            $punches->date = date("Y/m/d");
            $punches->time = date('Y-m-d H:i:s');

            // 出勤
            if(isset($_POST['attend'])) {
                $punches->identify = 1;
            }
            // 休憩開始
            if(isset($_POST['restStart'])) {
                $punches->identify = 2;
            }
            // 休憩終了
            if(isset($_POST['restFinish'])) {
                $punches->identify = 3;
            }
            // 退勤
            if(isset($_POST['leave'])) {
                $punches->identify = 4;
            }
            // データ登録
            try {
                $this->punch->saveOrFail($punches);
            } catch (\Cake\ORM\Exception\PersistenceFailedException $e) {
                echo $e->getEntity();
            }
        }
        // HOME画面へリダイレクトさせる
        $this->redirect(['action' => 'home']);
    }

    // 実験用
    public function index()
    {
    }
    
    //内部処理
    private function solve($users)
    {
        $array = array();
        foreach($users as $user){
            switch($this->solveStatus($user->id)){
                case null:
                    $data = "退勤";
                    break;
                case 1:
                    $data = "勤務中";
                    break;
                case 2:
                    $data = "休憩中";
                    break;
                case 3:
                    $data = "勤務中";
                    break;
                case 4:
                    $data = "退勤";
                    break;
            }
            array_push($array, $data);
        }
        return $array;
    }
    private function solveStatus($id)
    {
        return $this->PuncheData->getPunchStatement($id);
    }
    private function checkStatus($id,$identify,$date = null)
    {
        if($date!=null){
            // 昨日
            $date = date('Y-m-d', strtotime('-1 day'));
        }else{
            // 今日
            $date = date('Y-m-d');
        }
        // 指定されたユーザー 及び 日付の最新（最後に追加された）データを取得
        $query = $this->Punches
        ->find('all')
        ->where(['user_id'=>$id, 'date'=>$date, 'identify'=>$identify])
        ->last();
        // 取得したデータが空ならFalse あるならTrueを返す
        if($query == null){
            return false;
        }else{
            return true;
        }
    }
    
}
