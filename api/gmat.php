<?php
require_once '../source/class/class_core.php';
$discuz = C::app();
$discuz->init();
require DISCUZ_ROOT.'./config/config_ucenter.php';

$model = new gmat_class();
$action = $_GET['action'];
$model->$action();
class gmat_class {
    /**
     * 栏目
     * @Obelisk
     */
    function ziliao(){
        $data = DB::fetch_all("select id,fields from ".DB::table('common_block_item')." where bid=13 order by itemid asc");
        $arr = [];
        foreach($data as $k => $v){
            $m = unserialize($v['fields']);
            $m['id'] = $v['id'];
            $arr[] = $m;
        }
        die(json_encode($arr));
    }
    /**
     * 列表
     * @Obelisk
     */
    function ziliaolist(){
        $fid = $_GET['fid'];
        $data = DB::fetch_all("SELECT fid ,name FROM ".DB::table('forum_forum')." WHERE fup=$fid AND status=1 order by fid DESC limit 3");
        foreach($data as $k => $v){
            if($v['name'] == '全部帖子'){
                $data[$k]['list'] = DB::fetch_all("SELECT t.*, f.name FROM ".DB::table('forum_thread')." t LEFT JOIN ".DB::table('forum_forum')." f ON f.fid = t.fid WHERE t.fid='$fid' AND t.closed NOT LIKE 'moved|%' AND t.displayorder !=3 AND t.displayorder>=0 ORDER BY t.displayorder DESC ,t.lastpost DESC limit 20");
                $data[$k]['fid'] = $fid;
            }else{
                $data[$k]['list'] = DB::fetch_all("SELECT t.*, f.name FROM ".DB::table('forum_thread')." t LEFT JOIN ".DB::table('forum_forum')." f ON f.fid = t.fid WHERE t.fid='{$v['fid']}' AND t.closed NOT LIKE 'moved|%' AND t.displayorder !=3 AND t.displayorder>=0 ORDER BY t.displayorder DESC ,t.lastpost DESC limit 20");
            }
        }
        $top = DB::fetch_all("SELECT t.*, f.name FROM ".DB::table('forum_thread')." t LEFT JOIN ".DB::table('forum_forum')." f ON f.fid = t.fid WHERE t.closed NOT LIKE 'moved|%' AND t.displayorder =3 ORDER BY t.displayorder DESC ,t.lastpost DESC");
        die(json_encode(['data' => $data,'top' => $top]));
    }

    /**
     * 列表
     * @Obelisk
     */
    function toeflAppList(){
        $data = DB::fetch_all("SELECT t.*, f.name FROM ".DB::table('forum_thread')." t LEFT JOIN ".DB::table('forum_forum')." f ON f.fid = t.fid WHERE t.closed NOT LIKE 'moved|%' AND t.displayorder !=3 ANd t.fid in (37,257) AND t.displayorder>=0 ORDER BY t.displayorder DESC ,t.lastpost DESC limit 10");
        $top = DB::fetch_all("SELECT t.*, f.name FROM ".DB::table('forum_thread')." t LEFT JOIN ".DB::table('forum_forum')." f ON f.fid = t.fid WHERE t.closed NOT LIKE 'moved|%' AND t.displayorder =3 ORDER BY t.displayorder DESC ,t.lastpost DESC");
        die(json_encode(['data' => $data,'top' => $top]));
    }

    /**
     * 分页
     * @Obelisk
     */
    function toeflAppListPage(){
        $page = $_GET['page']-1;
        $limit = $page*10;
        $data = DB::fetch_all("SELECT t.*, f.name FROM ".DB::table('forum_thread')." t LEFT JOIN ".DB::table('forum_forum')." f ON f.fid = t.fid WHERE t.closed NOT LIKE 'moved|%' AND t.displayorder !=3 ANd t.fid in (37,257) AND t.displayorder>=0 ORDER BY t.displayorder DESC ,t.lastpost DESC limit $page,10");
        die(json_encode(['data' => $data]));
    }

    /**
     * 详情
     * @Obelisk
     */
    function bbsDetail(){
        $tid = $_GET['tid'];
        $data = DB::fetch_first("SELECT t.*,p.message as bbscontent,p.pid FROM ".DB::table('forum_thread')." t LEFT JOIN ".DB::table('forum_post')." p ON t.tid = p.tid  WHERE t.tid=$tid AND p.first=1 ");
        $comment = DB::fetch_all("SELECT * FROM ".DB::table('forum_post')." WHERE tid=$tid AND first=0 order by pid DESC");
        foreach($comment as $k => $v){
            $comment[$k]['child'] = DB::fetch_all("SELECT * FROM ".DB::table('dxksst_floor')." WHERE pid={$v['pid']} order by id DESC");
        }
        die(json_encode(['data' => $data,'comment' => $comment]));
    }

    /**
     * 发帖
     * @Obelisk
     */
    function putThread(){
        $uid = $_GET['uid'];
        $reid = $_GET['reid'];
        $username = DB::fetch_first("SELECT username FROM ".DB::table('common_member')." WHERE uid = $uid");
        $username = $username['username'];
        $message = $_GET['message'];
        $subject = $_GET['subject'];
        $fid = $_GET['fid'];
        $newthread = array(
            'fid' => $fid,
            'posttableid' => 0,
            'readperm' => 0,
            'price' => '',
            'typeid' => 0,
            'sortid' => 0,
            'author' => $username,
            'authorid' => $uid,
            'subject' => $subject,
            'dateline' => time(),
            'lastpost' => time(),
            'lastposter' => $username,
            'displayorder' => 0,
            'digest' => NULL,
            'special' => 0,
            'attachment' => 0,
            'moderated' => 0,
            'status' => 32,
            'isgroup' => 0,
            'replycredit' => 0,
            'closed' => 0
        );
        $tid = C::t('forum_thread')->insert($newthread, true);
        C::t('forum_newthread')->insert(array(
            'tid' => $tid,
            'fid' => $fid,
            'dateline' => time(),
        ));
        $pid = $this->insertpost(array(
            'fid' => $fid,
            'tid' => $tid,
            'first' => '1',
            'author' => $username,
            'authorid' => $uid,
            'subject' => $subject,
            'dateline' => time(),
            'message' => $message,
            'useip' =>  getglobal('clientip'),
            'port' => getglobal('remoteport'),
            'invisible' => 0,
            'anonymous' => 0,
            'usesig' => 1,
            'htmlon' => 0,
            'bbcodeoff' => -1,
            'smileyoff' => -1,
            'parseurloff' => 0,
            'attachment' => '0',
            'tags' => '',
            'replycredit' => 0,
            'status' => 1024
        ));
        C::t('forum_sofa')->insert(array('tid' => $tid,'fid' => $fid));
        if($pid){
            die(json_encode(['code' => 1,'fid' => $reid]));
        }else{
            die(json_encode(['code' => 0]));
        }
    }

    /**
    插入一个帖子
     */
    function insertpost($data) {
        if(isset($data['tid'])) {
            $thread = C::t('forum_thread')->fetch($data['tid']);
            $tableid = $thread['posttableid'];
        } else {
            $tableid = $data['tid'] = 0;
        }
        $pid = C::t('forum_post_tableid')->insert(array('pid' => null), true);


        $data = array_merge($data, array('pid' => $pid));

        C::t('forum_post')->insert($tableid, $data);
        if($pid % 1024 == 0) {
            C::t('forum_post_tableid')->delete_by_lesspid($pid);
        }
        return $pid;
    }

    /**
    1级回复
     */
    function firstReply() {
        $uid = $_GET['uid'];
        $username = DB::fetch_first("SELECT username FROM ".DB::table('common_member')." WHERE uid = $uid");
        $username = $username['username'];
        $message = $_GET['message'];
        $fid = $_GET['fid'];
        $tid = $_GET['tid'];
        $num = count(DB::fetch_all("SELECT pid FROM ".DB::table('forum_post')." WHERE tid = $tid"));
        $pid = $this->insertpost(array(
            'fid' => $fid,
            'tid' => $tid,
            'first' => '0',
            'author' => $username,
            'authorid' => $uid,
            'subject' => '',
            'dateline' => time(),
            'message' => $message,
            'useip' =>  getglobal('clientip'),
            'port' => getglobal('remoteport'),
            'invisible' => 0,
            'anonymous' => 0,
            'usesig' => 1,
            'htmlon' => 0,
            'bbcodeoff' => -1,
            'smileyoff' => -1,
            'parseurloff' => 0,
            'attachment' => '0',
            'tags' => '',
            'replycredit' => 0,
            'status' => 1024,
            'position' => $num+1
        ));

        if($pid){
            die(json_encode(['code' => 1]));
        }else{
            die(json_encode(['code' => 0]));
        }
    }

    /**
     * 2级回复
     * @Obelisk
     */
    function secondReply(){
        $uid = $_GET['uid'];
        $pid = $_GET['pid'];
        $message = $_GET['message'];
        $username = DB::fetch_first("SELECT username FROM ".DB::table('common_member')." WHERE uid = $uid");
        $username = $username['username'];
        $post=array(
            'pid'=>$pid,
            'thisid'=>0,
            'gradation'=>1,
            'uid'=>$uid,
            'username'=>$username,
            'message'=>$message,
            'dateline'=>time(),
        );
        $maxnum=C::t("#dxksst_floor#smart")->insert_new($post);
        if($maxnum){
            die(json_encode(['code' => 1]));
        }else{
            die(json_encode(['code' => 0]));
        }
    }
}