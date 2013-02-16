<?php return
[

'demo:login/singin' => 'Sign In',
'demo:login/signout' => 'Sign Out',

'demo:login/signed-in-as' => function ($in)
{
	return "Signed in as {$in['name']}.";
},

'demo:login/username' => 'Username or Email',
'demo:login/password' => 'Password',
'demo:login/submit' => 'Sign In',
'demo:login/rememberme' => 'Remember Me',

];
