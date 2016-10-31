<?php
if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
if (!class_exists('PhpThumbFactory',false)) require_once('source/plugin/chs_tiebalist/phpthumb/ThumbLib.inc.php');
class ThumbBuilder {
    private $basedir;
	private $baseurl;
    public function __construct(){
        global $_G;
		$this->basedir=!$_G['setting']['attachdir'] ? (DISCUZ_ROOT.'data/attachment/'):$_G['setting']['attachdir'];
		$this->baseurl=!$_G['setting']['attachurl'] ? ('data/attachment/'):$_G['setting']['attachurl'];
    }
    private function getThumbPath($tid){
        return 'tiebalist/'.substr(md5($tid), 0, 2).'/'.substr(md5($tid), 2, 2).'/';
    }
    public function GetThreadThumbs($tid,$attachs,$force=false){
        global $_G;        
        $thumbpath=$this->getThumbPath($tid);
        $fullpath=$this->basedir.$thumbpath;
        $fullurl=$this->baseurl.$thumbpath;
        $thumburls=array();
        $thumbfiles=array();
        $needtocreate=array();
        foreach($attachs as $attach){
            $aid=$attach['aid'];
            if ($aid){
                $attachment=($attach['remote'] ? $_G['setting']['ftp']['attachurl'] : $_G['setting']['attachdir']).'forum/'.$attach['attachment'];
                $filename=$aid.'.jpg';
            }else {
                $attachment=$attach['attachment'];
                $filename='outsite_'.basename($attachment).'.jpg';  
            }
            $thumbfile=$fullpath.$filename;
            $thumburl=$fullurl.$filename;
            if ($force||!file_exists($thumbfile)) $needtocreate[]=array('source'=>$attachment,'target'=>$thumbfile);
            $thumburls[]=$thumburl;
            if ($force) $thumbfiles[]=$filename;
        }
        if ($needtocreate){
            dmkdir($fullpath);
            $setting=&$_G['cache']['plugin']['chs_tiebalist'];
            $thumbheight=$setting['thumbheight']?$setting['thumbheight']:80;
            $thumbmaxwidth=$setting['thumbmaxwidth']?$setting['thumbmaxwidth']:300;
            $fp=fopen($fullpath.'FLOCK.PHP','w+');
            foreach($needtocreate as $tocreate){
                if (flock($fp,LOCK_EX)){
                    try {
                        $thumb = PhpThumbFactory::create($tocreate['source'],array('resizeUp'=>true));
                        $dimensions=$thumb->getCurrentDimensions();
                        $newwidth=$thumbheight*$dimensions['width']/$dimensions['height'];
                        if ($newwidth>$thumbmaxwidth) {
                            $thumb->adaptiveResize($thumbmaxwidth,$thumbheight);
                        }else {
                            $thumb->resize(0,$thumbheight);//封面不限定宽度
                        }
                        $thumb->save($tocreate['target']);
                        flock($fp, LOCK_UN);
                    }catch(Exception $oEx){//捕获生成缩略图可能抛出的异常，防止中断
                        writelog('tiebalistlog',$oEx->getMessage());
                        copy(DISCUZ_ROOT.'source/plugin/chs_tiebalist/template/images/nothumb.jpg',$tocreate['target']);
                        flock($fp, LOCK_UN);
                    }
                }else continue;
            }
            fclose($fp);   
        }
        if ($force){
            $thumbfilesinpath=$this->getfiles($fullpath,'jpg');
            foreach($thumbfilesinpath as $filename){
                if (!in_array($filename,$thumbfiles)) unlink($fullpath.$filename);
            }
        }
        return $thumburls;
    }
    
    private function getfiles($dir,$mask=''){
         $fileArray=array();
         if (false != ($handle = opendir ($dir))) {
            while (false!==($file=readdir($handle))){
                if ($file == '.' || $file == '..') continue;
                if (empty($mask)) $fileArray[]=$file;
                else if (substr(strrchr($file, '.'), 1)==$mask) $fileArray[]=$file;
            } 
         }
         return $fileArray;
    }
}
?>