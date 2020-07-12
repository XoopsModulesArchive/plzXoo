[mlimg]
[xlang:en]
Alternative version of plzXoo as a "Q&A module with points".

The original was made by minahito THE GREAT :whippy:

Before installing this module, it is necessary to put exFrame just under XOOPS_ROOT_PATH/modules/

get it from here.
http://prdownloads.sourceforge.jp/exmodules/15194/exFrame-0.89.zip

HOW TO USE:

- extract the archive
- copy all into your system
- don't forget copy class/smarty/plugins/d3forum_comment.php into your system
- install it
- set categories in admin area
- set permissions in admin area
- that's all!


[/xlang:en]
[xlang:ja]

minahitoさん作の教えて!Xooの改変版です。
exFrame 0.89が必要です。

なお、exFrame-0.89には複数のバージョンが存在するようです。
初期の0.89だとPHP5での動作に問題があります。
PHP5の動作が怪しい場合、以下のリンクから落としたものを再度展開してください。

http://prdownloads.sourceforge.jp/exmodules/15194/exFrame-0.89.zip

また、0.99から、d3forumのコメントに対応しました。
この機能を使う・使わないにかかわらず、class/smarty/plugins/d3forum_comment.php のコピーを必ず行ってください。そうしないと、テンプレートコンパイルに失敗します。

変更点は、CHANGELOGをご覧ください。



（以下、minahitoさんのオリジナルドキュメント）
----------------------------------
○インストール方法
　cvs より最新の exFrame モジュールをダウンロードし、アップロードを行ってください。

http://cvs.sourceforge.jp/cgi-bin/viewcvs.cgi/exmodules/exFrame/exFrame.tar.gz?tarball=1

　次に、「教えて！Ｘｏｏ」をインストールしてください。

　インストールが終わったら、管理画面よりモジュール内パーミッションの指定と、
　カテゴリーの作成を行ってください。

　カテゴリーの親子機能は、今のところ特に意味を持ちません。

　ポイントをどう扱うかも含めて、今後の開発にご期待ください。
----------------------------------
※ GIJ註） カテゴリーの親子関係は実装してます。また、ここに書かれたCVSのURIからは現在落とせないようです。

インストール後の一般的なパーミッション例を挙げます。

●サイト管理者
（すべてをチェック）

●登録ユーザ
・質問を投函できる
・回答を投函できる
・詳細を閲覧できる
・自分の質問を再編集できる
・自分の回答を再編集できる
・自分の質問を削除できる
・自分の回答を削除できる
・自分の投稿に寄せられた回答を削除できる
（以上にチェック）

●ゲスト
・詳細を閲覧できる
（これだけをチェック）


なお、教えて!XOOでは、ゲストは質問も回答もできません。
そのため、「詳細を閲覧できる」以外の権限を与えても無視されます。


0.94以降、公開側でのXoopsFormの利用を全面的にやめています。

質問や回答の本文入力に、従来のリッチフォームを利用したい場合は、以下の２つのテンプレートを編集してください。（そのサンプルは、コメントアウトした状態で用意してあります）
plzxoo_question_edit.html
plzxoo_answer_edit.html

これを利用する場合、先に、Smartyプラグインを用意しておく必要があります。
このアーカイブのclass/extras/function.xoopsdhtmltarea.php を、class/smarty/plugins にコピーしてください。このプラグインをすでに利用中の場合は、この作業は特に必要ありません。

[/xlang:ja]
