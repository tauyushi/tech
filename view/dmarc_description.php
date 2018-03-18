<!DOCTYPE html>
<html>
<head>
<title>Tech Crow[テッククロウ] nslookup DNSレコード取得</title>
<meta name="description" contents="nslookupコマンドと同等の処理をwebで行い、DNSレコードを全てまたはタイプ(type)別に取得して一覧を表示します。" />
<?php include_once("../base/header.html");?>
</head>
<script type="text/javascript" src="../js/check_dns.js"></script>
<body>
<?php include_once("../base/top.html");?>
<div id="page_content" class="container">
	<div class="row">
		<div class="col-sm-3">
			<?php include_once("../base/navbar.html");?>
		</div>
		<div class="col-sm-9">
<div><h2>DMARC</h2></div>
<div class="page-header"><h3>DMARCとは</h3></div>
<div>メールの送受信において送信者側が自身のドメインをなりすましから防止するための仕組みです。DMARCは“Domain-based Message Authentication, Reporting & Conformance”の略で、機能としてレポートと適合検査があります。<br />
そして広く利用されているDKIMとSPFのプロトコルに基づいています。そのためDMARC導入にあたっては受信者サイドはDKIMとSPF両方に対応している必要があります。
</div>

<div class="page-header"><h3>DMARCの仕組み</h3></div>
<div>まず受信サーバがメールを受信するとSPFとDKIMの判定を行います。そしてそれぞれの判定結果と認証識別子の関係性が正しいか検証します。送信者のDNSに問い合わせ、DMARCレコードのポリシーに従い、メールを通過、拒否、隔離します。<br />
その後、DMARCの処理の情報をレポートとして集計します。DMARCレコードにある送信間隔(ri)に基づき集計レポートとして送信サイドが指定した宛先へメールを送ります。DMARCがfailだったとき、別途Failureレポートをその都度送ります。
</div>

<div class="page-header"><h3>DMARCの判定方法</h3></div>
<div>DMARCにはAlignment(アラインメント)という概念があります。このAlignmentにINしているかどうかでpassかfailかを決めます。また認証識別子という定義があり、SPFではMAILFROMドメイン、DKIMではd=ドメインのことです。<br />
AlignmentにINしているかどうかはheader fromにあるドメインが上記認証識別子と一致しているかで決まります。基本的にはSPF、DKIMどちらかがINしていればpass、両方INしていなければfailになります。
</div>

<div class="page-header"><h3>DMARCレコード</h3></div>
<div>送信者のドメイン管理者がDNSに登録するもので、これに基づいて受信側が処理を決めます。</br>
(例)_dmarc.aaa.com IN  A  "v=DMARC1;p=none;ruf=mailto:test@aaa.com"
他にレコードには下記があります。<br />
    <table class="table table-striped">
        <thread>
        <tr>
        <td class="col-sm-1"><strong>タグ</strong></td>
        <td><strong>説明</strong></td>
        <td><strong>例</strong></td>
        </tr>
        </thread>
        <tbody>
        <tr>
        <td>v(必須)</td>
        <td>DMARCのバージョンです。今はDMARC1のみです。</td>
        <td>v=DMARC1</td>
        </tr>
        <tr>
        <td>p(必須)</td>
        <td>ポリシーです。quarantine(隔離),reject(拒否),none(何もしない)があります。デフォルトはquarantineです。</td>
        <td>p=quarantine</td>
        </tr>
        <tr>
        <td>sp</td>
        <td>サブドメインのポリシーを決めます。quarantine(隔離),reject(拒否),none(何もしない)があります。デフォルトはquarantineです。</td>
        <td>p=quarantine</td>
        </tr>
        <tr>
        <td>pct</td>
        <td>ポリシーを適用する割合を決めます。デフォルトは100です。</td>
        <td>p=50</td>
        </tr>
        <tr>
        <td>rua</td>
        <td>集計レポートの送信者先メールアドレスです。複数指定する場合は,でつなぎ!の後ろにサイズを指定できます。</td>
        <td>rua=mailto:sample@aaa.com,sample2@aaa.com:10M</td>
        </tr>
        <tr>
        <td>ri</td>
        <td>集計レポートの送信間隔を指定します。デフォルトは86400秒です。</td>
        <td>ri=86400</td>
        </tr>
        <tr>
        <td>rf</td>
        <td>Failureレポートのフォーマットを指定します。afrfとiodefがあります。</td>
        <td>rf=afrf</td>
        </tr>
        <tr>
        <td>ruf</td>
        <td>Failureレポートの送信者先メールアドレスです。複数指定する場合は,でつなぎ:の後ろにサイズを指定できます。</td>
        <td>ruf=mailto:sample@aaa.com,sample2@aaa.com:10M</td>
        </tr>
        <tr>
        <td>fo</td>
        <td>Failureレポートのオプションです。0は両方failのとき、レポートを送る。1はどちらかがfailのとき、dはDKIMのみfailのとき、sはSPFのみfailのときです。デフォルトは0です。</td>
        <td>fo=0</td>
        </tr>
        <tr>
        <td>aspf</td>
        <td>SPFのAlignmentにサブドメインも含めるかどうかを指定します。r(relax)は含める、s(strict)は含めません。デフォルトはrです。</td>
        <td>aspf=r</td>
        </tr>
        <tr>
        <td>adkim</td>
        <td>DKIMのAlignmentにサブドメインも含めるかどうかを指定します。r(relax)は含める、s(strict)は含めません。デフォルトはrです。</td>
        <td>adkim=r</td>
        </tr>
        </tbody>
    </table>
</div>

<div class="page-header"><h3>DMARC集計レポート</h3></div>
<div>
    DMARC処理の結果をレポートとして集計し、DNSレコードのruaへ送信します。<br />
    <a href="http://dmarc.crowded-city.com/view/report_parser.php">[こちら]</a>でレポートを解析して表示できます。
</div>

<div class="page-header"><h3>DMARCFailureレポート</h3></div>
<div>DMRACの判定結果がfailだったとき、即レポートが送られてきます。集計レポートとは別でフォーマットはafrfまたはiodefになります。
</div>

<div class="page-header"><h3>DMARC設定 送信側</h3></div>
<div>
	<p>送信側の設定は簡単です。送信側のドメインのDNSにTXTレコードを記述するだけです。</p>
	<p>_dmarc.sample.co.jp&nbsp;&nbsp;&nbsp;IN&nbsp;&nbsp;&nbsp;TXT&nbsp;&nbsp;&nbsp;"v=DMARC1;p=reject;..."</p>
	DMARCはSPFとDKIMの認証情報を利用するので、送信側はSPFかDKIMまたは両方に対応しておく必要があります。<br />
	ここでは割愛しますが、これらについても同様にDNSに登録しておいてください。<br /><br />
	DMARCレコードの作成は<a href="http://dmarc.crowded-city.com/view/create_record.php">[こちら]</a>のページできます。
</div>

<div class="page-header"><h3>DMARC設定 受信側</h3></div>
<div>
	受信側ではSPF、DKIM、DMARC全て実装しなければなりません。実装にはOpenDKIM、OpenDMARCを使うと比較的楽にできます。<br />
	OpenDMARCはmilterとして動作するためメール機能としてsendmailまたはpostfixが必要になります。また認証結果をRDBに保存するためMySQL等が必要になります。<br />
	OpenDMARC以外にもライブラリはありますが、DMARCレコードの取得、認証処理、レポートの作成まで全てやってくれるので環境が問題ないならこれを使うのがいいと思います。<br />
</div>

<div class="page-header"><h3>DMARC ポリシー(policy)</h3></div>
<div>
	認証後、結果がdmarc=failだったときquarantine(隔離)、reject(拒否)、none(何もしない)の3つのポリシーから選択します。<br />
	これはDMARCレコードのpタグに相当します。pタグに設定されたポリシーに基づき受信側はアクションを決定します。<br /><br />
	また、DMARCにはサブポリシー(spタグ)というものがあります。これはサブドメインにもポリシーを適用するときに使います。<br />
	例えばp="none";sp="reject";とすれば、サブドメインから送信したメールだけDMARCがfailしたら拒否するという動作になります。<br />
	では、.co.jpや.comといったDNSにDMARCレコードのspタグを登録すれば、その子ドメインはサブポリシーが適用されるかというと、これはされません。<br />
	.co.jpや.comはトップレベルドメイン(TLD)と言われ受信側はDMARCレコードを取得する際これらを見ないよう実装しなければなりません。<br />
	OpenDMARCではTLDの一覧を登録しておけば後は勝手に上手くやってくれます。
</div>

<div class="page-header"><h3>関連資料</h3></div>
<div><a href="https://datatracker.ietf.org/doc/rfc7489/">DMARC RFC 7489</a></div>
<div><a href="https://dmarc.org//draft-dmarc-base-00-01.html#iana_dmarc_tagshttps://dmarc.org//draft-dmarc-base-00-01.html#iana_dmarc_tags" target="_blank">
		  dmarcドラフト(ちょっと古い)</a>
</div>
<div><a href="https://dmarc.org/">DMARC.org</a></div>
		</div>
	</div>
</div>
<?php include_once("../base/footer.html");?>
</body>
</html>
