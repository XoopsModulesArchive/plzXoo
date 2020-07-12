<?php


// <--- Tradu��o: Miraldo Antoninho Ohse (leco1) --->
// <--- mail: m_ohse@hotmail.com --->

// <--- BASIC PROPERTY --->
define ('_MI_PLZXOO_NAME','FAQ');
define ('_MI_PLZXOO_NAME_DESC','M�dulo FAQ');

// <--- SUBMENU PROPERTY --->
define ( '_MI_PLZXOO_SUBMENU_QUESTION','Postar uma nova pergunta' );

// <--- ADMENU PROPERTY --->
define('_MI_PLZXOO_ADMENU_1','Categorias');
define('_MI_PLZXOO_ADMENU_2','Criar uma nova categoria');
define('_MI_PLZXOO_ADMENU_3','Permiss�es');
define('_MI_PLZXOO_ADMENU_MYBLOCKSADMIN','Blocos');
define('_MI_PLZXOO_ADMENU_MYTPLSADMIN','Modelos');

// <--- BLOCKS PROPERTY --->
define('_MI_PLZXOO_BNAME1','Lista de Perguntas');
define('_MI_PLZXOO_BNAME2','Lista de Respostas');

// <--- CONFIGS PROPERTY --->
define ( '_MI_PLZXOO_POINTS','Pontos' );
define ( '_MI_PLZXOO_POINTS_DESC','Configure os pontos separados com "|".<br />":" significa o n�mero m�ximo de itens do ponto<br />eg) 0|10:5|20:1 significa que 20 pontos podem ser adicionados em apenas uma resposta, 10pontos podem ser adicionados no m�ximo em 5 respostas. As demais respostas ser�o 0 pontos' );
define ( '_MI_PLZXOO_POINTS2POSTS','Adicionar pontos do FAQ nos posts dos usu�rios' );
define ( '_MI_PLZXOO_POINTS2POSTS_DESC','' );
define ( '_MI_PLZXOO_INDEXODRDEF','Ordena��o padr�o na lista vista' );
define ( '_MI_PLZXOO_INDEXODR_INPUTDSC','adicionar data descendente' );
define ( '_MI_PLZXOO_INDEXODR_MODIFIEDDSC','modificar data descendente' );
define ( '_MI_PLZXOO_INDEXODR_ST_INPUTDSC','adicionar data descendente (Ativos s�o superiores)' );
define ( '_MI_PLZXOO_INDEXODR_ST_MODIFIEDDSC','modificar data descendente (Ativos s�o superiores)' );
define ( '_MI_PLZXOO_AUTONOTIFYQ','Auto notificar quem pergunta' ) ;
define ( '_MI_PLZXOO_AUTONOTIFYQ_DESC','Uma notifica��o de "Nova Resposta" ser� nviada quando algu�m postar uma Pergunta' ) ;
define ( '_MI_PLZXOO_AUTONOTIFYA','Auto notificar quem responde' ) ;
define ( '_MI_PLZXOO_AUTONOTIFYA_DESC','Uma notifica��o de "Pergunta modificada" ser� enviada quando algu�m postar uma pergunta' ) ;
define ( '_MI_PLZXOO_LISTVIEWPPG','Perguntas por p�gina nas lista de vistas' ) ;
define ( '_MI_PLZXOO_D3COMMENT_DIRNAME','nome do diret�rio do d3forum para integra��o dos coment�rios' ) ;
define ( '_MI_PLZXOO_D3COMMENT_FORUM_ID','forum_id do d3forum para integra��o dos coment�rios' ) ;

// <--- NOTIFICATIONS PROPERTY --->
define( '_MI_PLZXOO_GLOBAL_NOTIFY' , 'Global' ) ;
define( '_MI_PLZXOO_GLOBAL_NOTIFYDSC' , 'Tudo sobre este m�dulo' ) ;
define( '_MI_PLZXOO_CATEGORY_NOTIFY' , 'Categoria ' ) ;
define( '_MI_PLZXOO_CATEGORY_NOTIFYDSC' , 'A cerca da categoria selecionada' ) ;
define( '_MI_PLZXOO_QUESTION_NOTIFY' , 'Pergunta' ) ;
define( '_MI_PLZXOO_QUESTION_NOTIFYDSC' , 'A cerca da pergunta selecionada' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWQ_NOTIFY' , 'Novas Perguntas' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWQ_NOTIFYCAP' , 'Notificar quando uma pergunta for postada ou modificada' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWQ_NOTIFYDSC' , 'Notificar quando uma pergunta for postada ou modificada' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWQ_NOTIFYSBJ' , '[{X_SITENAME}] {X_MODULE}: Pergunta atualizada' ) ;
define( '_MI_PLZXOO_CATEGORY_NEWQ_NOTIFY' , 'Nova Pergunta' ) ;
define( '_MI_PLZXOO_CATEGORY_NEWQ_NOTIFYCAP' , 'Notificar quando uma pergunta nesta categoria for postada ou modificada' ) ;
define( '_MI_PLZXOO_CATEGORY_NEWQ_NOTIFYDSC' , 'Notificar quando uma pergunta nesta categoria for postada ou modificada' ) ;
define( '_MI_PLZXOO_CATEGORY_NEWQ_NOTIFYSBJ' , '[{X_SITENAME}] {X_MODULE}: Categoria: Pergunta atualizada' ) ;
define( '_MI_PLZXOO_QUESTION_NEWA_NOTIFY' , 'Nova Resposta' ) ;
define( '_MI_PLZXOO_QUESTION_NEWA_NOTIFYCAP' , 'Notificar quando uma resposta para esta pergunta for atualizada ou modificada' ) ;
define( '_MI_PLZXOO_QUESTION_NEWA_NOTIFYDSC' , 'Notificar quando uma resposta para esta pergunta for atualizada ou modificada' ) ;
define( '_MI_PLZXOO_QUESTION_NEWA_NOTIFYSBJ' , '[{X_SITENAME}] {X_MODULE}: Resposta atualizada' ) ;
define( '_MI_PLZXOO_QUESTION_UPDT_NOTIFY' , 'Modificar Pergunta' ) ;
define( '_MI_PLZXOO_QUESTION_UPDT_NOTIFYCAP' , 'Notificar algum tipo de modifica��o desta pergunta' ) ;
define( '_MI_PLZXOO_QUESTION_UPDT_NOTIFYDSC' , 'Notificar algum tipo de modifica��o desta pergunta' ) ;
define( '_MI_PLZXOO_QUESTION_UPDT_NOTIFYSBJ' , '[{X_SITENAME}] {X_MODULE}: {CONDITION}' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWW_NOTIFY' , 'Nova aguardando' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWW_NOTIFYCAP' , 'Notifificar quando uma pergunta estiver aguardando para ser postada' );
define( '_MI_PLZXOO_GLOBAL_NEWW_NOTIFYDSC' , 'Notificar quando uma pergunta estiver aguardando para se postada (somente ao administrador)' ) ;
define( '_MI_PLZXOO_GLOBAL_NEWW_NOTIFYSBJ' , '[{X_SITENAME}] {X_MODULE}: Pergunta enviada' ) ;



?>
