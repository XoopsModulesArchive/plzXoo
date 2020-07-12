<?php

// <--- LANG PROPERTY --->
define ( '_MD_PLZXOO_LANG_CATEGORY','Category' );
define ( '_MD_PLZXOO_LANG_TITLE','Title' );
define ( '_MD_PLZXOO_LANG_BODY','Contents of the question' );
define ( '_MD_PLZXOO_LANG_PRIORITY','Priority' );
define ( '_MD_PLZXOO_LANG_CONTROL','Control' );
define ( '_MD_PLZXOO_LANG_SUBMIT','Submit' );
define ( '_MD_PLZXOO_LANG_STATUS','Status' );
define ( '_MD_PLZXOO_LANG_STATUS_OPEN','Open' );
define ( '_MD_PLZXOO_LANG_STATUS_CLOSE','Closed' );
define ( '_MD_PLZXOO_LANG_STATUS_DEACTIVE','Deactivated' );
define ( '_MD_PLZXOO_LANG_STATUS_WAITING','Waiting approval' );
define ( '_MD_PLZXOO_LANG_ANSWER_BODY','Contents of the answer' );
define ( '_MD_PLZXOO_LANG_QUESTION','question' );
define ( '_MD_PLZXOO_LANG_ANSWER','answer' );
define ( '_MD_PLZXOO_LANG_QUESTION_POSTER','questioner' );
define ( '_MD_PLZXOO_LANG_ANSWER_POSTER','answerer' );
define ( '_MD_PLZXOO_LANG_POINT','point' );
define ( '_MD_PLZXOO_LANG_CONFIRM','confirm' );
define ( '_MD_PLZXOO_LANG_EXECUTE','execute' );
define ( '_MD_PLZXOO_LANG_INPUT_DATE','date' );
define ( '_MD_PLZXOO_LANG_MODIFIED_DATE','modified' );
define ( '_MD_PLZXOO_LANG_POST_QUESTION','post a new question' );
define ( '_MD_PLZXOO_LANG_POST_QUESTION_CID','ask in this category' );
define ( '_MD_PLZXOO_LANG_PLZXOO','plzXoo' );
define ( '_MD_PLZXOO_LANG_POINT_TO_THIS','Add point to the answer' );
define ( '_MD_PLZXOO_LANG_NEW_RESPONSE','Add a thank to the answer' );
define ( '_MD_PLZXOO_LANG_EDIT_RESPONSE','Edit this thank' );
define ( '_MD_PLZXOO_LANG_NEW_COMMENT','Add a comment to the answer' );
define ( '_MD_PLZXOO_LANG_RESPONSE','THANK' );
define ( '_MD_PLZXOO_LANG_COMMENT','COMMENT' );
define ( '_MD_PLZXOO_LANG_RESET','RESET' );
define ( '_MD_PLZXOO_LANG_GO_BACK','GO BACK' );
define ( '_MD_PLZXOO_LANG_SUBJECT','Subject' );
define ( '_MD_PLZXOO_LANG_EDIT','EDIT' );
define ( '_MD_PLZXOO_LANG_DELETE','DELETE' );
define ( '_MD_PLZXOO_LANG_DELETE_CONFIRM','DELETE CONFIRM' );
define ( '_MD_PLZXOO_LANG_QID','ID of the question' );
define ( '_MD_PLZXOO_LANG_SIZE','size' );
define ( '_MD_PLZXOO_LANG_AID','ID of the answer' );
define ( '_MD_PLZXOO_LANG_LABEL_EXTRACTION','Search:' );
define ( '_MD_PLZXOO_LANG_GO_EXTRACTION','Go' );
define ( '_MD_PLZXOO_LANG_RESULT_EXTRACTION','Result' );
define ( '_MD_PLZXOO_LANG_TITLE_NEW_QUESTION','New Question' );
define ( '_MD_PLZXOO_LANG_TITLE_EDIT_QUESTION','Edit Question' );
define ( '_MD_PLZXOO_LANG_TITLE_NEW_ANSWER','New Answer' );
define ( '_MD_PLZXOO_LANG_TITLE_EDIT_ANSWER','Edit Answer' );
define ( '_MD_PLZXOO_LANG_NOTIFY_NEWQ','New question' );
define ( '_MD_PLZXOO_LANG_NOTIFY_NEWW','New waiting' );
define ( '_MD_PLZXOO_LANG_NOTIFY_MODQ','Modified question' );
define ( '_MD_PLZXOO_LANG_NOTIFY_NEWA','New answer' );
define ( '_MD_PLZXOO_LANG_NOTIFY_MODA','Modified question' );
define ( '_MD_PLZXOO_LANG_NOTIFY_MODC','New or Modified thanks' );
define ( '_MD_PLZXOO_LANG_NOTIFY_CLOSE','Closed' );

// <--- BREAD CRUMB --->
define ( '_MD_PLZXOO_BRCR_HOME','HOME' );
define ( '_MD_PLZXOO_BRCR_CATEGORY','Category' );

// <--- MESSAGE PROPERTY --->
define ( '_MD_PLZXOO_MESSAGE_CLOSE_THIS_QUESTION','Close the question' );
define ( '_MD_PLZXOO_MESSAGE_ANSWER_THIS_QUESTION','Post an answer' );
define ( '_MD_PLZXOO_MESSAGE_SUCCESS','DB updated successfully' );
define ( '_MD_PLZXOO_MESSAGE_POSTQ_AUTO_APPROVED','Your question is registered successfully' );
define ( '_MD_PLZXOO_MESSAGE_POSTQ_NEED_APPROVE','Your question will be released after approval in this site' );
define ( '_MD_PLZXOO_MESSAGE_FAIL','Failed' );
define ( '_MD_PLZXOO_MESSAGE_CLOSE_QUESTION_CONFIRM','Are you ok closing the question' );
define ( '_MD_PLZXOO_MESSAGE_IS_POINT_OK','Are you ok of the points? You cannot edit points of the answers after this operation.' );

// <--- ERROR PROPERTY --->
define ( '_MD_PLZXOO_ERROR_TICKET','Ticket Error' );
define ( '_MD_PLZXOO_ERROR_QUESTION_NOT_EXISTS','Invalid qid' );
define ( '_MD_PLZXOO_ERROR_QUESTION_CLOSED','Closed question' );
define ( '_MD_PLZXOO_ERROR_PERMISSION','Permission error' );
define ( '_MD_PLZXOO_ERROR_ANSWER_NOT_EXISTS','Invalid aid' );
define ( '_MD_PLZXOO_ERROR_POINT_RULE','Point rule error' );
define ( '_MD_PLZXOO_ERROR_CID_INJURY','cid injury' );
define ( '_MD_PLZXOO_ERROR_SUBJECT_REQUIRED','There are no subject' );
define ( '_MD_PLZXOO_ERROR_SUBJECT_SIZEOVER','Too long subject' );
define ( '_MD_PLZXOO_ERROR_BODY_REQUIRED','There are no contents' );
define ( '_MD_PLZXOO_ERROR_PRIORITY_RANGEOVER','Priority range over' );
define ( '_MD_PLZXOO_ERROR_STATUS_RANGEOVER','Status range over' );

// <--- FORMAT PROPERTY --->
define ( '_MD_PLZXOO_FORMAT_ANSWERS_COUNT','%d answers' );
define ( '_MD_PLZXOO_FORMAT_POINT_OF_ANSWER_NOLIMIT','%d pts (no limit)' );
define ( '_MD_PLZXOO_FORMAT_POINT_OF_ANSWER','%d pts (max %d items)' );

define ( '_MD_PLZXOO_FORMAT_POINT_RESULT_GENERAL','%d pts.' );
define ( '_MD_PLZXOO_FORMAT_POINT_RESULT_RANK1','%d pts! Superb!' );
define ( '_MD_PLZXOO_FORMAT_POINT_RESULT_RANK2','%d pts. Useful' );

?>