<!doctype html>
<html lang="lv">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title', 'Mana lapa')</title>
  
  <style>
  :root {
  --clr-bg: #240046;               /* Deep purple background */
  --clr-indigo: #4B0082;           /* Indigo accent */
  --clr-french-violet: #5F4B8B;    /* Headings */
  --clr-bright-pink: #00FFFF;      /* Cyan for text/buttons */
  --clr-imperial-red: #00CED1;     /* Darker cyan hover */
  --clr-penn-red: #000080;         /* Navy blue for borders/backgrounds */
  --clr-text-light: #00FFFF;       /* Main text in cyan */
  --clr-text-muted: #8BE8FD;       /* Lighter cyan for subtext */
  --radius: 8px;
  --transition: 0.3s ease-in-out;
}

body {
  background-color: var(--clr-bg);
  color: var(--clr-text-light);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  padding: 0;
}

h1, h2, h3, h4, h5 {
  color: var(--clr-french-violet);
  font-weight: 700;
  letter-spacing: 0.05em;
  margin: 0 0 8px 0;
}

a {
  color: var(--clr-bright-pink);
  text-decoration: none;
  transition: color var(--transition);
}

a:hover {
  color: var(--clr-imperial-red);
}

.container {
  max-width: 900px;
  margin: auto;
  padding: 32px 16px;
}

.card {
  background-color: var(--clr-penn-red);
  border-radius: var(--radius);
  box-shadow: 0 4px 12px rgba(0, 255, 255, 0.2);
  padding: 16px;
  margin-bottom: 19px;
  transition: transform var(--transition), box-shadow var(--transition);
  color: var(--clr-text-light);
}

.card:hover {
  transform: translateY(-6px);
  box-shadow: 0 8px 20px rgba(0, 206, 209, 0.4);
}

.card h2 {
  font-size: 24px;
  font-weight: 700;
  color: var(--clr-text-muted);
}

.card p {
  color: var(--clr-text-muted);
  line-height: 1.6;
}

.form-control,
input[type="text"],
input[type="password"],
input[type="date"],
input[type="time"],
textarea {
  background-color: #3a005f;
  color: var(--clr-text-light);
  border: 1px solid var(--clr-penn-red);
  border-radius: var(--radius);
  padding: 12px;
  font-size: 16px;
  transition: border-color var(--transition), box-shadow var(--transition);
  width: 100%;
  box-sizing: border-box;
}

.form-control:focus,
input[type="text"]:focus,
input[type="password"]:focus,
input[type="date"]:focus,
input[type="time"]:focus,
textarea:focus {
  border-color: var(--clr-bright-pink);
  box-shadow: 0 0 8px var(--clr-bright-pink);
  outline: none;
}

input[type="checkbox"] {
  accent-color: var(--clr-bright-pink);
  width: 16px;
  height: 16px;
}

.flash {
  padding: 12px 16px;
  border-radius: 6px;
  margin-bottom: 16px;
  font-size: 14px;
}

.flash-success {
  background-color: #004d40;
  color: #aef5f5;
}

.flash-error {
  background-color: #002b40;
  color: #ffcdd8;
}

button, .btn {
  background-color: var(--clr-bright-pink);
  color: var(--clr-bg);
  padding: 12px 24px;
  border: none;
  border-radius: var(--radius);
  font-weight: 700;
  text-transform: uppercase;
  cursor: pointer;
  font-size: 16px;
  transition: background-color var(--transition), transform var(--transition);
}

button:hover, .btn:hover {
  background-color: var(--clr-imperial-red);
  transform: scale(1.05);
  color: #000;
}

.btn.secondary {
  background-color: transparent;
  color: var(--clr-bright-pink);
  border: 2px solid var(--clr-bright-pink);
}

.btn.secondary:hover {
  background-color: var(--clr-bright-pink);
  color: var(--clr-bg);
}

.auth-grid {
  display: flex;
  justify-content: center;
  padding: 32px 16px;
  background-color: var(--clr-bg);
  min-height: auto; /* was 100vh */
}

.client-container {
  background-color: var(--clr-penn-red);
  border-radius: 12px;
  padding: 24px 16px;
  box-shadow: 0 0 20px rgba(0, 255, 255, 0.15);
  color: var(--clr-text-light);
  max-width: 900px;
  margin: 16px auto;

  /* Responsive grid layout for cards */
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 12px;
  justify-items: center;
}

.client-header {
  font-size: 29px;
  font-weight: 700;
  color: var(--clr-text-muted);
  margin-bottom: 16px;
  text-align: center;
}

.client-card {
  background-color: var(--clr-bg);
  border: 1px solid var(--clr-bright-pink);
  border-radius: 10px;
  padding: 16px;
  color: var(--clr-text-light);
  box-shadow: 0 0 8px rgba(0, 255, 255, 0.1);
  transition: transform 0.2s ease-in-out, box-shadow 0.3s ease-in-out;
  min-width: 220px;
  max-width: 280px;
}

.client-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 0 14px rgba(0, 255, 255, 0.4);
}

.client-card h3 {
  margin-top: 0;
  color: var(--clr-text-muted);
  font-size: 19px;
}

.client-card p {
  margin: 5px 0;
  color: var(--clr-text-muted);
}

.btn-detail {
  display: inline-block;
  margin-top: 10px;
  background-color: var(--clr-bright-pink);
  color: var(--clr-bg);
  font-weight: 700;
  padding: 8px 19px;
  border-radius: 6px;
  text-decoration: none;
  font-size: 14px;
  transition: background-color var(--transition), color var(--transition);
}

.btn-detail:hover {
  background-color: var(--clr-imperial-red);
  color: #000;
}

.page-title {
  margin: 10px auto 5px auto;
  font-weight: 700;
  font-size: 22px;
  color: var(--clr-bright-pink);
  max-width: 600px;
  text-align: center;
}

.page-subtitle {
  margin: 0 auto 15px auto;
  font-weight: 400;
  font-size: 13px;
  color: var(--clr-text-muted);
  max-width: 600px;
  text-align: center;
}

.btn-add-client {
  background-color: var(--clr-bright-pink);
  color: var(--clr-bg);
  padding: 8px 16px;
  font-weight: 700;
  font-size: 14px;
  border-radius: 6px;
  margin-bottom: 15px;
  display: inline-block;
  transition: background-color var(--transition);
}

.btn-add-client:hover {
  background-color: var(--clr-imperial-red);
  color: #000;
}

.btn-back {
  display: block;
  width: max-content;
  margin: 24px auto 32px auto;
  background-color: var(--clr-bright-pink);
  padding: 12px 24px;
  font-weight: 700;
  font-size: 16px;
  border-radius: 8px;
  color: var(--clr-bg);
  text-align: center;
  text-decoration: none;
  transition: background-color var(--transition), transform var(--transition);
}

.btn-back:hover {
  background-color: var(--clr-imperial-red);
  color: #000;
  transform: scale(1.05);
}

/* box in upper-right for authentication controls */
.auth-container {
  position: absolute;
  top: 12px;
  right: 12px;
  padding: 8px 12px;
  /* you can add border/background if you want a visible box */
}


  
  header { position: relative; }
</style>
</head>
<body>
 <!-- navigacijas josla -->
  <header>
    <div class="nav container" style="display: flex; justify-content: center; align-items: center; gap: 16px; flex-wrap: wrap;">
      @auth
        <a href="/" class="btn">Sākumlapa</a>
        <a href="/pasakumi" class="btn">Pasakumi</a>
        @if(auth()->user()->loma !== 'Lietotajs')
          <a href="/telpas" class="btn">Telpas</a>
          <a href="/lietotaji" class="btn">Lietotāji</a>
          <a href="/rezerveskopijas" class="btn">Rezerves kopijas</a>
          <a href="/kategorija" class="btn">Kategorijas</a>
        @endif
      @endauth
    </div>

 <!-- kreisajā augšējā stūrī izveidojam kastīti, kurā parādās lietotāja vārds, uzvārds un loma un poga izrakstities\ielogoties -->
<div class="auth-container">
  @if(auth()->check())
    <div style="display: flex; align-items: center; gap: 10px;">
      <span style="margin-right: 10px;">
    {{ auth()->user()->vards }} {{ auth()->user()->uzvards }} ({{ auth()->user()->loma }})
    </span>
      <form method="POST" action="/logout" style="display:inline">
        @csrf
        <button class="btn secondary" type="submit">Izrakstīties</button>
      </form>
    </div>
  @else
    <a href="/login" class="btn">Ielogoties</a>
  @endif
</div>
  </header>

  <main class="container" style="display:flex; gap:24px;">
    <div style="flex:1">
      @yield('content')
    </div>

    @hasSection('sidemenu')
      <aside style="width:250px;">
        @yield('sidemenu')
      </aside>
    @endif
  </main>

  <footer style="text-align: center; padding: 16px 0; color: var(--clr-text-muted);">
    © {{ date('Y') }} Jūsu projekts — izstrādes režīmā
  </footer>
</body>
</html>