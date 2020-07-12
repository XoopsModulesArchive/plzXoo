<?php

// <--- BASIC PROPERTY --->
define ('_MI_PLZXOO_NAME','plzXoo');
define ('_MI_PLZXOO_NAME_DESC','plzXoo Module');

// <--- SUBMENU PROPERTY --->
define ( '_MI_PLZXOO_SUBMENU_QUESTION','Post a new question' );

// <--- ADMENU PROPERTY --->
define('_MI_PLZXOO_ADMENU_1','Categories');
define('_MI_PLZXOO_ADMENU_2','Create a new category');
define('_MI_PLZXOO_ADMENU_3','Permissions');
define('_MI_PLZXOO_ADMENU_MYBLOCKSADMIN','Blocks');
define('_MI_PLZXOO_ADMENU_MYTPLSADMIN','Templates');

// <--- BLOCKS PROPERTY --->
define('_MI_PLZXOO_BNAME1','Questions List');
define('_MI_PLZXOO_BNAME2','Answers List');

// <--- CONFIGS PROPERTY --->
define ( '_MI_PLZXOO_POINTS','Points' );
define ( '_MI_PLZXOO_POINTS_DESC','Set points separated with "|".<br />":" means maximum items of the point<br />eg) 0|10:5|20:1 means that 20pts can be added into just an answer, 10pts can be added into max 5 answers. rest of answers will be 0pt' );
define ( '_MI_PLZXOO_POINTS2POSTS','Add plzXoo\'s points into users\'s posts' );
define ( '_MI_PLZXOO_POINTS2POSTS_DESC','' );
define ( '_MI_PLZXOO_INDEXODRDEF','Default order in list view' );
define ( '_MI_PLZXOO_INDEXODR_INPUTDSC','added date desc' );
define ( '_MI_PLZXOO_INDEXODR_MODIFIEDDSC','modified date desc' );
define ( '_MI_PLZXOO_INDEXODR_ST_INPUTDSC','added date desc (Actives are upper)' );
define ( '_MI_PLZXOO_INDEXODR_ST_MODIFIEDDSC','modified date desc¡ÊActives are upper¡Ë' );
define ( '_MI_PLZXOO_AUTONOTIFYQ','Auto notify for questioner' ) ;
define ( '_MI_PLZXOO_AUTONOTIFYQ_DESC','A notification of "New answer" will be set when he/she post a question' ) ;
define ( '_MI_PLZXOO_AUTONOTIFYA','Auto notify for answerer' ) ;
define ( '_MI_PLZXOO_AUTONOTIFYA_DESC','A notification of "Modified question" will be set when he/she post a question' ) ;
define ( '_MI_PLZXOO_LISTVIEWPPG','Questions per page in list views' ) ;
define ( '_MI_PLZXOO_D3COMMENT_DIRNAME','dirname of d3forum for comment integration' ) ;
define ( '_MI_PLZXOO_D3COMMENT_FORUM_ID','forum_id of d3forum for comment integration' ) ;

// <--- NOTIFICATIONS PROPERTY --->
define( '_MI_PLZXOO_GLOBAL_NOTIFY' , 'Global' ) ;
define( '_MI_PLZXOO_GLOBAL_NOTIFYDSC' , 'About whole of this module' ) ;
define( '_MI_PLZXOO_CATEGORY_NOTIFY' , 'Category' ) ;
define( '_MI_PLZXOO_CATEGORY_NOTIFYDSC' , 'About the category selected' ) ;
define( '_MI_PLZXOO_QUESTION_NOTIFY' , 'Question' ) ;
define( '_MI_PLZXOO_QUESTION_NOTIFYDSC' , 'About the question selected' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWQ_NOTIFY' , 'New Question' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWQ_NOTIFYCAP' , 'Notify a question is posted or modified' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWQ_NOTIFYDSC' , 'Notify a question is posted or modified' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWQ_NOTIFYSBJ' , '[{X_SITENAME}] {X_MODULE}: Updated question' ) ;
define( '_MI_PLZXOO_CATEGORY_NEWQ_NOTIFY' , 'New Question' ) ;
define( '_MI_PLZXOO_CATEGORY_NEWQ_NOTIFYCAP' , 'Notify a question in this category is posted or modified' ) ;
define( '_MI_PLZXOO_CATEGORY_NEWQ_NOTIFYDSC' , 'Notify a question in this category is posted or modified' ) ;
define( '_MI_PLZXOO_CATEGORY_NEWQ_NOTIFYSBJ' , '[{X_SITENAME}] {X_MODULE}: Category: Updated question' ) ;
define( '_MI_PLZXOO_QUESTION_NEWA_NOTIFY' , 'New Answer' ) ;
define( '_MI_PLZXOO_QUESTION_NEWA_NOTIFYCAP' , 'Notify an answer for this question is posted or modified' ) ;
define( '_MI_PLZXOO_QUESTION_NEWA_NOTIFYDSC' , 'Notify an answer for this question is posted or modified' ) ;
define( '_MI_PLZXOO_QUESTION_NEWA_NOTIFYSBJ' , '[{X_SITENAME}] {X_MODULE}: Updated answer' ) ;
define( '_MI_PLZXOO_QUESTION_UPDT_NOTIFY' , 'Modified Question' ) ;
define( '_MI_PLZXOO_QUESTION_UPDT_NOTIFYCAP' , 'Notify some kind of modifications about the question' ) ;
define( '_MI_PLZXOO_QUESTION_UPDT_NOTIFYDSC' , 'Notify some kind of modifications about the question' ) ;
define( '_MI_PLZXOO_QUESTION_UPDT_NOTIFYSBJ' , '[{X_SITENAME}] {X_MODULE}: {CONDITION}' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWW_NOTIFY' , 'New Waiting' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWW_NOTIFYCAP' , 'Notify a waiting question is posted ' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWW_NOTIFYDSC' , 'Notify a waiting question is posted (for admin only)' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWW_NOTIFYSBJ' , '[{X_SITENAME}] {X_MODULE}: Submitted question' ) ;



?>