<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/startPage/welcome.css')}}" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<canvas id="canvas"></canvas>
<main>
    <article>
        <h1>АНАЛИЗАТОР ВОЗДУХА</h1>
        <h2>АНАЛИЗАТОР ВОЗДУХА</h2>
        <p>by TECNOCRAT</p>
    </article>
</main>
<script type="x-shader/x-fragment">#version 300 es
/*********
* made by Matthias Hurrle (@atzedent)
*/
precision highp float;
out vec4 O;
uniform float time;
uniform vec2 resolution;
#define FC gl_FragCoord.xy
#define R resolution
#define MN min(R.x,R.y)
#define T (time+660.)
#define S smoothstep
#define N normalize
#define rot(a) mat2(cos((a)-vec4(0,11,33,0)))
float rnd(vec2 p) {
	p=fract(p*vec2(12.9898,78.233));
	p+=dot(p,p+34.56);
	return fract(p.x*p.y);
}
float noise(vec2 p) {
	vec2 i=floor(p), f=fract(p), u=f*f*(3.-2.*f), k=vec2(1,0);
	float
	a=rnd(i),
	b=rnd(i+k),
	c=rnd(i+k.yx),
	d=rnd(i+1.);
	return mix(mix(a,b,u.x),mix(c,d,u.x),u.y);
}
float fbm(vec2 p) {
	float t=.0, a=1., h=.0; mat2 m=mat2(1.,-1.2,.2,1.2);
	for (float i=.0; i<5.; i++) {
		t+=a*noise(p);
		p*=2.*m;
		a*=.5;
		h+=a;
	}
	return t/h;
}
void main() {
	vec2 uv=(FC-.5*R)/R.y, k=vec2(0,T*.015);
	vec3 col=vec3(1);
  uv.x+=.25;
	uv*=vec2(2,1);
	float n=fbm(uv*.28+vec2(-T*.01,0));
	n=noise(uv*3.+n*2.);
	col.r-=fbm(uv+k+n);
	col.g-=fbm(uv*1.003+k+n+.003);
	col.b-=fbm(uv*1.006+k+n+.006);
	col=mix(col,vec3(1),dot(col,vec3(.21,.71,.07)));
	col=mix(vec3(.08),col,min(time*.1,1.));
	col=clamp(col,.08,1.);
	O=vec4(col,1);
}</script>
<script src="{{asset('js/startPage/welcome.js')}}"></script>
</body>
</html>
