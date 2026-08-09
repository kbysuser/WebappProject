<script>
    function onChallenge(){
        answeredPass =prompt("パスワードを入力してください")
        if(answeredPass=="\x31\x32\x33\x34"){
            alert(decodeURIComponent("\x25\x45\x33\x25\x38\x31\x25\x38\x41\x25\x45\x33\x25\x38\x32\x25\x38\x31\x25\x45\x33\x25\x38\x31\x25\x41\x37\x25\x45\x33\x25\x38\x31\x25\x41\x38\x25\x45\x33\x25\x38\x31\x25\x38\x36\x25\x45\x33\x25\x38\x31\x25\x39\x34\x25\x45\x33\x25\x38\x31\x25\x39\x36\x25\x45\x33\x25\x38\x31\x25\x38\x34\x25\x45\x33\x25\x38\x31\x25\x42\x45\x25\x45\x33\x25\x38\x31\x25\x39\x39\x25\x45\x33\x25\x38\x30\x25\x38\x32\x66\x6c\x61\x67\x25\x37\x42\x63\x68\x61\x6c\x6c\x65\x6e\x67\x65\x25\x35\x46\x63\x6c\x65\x61\x72\x65\x64\x25\x37\x44"))
        }else{
            alert("パスワードが違うようです🤮")
        }
    }

    
    // function onClickDebug(){
    //     answeredPass =prompt("パスワードを入力してください")
    //     if(answeredPass=="0000"){
    //         location.href="/debugroom/index.php"
    //     }else{
    //         alert("パスワードが違うようです🤮")
    //     }
    // }

    document.addEventListener("keydown",(evt)=>{
        if (evt.ctrlKey && evt.shiftKey && (evt.key=="D" || evt.key=="d")) {
            evt.preventDefault();
            location.href="/debugroom/index.php"
        }
    })

</script>
<nav>
    <ul>
        <!-- ↓href="/quiz/index.php" だが、バグるので遷移しないようにした -->
        <li><a  onclick="alert(`ごめんなさい😭未実装です`);">問題を解く</a></li>
        <li><a href="/survey/index.php">アンケート</a></li>
        <li style="display:none;"><a onclick="onClickDebug()" >デバッグ・集計</a></li>
        <li><a  onclick="onChallenge()">チャレンジ</a></li>

    </ul>
</nav>