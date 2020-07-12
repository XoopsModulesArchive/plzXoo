<?php

// <--- BASIC PROPERTY --->
define ('_MI_PLZXOO_NAME','教えて！Xoo');
define ('_MI_PLZXOO_NAME_DESC','plzXoo Module');

// <--- SUBMENU PROPERTY --->
define ( '_MI_PLZXOO_SUBMENU_QUESTION','質問する' );

// <--- ADMENU PROPERTY --->
define('_MI_PLZXOO_ADMENU_1','カテゴリ一覧');
define('_MI_PLZXOO_ADMENU_2','カテゴリ新規登録');
define('_MI_PLZXOO_ADMENU_3','パーミッションの設定');
define('_MI_PLZXOO_ADMENU_MYBLOCKSADMIN','ブロック・アクセス権限');
define('_MI_PLZXOO_ADMENU_MYTPLSADMIN','テンプレート管理');

// <--- BLOCKS PROPERTY --->
define('_MI_PLZXOO_BNAME1','質問一覧');
define('_MI_PLZXOO_BNAME2','回答一覧');

// <--- CONFIGS PROPERTY --->
define ( '_MI_PLZXOO_POINTS','ポイント選択肢' );
define ( '_MI_PLZXOO_POINTS_DESC','選択可能なポイント（半角数字）を|で区切って入力します。<br />制限したいポイントについては、「ポイント:最大回答数」と記述します。<br />0|10:5|20:1 の場合、20ptが１件だけ、10ptが５件まで、0ptは無制限となります。' );
define ( '_MI_PLZXOO_POINTS2POSTS','ポイントを投稿数に反映する' );
define ( '_MI_PLZXOO_POINTS2POSTS_DESC','ポイント確定時に、回答を投稿した人の投稿数が、ポイント分だけ増えます。' );
define ( '_MI_PLZXOO_INDEXODRDEF','質問一覧表示でのデフォルト順' );
define ( '_MI_PLZXOO_INDEXODR_INPUTDSC','登録日降順' );
define ( '_MI_PLZXOO_INDEXODR_MODIFIEDDSC','更新日降順' );
define ( '_MI_PLZXOO_INDEXODR_ST_INPUTDSC','登録日降順（受付中優先）' );
define ( '_MI_PLZXOO_INDEXODR_ST_MODIFIEDDSC','更新日降順（受付中優先）' );
define ( '_MI_PLZXOO_AUTONOTIFYQ','質問者への回答自動通知' ) ;
define ( '_MI_PLZXOO_AUTONOTIFYQ_DESC','質問を登録した人に、自動的に「回答が投稿された時に通知する」オプションが設定される' ) ;
define ( '_MI_PLZXOO_AUTONOTIFYA','回答者への質問変更自動通知' ) ;
define ( '_MI_PLZXOO_AUTONOTIFYA_DESC','回答を登録した人に、自動的に「質問になんらかの動きがあった時に通知する」オプションが設定される' ) ;
define ( '_MI_PLZXOO_LISTVIEWPPG','カテゴリリスト表示における１ページあたりのアイテム数' ) ;
define ( '_MI_PLZXOO_D3COMMENT_DIRNAME','d3forumコメント統合対象となるディレクトリ名' ) ;
define ( '_MI_PLZXOO_D3COMMENT_FORUM_ID','d3forumコメント統合対象となるフォーラム番号' ) ;

// <--- NOTIFICATIONS PROPERTY --->
define( '_MI_PLZXOO_GLOBAL_NOTIFY' , 'モジュール全体' ) ;
define( '_MI_PLZXOO_GLOBAL_NOTIFYDSC' , '教えて!Xooモジュール全体における通知オプション' ) ;
define( '_MI_PLZXOO_CATEGORY_NOTIFY' , 'カテゴリー' ) ;
define( '_MI_PLZXOO_CATEGORY_NOTIFYDSC' , '選択中のカテゴリーに対する通知オプション' ) ;
define( '_MI_PLZXOO_QUESTION_NOTIFY' , '質問' ) ;
define( '_MI_PLZXOO_QUESTION_NOTIFYDSC' , 'この質問に対する通知オプション' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWQ_NOTIFY' , '新規質問' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWQ_NOTIFYCAP' , '新規に質問が登録された時に通知する' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWQ_NOTIFYDSC' , '新規に質問が登録された時に通知する' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWQ_NOTIFYSBJ' , '[{X_SITENAME}] {X_MODULE}: 新規質問' ) ;
define( '_MI_PLZXOO_CATEGORY_NEWQ_NOTIFY' , '新規質問' ) ;
define( '_MI_PLZXOO_CATEGORY_NEWQ_NOTIFYCAP' , 'このカテゴリに新規に質問が登録された時に通知する' ) ;
define( '_MI_PLZXOO_CATEGORY_NEWQ_NOTIFYDSC' , 'このカテゴリに新規に質問が登録された時に通知する' ) ;
define( '_MI_PLZXOO_CATEGORY_NEWQ_NOTIFYSBJ' , '[{X_SITENAME}] {X_MODULE}: カテゴリー内新規質問' ) ;
define( '_MI_PLZXOO_QUESTION_NEWA_NOTIFY' , '新規回答' ) ;
define( '_MI_PLZXOO_QUESTION_NEWA_NOTIFYCAP' , 'この質問に回答が投稿された時に通知する' ) ;
define( '_MI_PLZXOO_QUESTION_NEWA_NOTIFYDSC' , 'この質問に回答が投稿された時に通知する' ) ;
define( '_MI_PLZXOO_QUESTION_NEWA_NOTIFYSBJ' , '[{X_SITENAME}] {X_MODULE}: 新規回答' ) ;
define( '_MI_PLZXOO_QUESTION_UPDT_NOTIFY' , '質問更新' ) ;
define( '_MI_PLZXOO_QUESTION_UPDT_NOTIFYCAP' , 'この質問になんらかの動きがあった時に通知する' ) ;
define( '_MI_PLZXOO_QUESTION_UPDT_NOTIFYDSC' , 'この質問になんらかの動きがあった時に通知する' ) ;
define( '_MI_PLZXOO_QUESTION_UPDT_NOTIFYSBJ' , '[{X_SITENAME}] {X_MODULE}: {CONDITION}' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWW_NOTIFY' , '新規承認待ち' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWW_NOTIFYCAP' , '新規に承認待ちの質問が登録された時に通知する' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWW_NOTIFYDSC' , '新規に承認待ちの質問が登録された時に通知する（管理者専用）' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWW_NOTIFYSBJ' , '[{X_SITENAME}] {X_MODULE}: 新規承認待ち' ) ;



?>