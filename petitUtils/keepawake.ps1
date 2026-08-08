

while(1){
write-host "ctrl $(get-date -format 'HH:mm:ss')";
$w=new-object -ComObject wscript.shell;
$w.sendkeys("^");
start-sleep -Seconds 300;

}