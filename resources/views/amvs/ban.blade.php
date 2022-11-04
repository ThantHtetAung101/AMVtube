@auth
    @if (Auth::user()->suspend != 1)
        <script>window.location = "/amvtube";</script>
@endif
<html>
<head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<style>
    * {
  box-sizing: border-box;
}

body {
  font-family: sans-serif;
  /* background-image: url("bgimage.jpg"); */
  background-color: background-color: rgb(19, 19, 19);
  repeat: no-repeat;

}

.txt1 {color: #0070BB;
	font-size: 40px;
  font-weight: 800;
	text-align: center;
	margin-top: 20px; }

.txt2 {color: #c8c6ce;
	font-size: 18px;
	text-align: center;
	margin-top: 20px; }

.txt3 {color: #c8c6ce;
	font-size: 18px;
	text-align: center;
	margin-top: 20px; }

.logo {
text-align: center;
  margin-top: 10px; }

.button {
    border: 2px solid none;
    padding: 10px 40px;
    background: #0070BB;
   color: white;
	text-align: center;
	width: 300px;
    border-radius: 25px;
	margin: 20px auto;
	transition: all 0.3s ease 0s;
	-webkit-box-shadow: 0px 11px 20px -8px rgba(0,112,187,1);
	-moz-box-shadow: 0px 11px 20px -8px rgba(0,112,187,1);
	box-shadow: 0px 11px 20px -8px rgba(0,112,187,1);}

.button:hover {
    border: 2px solid none;
    padding: 10px 40px;
    background: #0070BB;
  color: white;
	text-align: center;
	width: 300px;
    border-radius: 25px;
    margin: 5px auto;
	transition: all 0.3s ease 0s;
	-webkit-box-shadow: 0px 19px 34px -8px rgba(0,112,187,1);
	-moz-box-shadow: 0px 19px 34px -8px rgba(0,112,187,1);
	box-shadow: 0px 19px 34px -8px rgba(0,112,187,1);}

a .button {
	color: ffffff;
	text-align: center;
	font-size: 16px;
	text-decoration: none;
}

a {text-decoration: none;}
a:hover {text-decoration: none;}

#orbit-system {
  position: relative;
  width: 18em;
  height: 18em;
  margin: 0px auto;
}

.system {
  position: relative;
  width: 100%;
  height: 100%;
}

.planet, .satellite-orbit, .satellite {
  position: absolute;
  top: 50%;
  left: 50%;
}

.planet {
  width: 9em;
  height: 9em;
  margin-top: -20em;
  margin-left: -4.5em;

  border-radius: 50%;
  background-color: none;
  color: white;

  text-align: center;
  line-height: 9em;
}

.satellite-orbit {
	width: 16em;
  height: 16em;
  margin-top: -8em;
  margin-left: -8em;

  /*border: 1px solid black;*/
  border-radius: 50%;
}

.satellite {
    top: 100%;
    width: 7em;
    height: 7em;
    margin-top: -1.5em;
    margin-left: -1.5em;
    color: #fefefe;
    background-color: #0070BB;
    border-radius: 50%;
    text-align: center;
    font-weight: 600;
    line-height: 7em;
}
</style>
</head>
<body style="background-color: rgb(19, 19, 19);">
<div class="container position-absolute top-50 start-50 translate-middle">
    <div class="txt1">ACCOUNT SUSPENDED</div>
    <div class="txt2 text-white-50">This account has been suspended.</div>
@endauth
</div>
