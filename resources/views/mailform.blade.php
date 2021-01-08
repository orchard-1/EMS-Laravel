
<form action="/sendmail" method="POST">
@csrf
Receiver<input type="email" name="email">
<input type="submit" value="send">
</form>
