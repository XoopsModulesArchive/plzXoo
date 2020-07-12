<?php

// <--- BASIC PROPERTY --->
$modversion['name'] = _MI_PLZXOO_NAME;
$modversion['version'] = 1.03; // alt
$modversion['description'] = _MI_PLZXOO_NAME_DESC;

$modversion['credits'] = "";
$modversion['author'] = "" ;
$modversion['license'] = "";
$modversion['official'] = 0;
$modversion['image'] = "images/plzXoo.png";
$modversion['dirname'] = "plzXoo";

// <--- TEMPLATE PROPERTY --->
$modversion['use_smarty']=1;
$modversion['templates'][0]['file'] = 'plzxoo_index.html';
$modversion['templates'][0]['description'] = '';
$modversion['templates'][1]['file'] = 'plzxoo_detail.html';
$modversion['templates'][1]['description'] = '';
$modversion['templates'][2]['file'] = 'plzxoo_header_category.html';
$modversion['templates'][2]['description'] = '';
$modversion['templates'][3]['file'] = 'plzxoo_header_nocategory.html';
$modversion['templates'][3]['description'] = '';
$modversion['templates'][4]['file'] = 'plzxoo_question_delete.html';
$modversion['templates'][4]['description'] = '';
$modversion['templates'][5]['file'] = 'plzxoo_question_close.html';
$modversion['templates'][5]['description'] = '';
$modversion['templates'][6]['file'] = 'plzxoo_question_edit.html';
$modversion['templates'][6]['description'] = '';
$modversion['templates'][7]['file'] = 'plzxoo_answer_delete.html';
$modversion['templates'][7]['description'] = '';
$modversion['templates'][8]['file'] = 'plzxoo_answer_edit.html';
$modversion['templates'][8]['description'] = '';
$modversion['templates'][9]['file'] = 'plzxoo_answer_response.html';
$modversion['templates'][9]['description'] = '';
$modversion['templates'][10]['file'] = 'plzxoo_d3comment_reference.html';
$modversion['templates'][10]['description'] = '';

// <--- BLOCK PROPERTY --->
$modversion['blocks'][1]['file'] = 'plzxoo_block_list.php';
$modversion['blocks'][1]['name'] = _MI_PLZXOO_BNAME1 ;
$modversion['blocks'][1]['show_func'] = 'plzxoo_block_list_show';
$modversion['blocks'][1]['edit_func'] = 'plzxoo_block_list_edit';
$modversion['blocks'][1]['template'] = 'plzxoo_block_list.html';
$modversion['blocks'][1]['options'] = 'plzXoo|5|50|0|0|0';
$modversion['blocks'][1]['can_clone'] = 'true';
$modversion['blocks'][2]['file'] = 'plzxoo_block_answers.php';
$modversion['blocks'][2]['name'] = _MI_PLZXOO_BNAME2 ;
$modversion['blocks'][2]['show_func'] = 'plzxoo_block_answers_show';
$modversion['blocks'][2]['edit_func'] = 'plzxoo_block_answers_edit';
$modversion['blocks'][2]['template'] = 'plzxoo_block_answers.html';
$modversion['blocks'][2]['options'] = 'plzXoo|5|50|0|0|0';
$modversion['blocks'][2]['can_clone'] = 'true';

// <--- SQL PROPERTY --->
$modversion['sqlfile']['mysql']='sql/mysql.sql';
$modversion['tables'][0] = 'plzxoo_question';
$modversion['tables'][1] = 'plzxoo_answer';
$modversion['tables'][2] = 'plzxoo_category';

// <--- ADMIN PROPERTY --->
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

// <--- MENU PROPERTY --->
$modversion['hasMain'] = 1;

// <--- SEARCH PROPERTY --->
$modversion['hasSearch'] = 1;
$modversion['search']['file'] = "include/search.inc.php";
$modversion['search']['func'] = "plzxoo_search";

// <--- CONFIG PROPERTY --->
$modversion['config'][1]['name']='points';
$modversion['config'][1]['title']='_MI_PLZXOO_POINTS';
$modversion['config'][1]['description']='_MI_PLZXOO_POINTS_DESC';
$modversion['config'][1]['formtype']='text';
$modversion['config'][1]['valuetype']='string';
$modversion['config'][1]['default']="0|5:2|10:1";

$modversion['config'][2]['name']='points2posts';
$modversion['config'][2]['title']='_MI_PLZXOO_POINTS2POSTS';
$modversion['config'][2]['description']='_MI_PLZXOO_POINTS2POSTS_DESC';
$modversion['config'][2]['formtype']='yesno';
$modversion['config'][2]['valuetype']='int';
$modversion['config'][2]['default']=1 ;

$modversion['config'][3]['name']='index_order_default';
$modversion['config'][3]['title']='_MI_PLZXOO_INDEXODRDEF';
$modversion['config'][3]['description']='';
$modversion['config'][3]['formtype']='select';
$modversion['config'][3]['valuetype']='int';
$modversion['config'][3]['default']=0 ;
$modversion['config'][3]['options']=array('_MI_PLZXOO_INDEXODR_INPUTDSC'=>0,'_MI_PLZXOO_INDEXODR_ST_INPUTDSC'=>2,'_MI_PLZXOO_INDEXODR_MODIFIEDDSC'=>4,'_MI_PLZXOO_INDEXODR_ST_MODIFIEDDSC'=>6) ;

$modversion['config'][4]['name']='autonotify_questioner';
$modversion['config'][4]['title']='_MI_PLZXOO_AUTONOTIFYQ';
$modversion['config'][4]['description']='_MI_PLZXOO_AUTONOTIFYQ_DESC';
$modversion['config'][4]['formtype']='yesno';
$modversion['config'][4]['valuetype']='int';
$modversion['config'][4]['default']=1 ;

$modversion['config'][5]['name']='autonotify_answerer';
$modversion['config'][5]['title']='_MI_PLZXOO_AUTONOTIFYA';
$modversion['config'][5]['description']='_MI_PLZXOO_AUTONOTIFYA_DESC';
$modversion['config'][5]['formtype']='yesno';
$modversion['config'][5]['valuetype']='int';
$modversion['config'][5]['default']=1 ;

$modversion['config'][6]['name']='listview_per_page';
$modversion['config'][6]['title']='_MI_PLZXOO_LISTVIEWPPG';
$modversion['config'][6]['description']='';
$modversion['config'][6]['formtype']='text';
$modversion['config'][6]['valuetype']='int';
$modversion['config'][6]['default']=20 ;

$modversion['config'][7]['name']='comment_dirname';
$modversion['config'][7]['title']='_MI_PLZXOO_D3COMMENT_DIRNAME';
$modversion['config'][7]['description']='';
$modversion['config'][7]['formtype']='text';
$modversion['config'][7]['valuetype']='string';
$modversion['config'][7]['default']='' ;

$modversion['config'][8]['name']='comment_forum_id';
$modversion['config'][8]['title']='_MI_PLZXOO_D3COMMENT_FORUM_ID';
$modversion['config'][8]['description']='';
$modversion['config'][8]['formtype']='text';
$modversion['config'][8]['valuetype']='int';
$modversion['config'][8]['default']=0 ;

// <--- NOTIFICATION PROPERTY --->
$modversion['hasNotification'] = 1;
$modversion['notification']['lookup_file'] = 'include/notification.inc.php' ;
$modversion['notification']['lookup_func'] = "plzXoo_notify_iteminfo" ;

$modversion['notification']['category'][1]['name'] = 'global';
$modversion['notification']['category'][1]['title'] = _MI_PLZXOO_GLOBAL_NOTIFY;
$modversion['notification']['category'][1]['description'] = _MI_PLZXOO_GLOBAL_NOTIFYDSC;
$modversion['notification']['category'][1]['subscribe_from'] = array('index.php');
$modversion['notification']['category'][2]['name'] = 'category';
$modversion['notification']['category'][2]['title'] = _MI_PLZXOO_CATEGORY_NOTIFY;
$modversion['notification']['category'][2]['description'] = _MI_PLZXOO_CATEGORY_NOTIFYDSC;
$modversion['notification']['category'][2]['subscribe_from'] = array('index.php');
$modversion['notification']['category'][2]['item_name'] = 'cid';
$modversion['notification']['category'][2]['allow_bookmark'] = 1;

$modversion['notification']['category'][3]['name'] = 'question';
$modversion['notification']['category'][3]['title'] = _MI_PLZXOO_QUESTION_NOTIFY;
$modversion['notification']['category'][3]['description'] = _MI_PLZXOO_QUESTION_NOTIFYDSC;
$modversion['notification']['category'][3]['subscribe_from'] = array('index.php');
$modversion['notification']['category'][3]['item_name'] = 'qid';
$modversion['notification']['category'][3]['allow_bookmark'] = 1;

$modversion['notification']['event'][1]['name'] = 'newq';
$modversion['notification']['event'][1]['category'] = 'global';
$modversion['notification']['event'][1]['title'] = _MI_PLZXOO_GLOBAL_NEWQ_NOTIFY;
$modversion['notification']['event'][1]['caption'] = _MI_PLZXOO_GLOBAL_NEWQ_NOTIFYCAP;
$modversion['notification']['event'][1]['description'] = _MI_PLZXOO_GLOBAL_NEWQ_NOTIFYDSC;
$modversion['notification']['event'][1]['mail_template'] = 'global_newq_notify';
$modversion['notification']['event'][1]['mail_subject'] = _MI_PLZXOO_GLOBAL_NEWQ_NOTIFYSBJ;

$modversion['notification']['event'][2]['name'] = 'newq';
$modversion['notification']['event'][2]['category'] = 'category';
$modversion['notification']['event'][2]['title'] = _MI_PLZXOO_CATEGORY_NEWQ_NOTIFY;
$modversion['notification']['event'][2]['caption'] = _MI_PLZXOO_CATEGORY_NEWQ_NOTIFYCAP;
$modversion['notification']['event'][2]['description'] = _MI_PLZXOO_CATEGORY_NEWQ_NOTIFYDSC;
$modversion['notification']['event'][2]['mail_template'] = 'category_newq_notify';
$modversion['notification']['event'][2]['mail_subject'] = _MI_PLZXOO_CATEGORY_NEWQ_NOTIFYSBJ;

$modversion['notification']['event'][3]['name'] = 'newa';
$modversion['notification']['event'][3]['category'] = 'question';
$modversion['notification']['event'][3]['title'] = _MI_PLZXOO_QUESTION_NEWA_NOTIFY;
$modversion['notification']['event'][3]['caption'] = _MI_PLZXOO_QUESTION_NEWA_NOTIFYCAP;
$modversion['notification']['event'][3]['description'] = _MI_PLZXOO_QUESTION_NEWA_NOTIFYDSC;
$modversion['notification']['event'][3]['mail_template'] = 'question_newa_notify';
$modversion['notification']['event'][3]['mail_subject'] = _MI_PLZXOO_QUESTION_NEWA_NOTIFYSBJ;

$modversion['notification']['event'][4]['name'] = 'updt';
$modversion['notification']['event'][4]['category'] = 'question';
$modversion['notification']['event'][4]['title'] = _MI_PLZXOO_QUESTION_UPDT_NOTIFY;
$modversion['notification']['event'][4]['caption'] = _MI_PLZXOO_QUESTION_UPDT_NOTIFYCAP;
$modversion['notification']['event'][4]['description'] = _MI_PLZXOO_QUESTION_UPDT_NOTIFYDSC;
$modversion['notification']['event'][4]['mail_template'] = 'question_updt_notify';
$modversion['notification']['event'][4]['mail_subject'] = _MI_PLZXOO_QUESTION_UPDT_NOTIFYSBJ;

$modversion['notification']['event'][5]['name'] = 'neww';
$modversion['notification']['event'][5]['category'] = 'global';
$modversion['notification']['event'][5]['admin_only'] = 1;
$modversion['notification']['event'][5]['title'] = _MI_PLZXOO_GLOBAL_NEWW_NOTIFY;
$modversion['notification']['event'][5]['caption'] = _MI_PLZXOO_GLOBAL_NEWW_NOTIFYCAP;
$modversion['notification']['event'][5]['description'] = _MI_PLZXOO_GLOBAL_NEWW_NOTIFYDSC;
$modversion['notification']['event'][5]['mail_template'] = 'global_neww_notify';
$modversion['notification']['event'][5]['mail_subject'] = _MI_PLZXOO_GLOBAL_NEWW_NOTIFYSBJ;




// Keep the values of block's options when module is updated (by nobunobu)
if( ! empty( $_POST['fct'] ) && ! empty( $_POST['op'] ) && $_POST['fct'] == 'modulesadmin' && $_POST['op'] == 'update_ok' && $_POST['dirname'] == $modversion['dirname'] ) {
	include dirname( __FILE__ ) . "/include/onupdate.inc.php" ;
}

?>