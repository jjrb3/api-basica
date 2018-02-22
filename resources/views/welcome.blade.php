<form method="post" action="api/user">
    <input type="text" name="name" value="Jeremy">
    <input type="text" name="email" value="JJrb6@hormail.com">
    <input type="password" name="password" value="1234567890">
    <button type="submit">Enviar</button>
</form>
<br>
<br>
<form method="get" action="api/login">
    <input type="text" name="email" value="JJrb6@hormail.com">
    <input type="password" name="password" value="1234567890">
    <button type="submit">Enviar</button>
</form>
<br>
<br>
<form method="get" action="api/parents">
    <input type="hidden" name="token" value="effcbb66650a39d8277e7e6c86f14b19e8749675008720a41fa7d746f3dd1f12878e295ddb5359132fbbdca979492205ad7c">
    <input type="hidden" name="method" value="GetParents">
    <button type="submit">Consultar Padres</button>
</form>
<br>
<br>
<form method="get" action="api/parents">
    <input type="hidden" name="token" value="effcbb66650a39d8277e7e6c86f14b19e8749675008720a41fa7d746f3dd1f12878e295ddb5359132fbbdca979492205ad7c">
    <input type="hidden" name="method" value="GetChildren">
    <button type="submit">Consultar Hijos</button>
</form>
